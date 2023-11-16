<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ClaimantInformation;
use App\models\RespondantInformation;
use App\models\ClaimDetails;
use App\models\ClaimNotice;
use App\models\ReliefRequest;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\ClaimantNoticeStatus;
use App\models\ArbitrationMaster;
use App\models\ArbitratorConfiguration;
use App\models\ClaimantRegister;
use App\models\claimstagestatus;
use App\models\claimnotice_petion_arbitrationno;
use App\Mail\SendToArbitrator;
use App\models\notifications;
use Illuminate\Support\Facades\Mail;
use App\models\ClaimNoticeStage;
use Log;
use DB;
use Auth;
use App\User;
use Session;
use Input; 
use Redirect;
use PDF;
use File;
use Datatables;
use Storage;
use Filesystem;
use App\AlfrescoDocument;
use App\DatabaseHelper;
use App\Http\HomeController;
use Razorpay\Api\Api;

class ClaimPetionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null) {
        return view('auth.login');
      }

// echo($user_id);exit;
      $claimnotice = DB::select("select distinct sm.id as claimid,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,ci.organization_details,ci.poa_holder,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,isstageinitiated,pet.arbitration_petionno, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        inner join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
        where sm.userid= ".Auth::user()->id. " order by sm.id desc");

       


      
      $arbitratorlist = ArbitrationMaster::all();

      $claimant_informations = ClaimantInformation::all();        

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id');
      $additional_fees=array();
      $claimantamend=array();
      // dd($claimnotice);
      foreach ($claimnotice as $fees) {
        // array_push($claimnoticeid,$claimnotice->claimid);
         
        $claimnoticeid=$fees->id;
        $additional_fees[]=DB::select("SELECT * FROM additional_payment_email WHERE claim_notice_id=".$claimnoticeid." AND user_id=".$user_id);
        $claimantamend[] = DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Claimant ClaimNotice Amend'  and  claimnoticeid=".$claimnoticeid . " and created_id = " .Auth::user()->id);

        

      }                               

      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
      $dispute_subcategories = DB::table('dispute_subcategories')->get(); 

      $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);   

      return view('ClaimPetion.index', compact('claimnotice','arbitratorlist','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories','claimanttype','additional_fees','claimantamend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('ClaimPetion.show');
    }

    public function additionalfees(Request $request)
    {
      $stageid=$request->stage_id;
       // echo $stageid;exit;

       $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $payment_id= $input['razorpay_payment_id'];
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
      // dd($request);

     $claimnotice_ID =DB::select("select * from claimantnotice_stage where id=".$stageid);
     $claimnoticeID=$claimnotice_ID[0]->claimnoticeid;
     // echo($claimnoticeID);exit;
     // $stageid = $id;
    // $claimantnotice_Stage =$request->claimantnotice_Stage;
     $user_id = (auth()->check()) ? auth()->user()->id : null;
     $table = DB::table('additional_payment_email')
     ->where(['claim_notice_id'=>$claimnoticeID,'user_id'=> $user_id]) 
    ->update(['payment_status' => 'paid', 'transaction_id' => $payment_id]);


     $paid_status=DB::select("SELECT * FROM additional_payment_email WHERE payment_status IS null AND claim_notice_id=".$claimnoticeID);
     
     if( $paid_status == Null)
     {

       $claimantnotice_Stage ="Award Stage";
       $claimantnotice_stage_status="Additional Payment Paid";

       $claimstagestatus = new claimstagestatus();
       $claimstagestatus->stageid = $stageid; 
       $claimstagestatus->claimnoticestatus  ="Additional Payment Paid";
       $claimstagestatus->created_id = Auth::user()->id;        
       $claimstagestatus->save();

       $table = DB::table('claimantnotice_stage')
       ->where('id' , $stageid)
       ->update(['claimantnotice_stage_status' => $claimantnotice_stage_status],
     );

       $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
       $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
       $ClaimantNoticeStatus->claimantnoticestatus = "Additional Payment Paid";
       $ClaimantNoticeStatus->userid = Auth::user()->id;  
       $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
       $ClaimantNoticeStatus->created_id = Auth::user()->id;        
       $ClaimantNoticeStatus->save();

       $table = DB::table('claimantnotice')
       ->where('id' , $claimnoticeID)
       ->update(['claimnoticestatus' => $claimantnotice_stage_status]);


     }

     return redirect()->back()
     ->with('success','Paid Successfully, Wait for Further Updates');

   }


   public function show($id)

   {
    try{
  $user_id = (auth()->check()) ? auth()->user()->id : null;
  Log::error('[Method => ClaimPetionController_show => 500_error_try => Step1=> Error Code:'.$user_id.':'.$id.']');

  if ( $user_id==null) 
  {
    Log::error('[Method => ClaimPetionController_show => 500_error_try => Step2=> Error Code:'.$user_id.':'.$id.']');
    return view('auth.login');
  }
     
      //DatabaseHelper::SessionLogout();
$rtotal_pay_amt='';
$rextra_amt='';
$amount_additional='';
$total_pay_amt_check='';
  $additional_payment=DB::select("select amount FROM additional_payment_email where claim_notice_id=".$id." and user_id=".$user_id." and payment_status is null");
  if(!empty($additional_payment))
  {

  $amount_additional=$additional_payment[0]->amount;


   $rpayment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");



    $rservice_percentage=($rpayment_service_amount[0]->service1_percentage)/100;

    $rextra_amt= $amount_additional * $rservice_percentage;

    // echo $total_fee;exit;

      // echo $registration_fees_amt;exit;

     $total_pay_amt_check=  $amount_additional+ $rextra_amt;

    
    
$total_pay=number_format((float)$total_pay_amt_check, 2, '.', ''); 
// print_r($total_pay);exit;
    $checking=is_float($total_pay_amt_check);
     $rtotal_pay_amt=str_replace(".", "", $total_pay);

}

    $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);
    $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);  
    $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");

    $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
    $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);
    $claimandrelief = DatabaseHelper::getclaimandrelief($id);

    $getclaim_details = DatabaseHelper::getclaim_details($id);

    $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

    $claim_details = DatabaseHelper::getClaimDetails($id);

    $claimnoticenatureofaward = DatabaseHelper::getnatureofclaimaward($id);

    $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

    $relief_request = DatabaseHelper::getReliefRequest($id); 

    $claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);

    $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);

    $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id);

    $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);

    $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);

    $ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);
    $RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id);
    $AwardedDcouments = DatabaseHelper::getAwardedDcouments($id);    

    $AdminAwardedDocuments = DatabaseHelper::getAdminAwardedDocuments($id);

    $realestate_claim = DatabaseHelper::realestate_claim($id);
    $realestate_claim_details = DatabaseHelper::realestate_claim_details($id);
    $insurance_claim = DatabaseHelper::insurance_claim($id);
    $insurance_claim_part_2 = DatabaseHelper::insurance_claim_part_2($id);
    $family_claim = DatabaseHelper::family_claim($id);
    $family_claim_movable = DatabaseHelper::family_claim_movable($id);
    $contract_relief = DatabaseHelper::contract_relief($id);
    $banking_claim_mort = DatabaseHelper::banking_claim_mort($id);
    $banking_claim_hypo = DatabaseHelper::banking_claim_hypo($id);
    $banking_claim_pledge = DatabaseHelper::banking_claim_pledge($id);
    $banking_claim_personal = DatabaseHelper::banking_claim_personal($id);
    $banking_claim_corporate = DatabaseHelper::banking_claim_corporate($id);
    $banking_claim_mort_details = DatabaseHelper::banking_claim_mort_details($id);
    $banking_claim_hypo_details = DatabaseHelper::banking_claim_hypo_details($id);
    $banking_claim_pledge_details = DatabaseHelper::banking_claim_pledge_details($id);
    $banking_claim_pro_details = DatabaseHelper::banking_claim_pro_details($id);
    $banking_relief = DatabaseHelper::banking_relief($id);
    $bank_account = DatabaseHelper::bank_account($id);
    $ClaimNoticeStatusCount = count($ClaimNoticeStage);
    $arbitratorlist = ArbitrationMaster::all();
    $dispute_categories = DisputeCategory::all();
    $dispute_subcategories = DisputeSubcategory::all(); 

    $respodentcounterclaimandrelief = DatabaseHelper::getrepondentclaimandrelief($id);

    $respodentcounterclaimrealestate_claim = DatabaseHelper::respodentcounterclaimrealestate_claim($id);
    $respodentcounterclaimrealestate_claim_details = DatabaseHelper::respodentcounterclaimrealestate_claim_details($id);
    $respodentcounterclaiminsurance_claim = DatabaseHelper::respodentcounterclaiminsurance_claim($id);
    $respodentcounterclaiminsurance_claim_part_2 = DatabaseHelper::respodentcounterclaiminsurance_claim_part_2($id);
    $respodentcounterclaimfamily_claim = DatabaseHelper::respodentcounterclaimfamily_claim($id);
    $respodentcounterclaimfamily_claim_movable = DatabaseHelper::respodentcounterclaimfamily_claim_movable($id);
    $respodentcounterclaimcontract_relief = DatabaseHelper::respodentcounterclaimcontract_relief($id);
    $respodentcounterclaimbanking_claim_mort = DatabaseHelper::respodentcounterclaimbanking_claim_mort($id);
    $respodentcounterclaimbanking_claim_hypo = DatabaseHelper::respodentcounterclaimbanking_claim_hypo($id);
    $respodentcounterclaimbanking_claim_pledge = DatabaseHelper::respodentcounterclaimbanking_claim_pledge($id);
    $respodentcounterclaimbanking_claim_personal = DatabaseHelper::respodentcounterclaimbanking_claim_personal($id);
    $respodentcounterclaimbanking_claim_corporate = DatabaseHelper::respodentcounterclaimbanking_claim_corporate($id);
    $respodentcounterclaimbanking_claim_mort_details = DatabaseHelper::respodentcounterclaimbanking_claim_mort_details($id);
    $respodentcounterclaimbanking_claim_hypo_details = DatabaseHelper::respodentcounterclaimbanking_claim_hypo_details($id);
    $respodentcounterclaimbanking_claim_pledge_details = DatabaseHelper::respodentcounterclaimbanking_claim_pledge_details($id);
    $respodentcounterclaimbanking_claim_pro_details = DatabaseHelper::respodentcounterclaimbanking_claim_pro_details($id);
    $respodentcounterclaimbanking_relief = DatabaseHelper::respodentcounterclaimbanking_relief($id);
    $respodentcounterclaimbank_account = DatabaseHelper::respodentcounterclaimbank_account($id);


    $security_type = DatabaseHelper::security_type($id);
    $renewal_date = DatabaseHelper::renewal_date($id);
    $revival_date = DatabaseHelper::revival_date($id);

    $legal_notice = DatabaseHelper::legal_notice($id);
    $other_document = DatabaseHelper::other_document($id);

    $security_type_counter = DatabaseHelper::security_type_counter($id);
    $renewal_date_counter = DatabaseHelper::renewal_date_counter($id);
    $revival_date_counter = DatabaseHelper::revival_date_counter($id);

    $legal_notice_counter = DatabaseHelper::legal_notice_counter($id);
    $other_document_counter = DatabaseHelper::other_document_counter($id);
    $bank_account_counter= DatabaseHelper::bank_account_counter($id);
    $additional_fees=DB::select("SELECT * FROM additional_payment_email WHERE payment_status is null and claim_notice_id=".$id." AND user_id=".$user_id);

    $claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
      dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
      left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
      left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

      where ci.deleted_at is null and ci.claimnoticeid = ".$id );
    $counter_claim_list=DatabaseHelper::counter_claim_list($id);


Log::error('[Method => ClaimPetionController_show => 500_error_try => Step3=> Error Code:'.$user_id.':'.$id.']');


    return view('ClaimPetion.show', compact('additional_fees','claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','ClaimantclaimNoticeStageDocuments','RespondentclaimNoticeStageDocuments','AwardedDcouments','AdminAwardedDocuments','claimandrelief','getclaim_details','claimnoticenatureofaward','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend','rextra_amt','amount_additional','rtotal_pay_amt','total_pay_amt_check'));

    Log::error('[Method => ClaimPetionController_show => 500_error_try => Step4=> Error Code:'.$user_id.':'.$id.']');
}
catch(Exception $exc)
{
   Log::error('[Method => ClaimPetionController => 500_error_catch => Step5 => Error Code:'.$exc.']');
}
  }


  public function upload(Request $request)
  {
// echo"hgjhgj";exit;
    if($request->hasFile('file'))
    {

      $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno);
      $imageFile = $request->file('file');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
    return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);
  }
  public function respondentupload(Request $request)
  {
// echo"hgjhgj";exit;
    if($request->hasFile('file'))
    {

      $storagePath = storage_path().'/app/public/uploads/respondentclaim/'.auth()->user()->id.'_'.str_replace('/', '_', $request->arbitration_petionno);
      $imageFile = $request->file('file');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
    return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);
  }

  public function remove(Request $request)
  {
    $filename =  $request->get('filename');
 $arbitration_petionno =  $request->get('petition_no');
    $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $arbitration_petionno).'/'.$filename;
    if (file_exists($storagePath))
    {
      unlink($storagePath);
    }
    return $filename;
  }
  public function respondentremove(Request $request)
  {
    $filename =  $request->get('filename');
    $arbitration_petionno =  $request->get('petition_no');

$storagePath = storage_path().'/app/public/uploads/respondentclaim/'.auth()->user()->id.'_'.str_replace('/', '_', $arbitration_petionno).'/'.$filename;
     
    if (file_exists($storagePath))
    {

    unlink($storagePath);
    }
    return $filename;
  }
  public function amendupdate(Request $request, $id =null)
  {

    $ClaimNoticeID =$request->claimnoticeid;
    $claimnoticeno=$request->claimnoticeno;
      //echo json_encode($claimnoticeno);exit;
    $claimnotice=DB::select("select * from claimant_informations where claimnoticeid=".$ClaimNoticeID);
    $claimantamend = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Claimant ClaimNotice Amend'  and  claimnoticeid=".$ClaimNoticeID);

    $amend = DB::table('amend_details')->insertGetId([
      'organization_details' => $claimnotice[0]->organization_details,
      'poa_holder' => $claimnotice[0]->poa_holder,
      'email'=>$claimnotice[0]->email,
      'claimnoticeid'=>$ClaimNoticeID,
      'user_type'=>"claimant",
      'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
    ]);
    DB::table('claimant_informations')
    ->where('claimnoticeid', $ClaimNoticeID)
    ->update([
      'organization_details' => request('organization_details'),
      'poa_holder'=>request('poa_holder'),
      'updated_at' => NOW()
    ]);

    $alfresco_id=DB::table('alfresco_log')->insertGetId([
      'user_id' => Auth::user()->id,
      'doc_type'=>'Claimant-ClaimNoticeAmend',
      'claimnotice_id'=>$ClaimNoticeID,
      'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
    ]);
    $parentFolder = 'documentLibrary/Claim/Claimant-ClaimNoticeAmend';
    $count = count($claimantamend) +1;

    $folderName = str_replace('/', '_', $claimnoticeno).'_'.'Amend';

      //dd ($folderName);
    $folderTitle =  $claimnoticeno;
    $folderDescription = $claimnoticeno;

    try{
      $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
      Log::error('[Method => ClaimPetionController => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');


    }
    catch(\Exception $exc){

      $documentDirectory='';    
      Log::error('[Method => ClaimPetionController => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

    }
 // echo $documentDirectory;exit;

    if($documentDirectory != '')
    {




      $storagePath = storage_path().'/app/public/uploads/claimantamend/'.$folderName;
          //echo $documentDirectory; exit;
      if (!File::exists($storagePath))
      {
        File::makeDirectory($storagePath);
      }
      else
      {
        File::cleanDirectory($storagePath);
      }

      if($request->hasFile('fileupload'))
      {
        //echo ("gjh");exit;
        $storagePath = $storagePath;
        $imageFile = $request->file('fileupload');
        $imageName = $imageFile->getClientOriginalName();
        $imageFile->move($storagePath, $imageName);
      }

      $this->storeDocumentamend($folderName, $documentDirectory,$ClaimNoticeID,'Claimant ClaimNotice Amend','0','CLAIMANT_AUTHORIZED');
      $alfresco_update = DB::table('alfresco_log')
      ->where(['id'=>$alfresco_id])
      ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);
      return redirect()->route('ClaimPetion.index')
      ->with('success','Amend Completed Successfully');
    }
    else
    {
     return redirect()->route('ClaimPetion.index')
     ->with('success','Document Upload Failed');

   } 


 }
 public function resamendupdate(Request $request, $id =null)
 {

  $ClaimNoticeID =$request->claimnoticeid;
  $claimnoticeno=$request->claimnoticeno;
  $user_id=$request->user_id;

  $claimnotice=DB::select("select * from respondantdetails where claimnoticeid=".$ClaimNoticeID . " and user_id = " .$user_id);
  $claimantamend = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Respondent ClaimNotice Amend'  and  claimnoticeid=".$ClaimNoticeID . " and created_id = " .$user_id);

  $amend = DB::table('amend_details')->insertGetId([
    'organization_details' => $claimnotice[0]->auth_name,
    'poa_holder' => $claimnotice[0]->poa_holder,
    'firstname' => $claimnotice[0]->firstname,
    'lastname' => $claimnotice[0]->lastname,
    'address' => $claimnotice[0]->address,
    'email'=>$claimnotice[0]->email,
    'user_id' => $user_id,
    'claimnoticeid'=>$ClaimNoticeID,
    'user_type'=>"respondent",
    'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
  ]);
  DB::table('respondantdetails')

  ->where(['claimnoticeid'=> $ClaimNoticeID,'user_id'=>$user_id])
  ->update([
    'auth_name' => request('auth_name'),
    'poa_holder'=>request('poa_holder'),
    'firstname'=>request('firstname'),
    'lastname'=>request('lastname'),
    'address'=>request('address'),

    'updated_at' => NOW()
  ]);

      // DB::table('users')
      // ->where('id',$user_id)
      // ->update([
      //   'name' => request('firstname').''.request('lastname'),
      //   'username'=>request('firstname').''.request('lastname'),
      //   'address'=>request('address'),

      //   'updated_at' => NOW()
      // ]);
  $alfresco_id=DB::table('alfresco_log')->insertGetId([
    'user_id' => Auth::user()->id,
    'doc_type'=>'Respondent-ClaimNoticeAmend',
    'claimnotice_id'=>$ClaimNoticeID,
    'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
  ]);
  $parentFolder = 'documentLibrary/Claim/Respondent-ClaimNoticeAmend';
  $count = count($claimantamend) +1;
  $email=$claimnotice[0]->email;

  $folderName = str_replace('/', '_', $claimnoticeno).$email.'_'.'Amend';

      //dd ($folderName);
  $folderTitle =  $claimnoticeno;
  $folderDescription = $claimnoticeno;

  try{
    $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
    Log::error('[Method => ClaimPetionController => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');


  }
  catch(\Exception $exc){

    $documentDirectory='';    
    Log::error('[Method => ClaimPetionController => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

  }
 // echo $documentDirectory;exit;

  if($documentDirectory != '')
  {

    $storagePath = storage_path().'/app/public/uploads/respondentamend/'.$folderName;
          //echo $documentDirectory; exit;
    if (!File::exists($storagePath))
    {
      File::makeDirectory($storagePath);
    }
    else
    {
      File::cleanDirectory($storagePath);
    }

    if($request->hasFile('fileupload'))
    {
        //echo ("gjh");exit;
      $storagePath = $storagePath;
      $imageFile = $request->file('fileupload');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
//echo json_encode($user_id);exit;

  // $this->storeresamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_NAME');
  // if (!File::exists($storagePath))
  //     {
  //       File::makeDirectory($storagePath);
  //     }
  //     else
  //     {
  //       File::cleanDirectory($storagePath);
  //     }

    if($request->hasFile('fileidproof'))
    {
      $storagePath = $storagePath;
      $imageFile = $request->file('fileidproof');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
        // commanded start

      // $this->storeresamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_NAME');
      // if (!File::exists($storagePath))
      // {
      //   File::makeDirectory($storagePath);
      // }
      // else
      // {
      //   File::cleanDirectory($storagePath);
      // }

    if($request->hasFile('fileupload_auth'))
    {
      $storagePath = $storagePath;
      $imageFile = $request->file('fileupload_auth');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
        // commanded start

    $this->storeresamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_AUTH');
    $alfresco_update = DB::table('alfresco_log')
    ->where(['id'=>$alfresco_id])
    ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);
    return redirect()->route('ClaimPetion.respodentclaimpetition')
    ->with('success','Amend Completed Successfully');
  }
  else
  {
   return redirect()->route('ClaimPetion.respodentclaimpetition')
   ->with('success','Document Upload Failed');

 } 


}

public function update(Request $request, $id)
{
// echo "jjghj"; exit;
 $arbitration_petionno = $request->arbitration_petionno;
 $claimantnotice_Stage =$request->claimantnotice_Stage;
 $claimnoticestatus = $claimantnotice_Stage.' Document Uploaded by Claimant';
 $folderName = $request->arbitration_petionno;

 $documentDirectory = $request->alfresco_stage_folderuniqueid;


 $claimnoticeID = $request->claimnoticeid;
 $stageid = $request->claimnoticestageid;
   // echo $stageid;exit;
 $claimantnotice_stage_status = $request->claimantnotice_stage_status;

   //echo $claimantnotice_stage_status; exit;
 $table = DB::table('claimantnotice')
 ->where('id' , $request->claimnoticeid)
 ->update(['claimnoticestatus' => $claimnoticestatus]);

 if ($claimantnotice_stage_status = 'Initiated') 
 {
  $claimantnotice_stage = DB::table('claimantnotice_stage')
  ->where('id' , $stageid)
  ->update(['claimantnotice_stage_status' => 'InProgress']);
}
$ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
$ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
$ClaimantNoticeStatus->claimantnoticestatus = $claimnoticestatus;
$ClaimantNoticeStatus->userid = Auth::user()->id;  
$ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' )); 
$ClaimantNoticeStatus->created_id = Auth::user()->id;        
$ClaimantNoticeStatus->save();
$newclaimant = [
  'body' => $request->claimnoticeno.' '.$claimantnotice_Stage.' '.' Document Uploaded by Claimant',
  'actionURL' => route('claimantsnoticelist.index'),
];

$type = 'ClaimNotice';
$latest = '1';
$name =  $request->claimnoticeno.' '.$claimantnotice_Stage.' '.' Document Uploaded by Claimant';
$notifiable_type =  $request->claimnoticeno.' '.$claimantnotice_Stage.' '.' Document Uploaded by Claimant';
$newclaimant =  json_encode($newclaimant);
$created_at = now();
$updated_at = now();
$RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, sm.respondant_status,res.firstname,
  res.daytimetelephone,res.email from claimantnotice sm 
  INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) 

  where sm.id=".$request->claimnoticeid);

foreach ($RespondentInformation as $RespondentInformations)
{

  $notification = new notifications(); 
  $notification->type = $type;
  $notification->latest = $latest;
  $notification->name = $name;
  $notification->notifiable_type = $notifiable_type;
  $notification->data = $newclaimant;
  $notification->notifiable_id = $RespondentInformations->user_id;  
  $notification->created_at = $created_at;
  $notification->updated_at = $updated_at;   
  $notification->registration_claimnotice_id =$claimnoticeID;  
  $notification->save();
  $repondentmail = $RespondentInformations->email;
  $data = array(
   'email' => $RespondentInformations->email,
   'firstname' => $RespondentInformations->firstname,
   'claimnoticeno' => $RespondentInformations->claimnoticeno,
   'respondant_status' => $RespondentInformations->respondant_status,
   'arbitration_petionno' => $arbitration_petionno,
 );
      // echo $claimnoticestatus; exit;

    //send email to respondant 
  if ( $RespondentInformations->respondant_status =='Disputing and Contesting the Claim' && $claimnoticestatus=='Pleadings Document Uploaded by Claimant'){
      // echo "hjgjh";exit;
    Mail::send('emails.respondenttoclaimant', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
      ->subject('Electronic Arbitration System (EAS)-  Claim Petition filed by the Claimant  (No:'.$arbitration_petionno.')'); 
       

    }); 
  }
  else if ( $RespondentInformations->respondant_status =='Making a Counter Claim' && $claimnoticestatus=='Pleadings Document Uploaded by Claimant'){
      // echo "hjgjh";exit;
    Mail::send('emails.respondantclaimant_making2', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') - Objections to Counter-Claim lodged by the Claimant'); 


      

    });
  }
  else if ( $claimnoticestatus=='Evidence Document Uploaded by Claimant'){
       // echo "hjgjh";exit;
    Mail::send('emails.evidenceupload_by_claimant', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
      ->subject("Electronic Arbitration System (EAS) - Claim Petition  (".$arbitration_petionno.") - View Claimant's Evidence and upload Respondent's Evidence
       ");
      


    });
  }
  else if ($claimnoticestatus=='Hearing-1 Document Uploaded by Claimant'){
      // echo "hjgjh1";exit;
    Mail::send('emails.hearing1_by_claimant', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
      ->subject('Electronic Arbitration System (EAS)- Claim Petition ('.$arbitration_petionno.') - Hearing Number -1 ');


    });
  }
  else if ($claimnoticestatus=='Hearing-2 Document Uploaded by Claimant'){
      // echo "hjgjh12";exit;
    Mail::send('emails.hearing2_by_claimant', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
     ->subject('Electronic Arbitration System (EAS)- Claim Petition ('.$arbitration_petionno.') - Hearing Number -2 ');



    });
  }
}

$arbitratorsid = DB::select("select arbitrator_id,claimnoticeid,us.email,us.username,cn.respondant_status from claimant_arbitrator_configuration arc
  INNER JOIN claimantnotice cn ON (cn.id= arc.claimnoticeid) 
  inner JOIN users us on (us.id = arc.arbitrator_id)  where arc.isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);

foreach ($arbitratorsid as $arbitratorid) {
  $arbitratoremail = $arbitratorid->email;
  $notification = new notifications(); 
  $notification->type = $type;
  $notification->latest = $latest;
  $notification->name = $name;
  $notification->notifiable_type = $notifiable_type;
  $notification->data = $newclaimant;
  $notification->notifiable_id = $arbitratorid->arbitrator_id;  
  $notification->created_at = $created_at;
  $notification->updated_at = $updated_at;    
  $notification->registration_claimnotice_id =$claimnoticeID;  
  $notification->save(); 
  $data = array(
    'email' => $arbitratorid->email,
    'username'=>$arbitratorid->username,
    'arbitration_petionno'=>$arbitration_petionno,
    'respondant_status'=>$arbitratorid->respondant_status,
  );
  if ( $arbitratorid->respondant_status =='Disputing and Contesting the Claim' && $claimnoticestatus=='Pleadings Document Uploaded by Claimant'){
    Mail::send('emails.claimant_disputetoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject('Electronic Arbitration System (EAS) -Claim Petition(No:'.$arbitration_petionno.') -  Claim Petition Lodged');


    });
  } 
  else if ( $arbitratorid->respondant_status =='Making a Counter Claim' && $claimnoticestatus=='Pleadings Document Uploaded by Claimant'){
    Mail::send('emails.claimant_countertoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject(' Electronic Arbitration System (EAS) - Claim Petition  (No:'.$arbitration_petionno.') -  Objections to Counter-Claim lodged by the Claimant');

    });
  }

  
  else if ( $claimnoticestatus=='Evidence Document Uploaded by Claimant'){
    Mail::send('emails.claimant_evidencetoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject(" Electronic Arbitration System (EAS)  - Claim Petition  (No:".$arbitration_petionno.") -  Claimant's Evidence Uploaded");
      

    });
  }
  else if ( $claimnoticestatus=='Hearing-1 Document Uploaded by Claimant'){
    Mail::send('emails.claimant_hearing1toarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject("Electronic Arbitration System (EAS) - Claim Petition  (No:".$arbitration_petionno.") -  Hearing Number -1 Written Arguments uploaded by Claimant update");
      

    });
  }
  else if ( $claimnoticestatus=='Hearing-2 Document Uploaded by Claimant'){
    Mail::send('emails.claimant_hearing2toarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject(" Electronic Arbitration System (EAS) - Claim Petition  (No:".$arbitration_petionno.") -  Hearing Number: 2 Additional Documents/Written Arguments uploaded by Claimant ");
      

    });
  } 
}

$emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
foreach($emails as $Adminemail){
  $notification = new notifications(); 
  $notification->type = $type;
  $notification->latest = $latest;
  $notification->name = $name;
  $notification->notifiable_type = $notifiable_type;
  $notification->data = $newclaimant;
  $notification->notifiable_id = $Adminemail->id;  
  $notification->created_at = $created_at;
  $notification->updated_at = $updated_at; 
  $notification->registration_claimnotice_id =$claimnoticeID;     
  $notification->save(); 
  $data = array(
    'email' => $Adminemail->email,
  );

  $adminmail = $Adminemail->email;
  Mail::send('emails.claimanttoadmin', $data, function($message) use ($adminmail,$data,$arbitration_petionno,$claimantnotice_Stage){
    $message->to($adminmail)
    ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - Claimant Uploaded Document against '.$claimantnotice_Stage.'.'); 
  });     
}
$alfresco_id=DB::table('alfresco_log')->insertGetId([
  'user_id' => Auth::user()->id,
  'claimnotice_id'=>$claimnoticeID,
  'doc_type'=>'claimant Document',
  'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
]);
$this->storeDocument($folderName, $documentDirectory,$claimnoticeID,$stageid,$request->remarks,$alfresco_id);
return redirect()->route('ClaimPetion.show',$request->claimnoticeid)
->with('success','Stage Document Uploaded Successfully');
}

private function storeDocument($claimpetion_arbitrationNo, $documentDirectory,$claimnoticeID,$stageid,$remarks,$alfresco_id)
{
  try
  {
     // echo $claimpetion_arbitrationNo; exit;
    $fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimpetion_arbitrationNo);

    
    
    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    // echo $files; exit;
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claim Petion Document';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      if($response !=''){
        $getting_code=json_decode($response);
        $getting_code2=$getting_code->status->code;
      }
      else{
        $getting_code2='';
      }
      if($getting_code2=='200')
      { 
        $objResponse = json_decode($response, TRUE);

      //echo json_encode($objResponse); exit;

        $documentNode = $objResponse['nodeRef'];
        $arrWorkSpace = explode('://', $documentNode);
        $arrStore = explode('/', $arrWorkSpace[1]);
        $workspace = $arrWorkSpace[0];
        $spaceStore = $arrStore[0];
        $alfrescoDocumentName = $arrStore[1];

        $alfresco_update = DB::table('alfresco_log')
        ->where(['id'=>$alfresco_id])
        ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes')),'document_name'=>$value,'stage_id'=>$stageid]);

        DB::table('claimnoticedocumentdetails')->insert([
          'claimnoticeid' => $claimnoticeID,
          'stageid'=>$stageid,
          'node_ref' => $documentNode,
          'work_space' => $workspace,
          'space_store' => $spaceStore,
          'alfresco_document_name' => $alfrescoDocumentName,
          'document_name' => $value,
          'file_extension' => $fileExtension,
          'document_type' => 'Stage Documents',
          'remarks' => $remarks,
          'created_id' => auth()->user()->id,
          'created_at' => NOW()
        ]);

      }
      else{

       return redirect()->route('ClaimPetion.show',$claimnoticeID)
       ->with('success','Statement of Objection Uploaded Successfully');
       File::cleanDirectory($fileDirPath);
     }
   }
   File::cleanDirectory($fileDirPath);
 }
 catch(Exception $exc)
 {

 }
}



public function getClaimPetionStageDocuments($id)
{
  $alfrescoURL = env('DOCUMENT_API').'/node/content/';
  $alfrescoTicket = '?a=true&alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
  $document = DatabaseHelper::getClaimPetionDocuments($id);

  $documentName = $document[0]->document_name;
  $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;
  
  return redirect($documentUrl);  


}




public function respodentclaimpetitionshow($id)
{
  try{
  $user_id = (auth()->check()) ? auth()->user()->id : null;
  Log::error('[Method => ClaimPetionController => ClaimPetionController_res => Step1=> Error Code:'.$user_id.':'.$id.']');

  if ( $user_id==null) 
  {
    Log::error('[Method => ClaimPetionController => ClaimPetionController_res => Step2=> Error Code:'.$user_id.':'.$id.']');
    return view('auth.login');
  }
  
$rtotal_pay_amt='';
$rextra_amt='';
$amount_additional='';
$total_pay_amt_check='';
$additional_payment=DB::select("select amount FROM additional_payment_email where claim_notice_id=".$id." and user_id=".$user_id." and payment_status is null");
if(!empty($additional_payment))
  {
$amount_additional=$additional_payment[0]->amount;

   $rpayment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");



    $rservice_percentage=($rpayment_service_amount[0]->service1_percentage)/100;

    $rextra_amt= $amount_additional * $rservice_percentage;

    // echo $total_fee;exit;

      // echo $registration_fees_amt;exit;

    $total_pay_amt_check=  $amount_additional+ $rextra_amt;
$total_pay=number_format((float)$total_pay_amt_check, 2, '.', ''); 
// print_r($total_pay);exit;
    $checking=is_float($total_pay_amt_check);
     $rtotal_pay_amt=str_replace(".", "", $total_pay);

    // if($checking)
    // {
    //   $rtotal_pay_amt=str_replace(".", "", $total_pay_amt_check);
    // }
    // else
    // {
    //   $rtotal_pay_amt=$total_pay_amt_check .'00';
    // }

        // echo $rtotal_pay_amt;exit;
}

  

     // if (Number.isInteger($rtotal_pay_amt))
     // {
     //  echo "in";exit;
     // }
     // else
     // {
     //  echo "in1";exit;
     // }

$claimnotices = DatabaseHelper::getClaimNoticeDetails($id);

$claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
$claimantinformations = DatabaseHelper::getclaimantinformationsall($id); 

$respondent_details=DatabaseHelper::respondent_details($id);

$respondent_amend=DatabaseHelper::respondent_amend($id);

          // dd($claimant_information);
$claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");
$claimandrelief = DatabaseHelper::getclaimandrelief($id);

$getclaim_details = DatabaseHelper::getclaim_details($id);

$respondantdetails = DatabaseHelper::getRespondantDetails($id); 

$claim_details = DatabaseHelper::getClaimDetails($id);

$claim_fees = DatabaseHelper::getClaimfeesDetails($id);

$relief_request = DatabaseHelper::getReliefRequest($id);

$claimnoticenatureofaward = DatabaseHelper::getnatureofclaimaward($id);

$claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);

$ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);
$ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id);
$Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);
$ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);
$ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);
$RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id);
$AwardedDcouments = DatabaseHelper::getAwardedDcouments($id);
$AdminAwardedDocuments = DatabaseHelper::getAdminAwardedDocuments($id);

$realestate_claim = DatabaseHelper::realestate_claim($id);
$realestate_claim_details = DatabaseHelper::realestate_claim_details($id);
$insurance_claim = DatabaseHelper::insurance_claim($id);
$insurance_claim_part_2 = DatabaseHelper::insurance_claim_part_2($id);
$family_claim = DatabaseHelper::family_claim($id);
$family_claim_movable = DatabaseHelper::family_claim_movable($id);
$contract_relief = DatabaseHelper::contract_relief($id);
$banking_claim_mort = DatabaseHelper::banking_claim_mort($id);
$banking_claim_hypo = DatabaseHelper::banking_claim_hypo($id);
$banking_claim_pledge = DatabaseHelper::banking_claim_pledge($id);
$banking_claim_personal = DatabaseHelper::banking_claim_personal($id);
$banking_claim_corporate = DatabaseHelper::banking_claim_corporate($id);
$banking_claim_mort_details = DatabaseHelper::banking_claim_mort_details($id);
$banking_claim_hypo_details = DatabaseHelper::banking_claim_hypo_details($id);
$banking_claim_pledge_details = DatabaseHelper::banking_claim_pledge_details($id);
$banking_claim_pro_details = DatabaseHelper::banking_claim_pro_details($id);
$banking_relief = DatabaseHelper::banking_relief($id);
$bank_account = DatabaseHelper::bank_account($id);

$ClaimNoticeStageStatus = DB::select("select * from claimnoticestagestatus");
$ClaimNoticeStatusCount = count($ClaimNoticeStage);
$dispute_categories = DisputeCategory::all();
$dispute_subcategories = DisputeSubcategory::all();

$respodentcounterclaimandrelief = DatabaseHelper::getrepondentclaimandrelief($id);

$respodentcounterclaimrealestate_claim = DatabaseHelper::respodentcounterclaimrealestate_claim($id);
$respodentcounterclaimrealestate_claim_details = DatabaseHelper::respodentcounterclaimrealestate_claim_details($id);
$respodentcounterclaiminsurance_claim = DatabaseHelper::respodentcounterclaiminsurance_claim($id);
$respodentcounterclaiminsurance_claim_part_2 = DatabaseHelper::respodentcounterclaiminsurance_claim_part_2($id);
$respodentcounterclaimfamily_claim = DatabaseHelper::respodentcounterclaimfamily_claim($id);
$respodentcounterclaimfamily_claim_movable = DatabaseHelper::respodentcounterclaimfamily_claim_movable($id);
$respodentcounterclaimcontract_relief = DatabaseHelper::respodentcounterclaimcontract_relief($id);
$respodentcounterclaimbanking_claim_mort = DatabaseHelper::respodentcounterclaimbanking_claim_mort($id);
$respodentcounterclaimbanking_claim_hypo = DatabaseHelper::respodentcounterclaimbanking_claim_hypo($id);
$respodentcounterclaimbanking_claim_pledge = DatabaseHelper::respodentcounterclaimbanking_claim_pledge($id);
$respodentcounterclaimbanking_claim_personal = DatabaseHelper::respodentcounterclaimbanking_claim_personal($id);
$respodentcounterclaimbanking_claim_corporate = DatabaseHelper::respodentcounterclaimbanking_claim_corporate($id);
$respodentcounterclaimbanking_claim_mort_details = DatabaseHelper::respodentcounterclaimbanking_claim_mort_details($id);
$respodentcounterclaimbanking_claim_hypo_details = DatabaseHelper::respodentcounterclaimbanking_claim_hypo_details($id);
$respodentcounterclaimbanking_claim_pledge_details = DatabaseHelper::respodentcounterclaimbanking_claim_pledge_details($id);
$respodentcounterclaimbanking_claim_pro_details = DatabaseHelper::respodentcounterclaimbanking_claim_pro_details($id);
$respodentcounterclaimbanking_relief = DatabaseHelper::respodentcounterclaimbanking_relief($id);
$respodentcounterclaimbank_account = DatabaseHelper::respodentcounterclaimbank_account($id);

$security_type = DatabaseHelper::security_type($id);
$renewal_date = DatabaseHelper::renewal_date($id);
$revival_date = DatabaseHelper::revival_date($id);

$legal_notice = DatabaseHelper::legal_notice($id);
$other_document = DatabaseHelper::other_document($id);

$security_type_counter = DatabaseHelper::security_type_counter($id);
$renewal_date_counter = DatabaseHelper::renewal_date_counter($id);
$revival_date_counter = DatabaseHelper::revival_date_counter($id);

$legal_notice_counter = DatabaseHelper::legal_notice_counter($id);
$other_document_counter = DatabaseHelper::other_document_counter($id);
$bank_account_counter= DatabaseHelper::bank_account_counter($id);
$additional_fees=DB::select("SELECT * FROM additional_payment_email WHERE payment_status is null and claim_notice_id=".$id." AND user_id=".$user_id);
$claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
  dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
  left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
  left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

  where ci.deleted_at is null and ci.claimnoticeid = ".$id ); 

$counter_claim_list=DatabaseHelper::counter_claim_list($id);


 Log::error('[Method => ClaimPetionController_res => 500_error_try => Step3=> Error Code:'.$user_id.':'.$id.']');


return view('ClaimPetion.respodentclaimpetitionshow', compact('additional_fees','claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimantclaimNoticeStageDocuments','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','RespondentclaimNoticeStageDocuments','AwardedDcouments','AdminAwardedDocuments','claimandrelief','getclaim_details','claimnoticenatureofaward','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend','rextra_amt','amount_additional','rtotal_pay_amt','total_pay_amt_check'));
Log::error('[Method => ClaimPetionController_res => 500_error_try => Step4=> Error Code:'.$user_id.':'.$id.']');
}
catch(Exception $exc)
{
   Log::error('[Method => ClaimPetionController_res => 500_error_catch => Step5=> Error Code:'.$exc.']');
}
}

public function respodentclaimpetition()
{   
  $user_id = (auth()->check()) ? auth()->user()->id : null;
  if ( $user_id==null)
  {

    return view('auth.login');
  }
// echo($user_id);exit;
  $claimnotice = DB::select("select distinct pet.id,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s')  created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,rp.user_id as respondant_id,rp.poa_holder,rp.auth_name,rp.poa_holder,rp.firstname,rp.lastname,rp.address,
    dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name,pet.arbitration_petionno, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code  from claimantnotice sm
    left join claimantregister cr on (cr.user_id = sm.userid)
    inner join claim_fees cf on (cf.claimnoticeid =sm.id )
    INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
    inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
    inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
    inner join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
    left join respondantdetails rp on (rp.claimnoticeid = sm.id)
    inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
    LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
    where rp.user_id =  ". Auth::user()->id."  order by pet.id desc");

  $additional_fees=array();
  $claimantamend1=array();
      // dd($claimnotice);
  foreach ($claimnotice as $fees) {
        // array_push($claimnoticeid,$claimnotice->claimid);
    $claimnoticeid=$fees->id;

    $additional_fees[]=DB::select("SELECT * FROM additional_payment_email WHERE claim_notice_id=".$claimnoticeid." AND user_id=".$user_id);
    $claimantamend1[] = DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Respondent ClaimNotice Amend'  and  claimnoticeid=".$claimnoticeid . " and created_id = " .Auth::user()->id);
  }
  $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,ci.company_name,ci.proprietar_name,
    ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
    crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
    left join claimant_respondant_type  crt on (crt.id = ci.respondant_type)
    left join users us on (us.id = ci.user_id) where ci.deleted_at is null and ci.user_id=".auth()->user()->id);

  return view('ClaimPetion.respodentclaimpetition', compact('claimnotice','respondantinformations','additional_fees','claimantamend1'));       
}
private function storeDocumentamend($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/claimantamend/'.$folderName;

    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claimant Amend';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      $objResponse = json_decode($response, TRUE);

      $documentNode = $objResponse['nodeRef'];
      $arrWorkSpace = explode('://', $documentNode);
      $arrStore = explode('/', $arrWorkSpace[1]);
      $workspace = $arrWorkSpace[0];
      $spaceStore = $arrStore[0];
      $alfrescoDocumentName = $arrStore[1];

      DB::table('claimnoticedocumentdetails')->insert([
        'claimnoticeid' => $claimnoticeID,
        'node_ref' => $documentNode,
        'work_space' => $workspace,
        'space_store' => $spaceStore,
        'alfresco_document_name' => $alfrescoDocumentName,
        'document_name' => $value,
        'file_extension' => $fileExtension,
        'document_type' => $document_Type,
        'claimant_respondent_type' => $claimant_respondent_type,
        'claimant_respondent_id' => $claimant_respondent_id,
        'created_id' => auth()->user()->id,
        'created_at' => NOW()
      ]);
    }
  }
  catch(Exception $exc)
  {

  }
}

private function storeresamendDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/respondentamend/'.$folderName;

    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Respondent Amend';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      $objResponse = json_decode($response, TRUE);

      $documentNode = $objResponse['nodeRef'];
      $arrWorkSpace = explode('://', $documentNode);
      $arrStore = explode('/', $arrWorkSpace[1]);
      $workspace = $arrWorkSpace[0];
      $spaceStore = $arrStore[0];
      $alfrescoDocumentName = $arrStore[1];

      DB::table('claimnoticedocumentdetails')->insert([
        'claimnoticeid' => $claimnoticeID,
        'node_ref' => $documentNode,
        'work_space' => $workspace,
        'space_store' => $spaceStore,
        'alfresco_document_name' => $alfrescoDocumentName,
        'document_name' => $value,
        'file_extension' => $fileExtension,
        'document_type' => $document_Type,
        'claimant_respondent_type' => $claimant_respondent_type,
        'claimant_respondent_id' => $claimant_respondent_id,
        'created_id' => auth()->user()->id,
        'created_at' => NOW()
      ]);
    }
  }
  catch(Exception $exc)
  {

  }
}
}
