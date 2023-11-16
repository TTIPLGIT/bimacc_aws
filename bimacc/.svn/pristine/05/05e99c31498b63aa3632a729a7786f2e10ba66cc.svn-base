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
use Illuminate\Support\Facades\Mail;
use App\models\ClaimNoticeStage;
use DB;
use validator;
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
use App\models\notifications;

class ClaimPetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
       $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }


      $claimnotice = DB::select("select distinct pet.id,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,pet.arbitration_petionno from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
        where sm.isstageinitiated ='Y' order by pet.id desc");

      $arbitratorlist = ArbitrationMaster::all();

      $claimant_informations = ClaimantInformation::all();        

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id');                              

      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
      $dispute_subcategories = DB::table('dispute_subcategories')->get();    

      return view('ClaimPetition.index', compact('claimnotice','arbitratorlist','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('AwardedClaim.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

    // echo date('Y-m-d H:i',strtotime('+30 days'));
      $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);

       $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
      $claimandrelief = DatabaseHelper::getclaimandrelief($id);

      $getclaim_details = DatabaseHelper::getclaim_details($id);

      $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

      $claim_details = DatabaseHelper::getClaimDetails($id);

      $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

      $claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);

      $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id); 

      $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id); 

      $claimnoticenatureofaward = DatabaseHelper::getnatureofclaimaward($id);

         $claimantinformations =DatabaseHelper::getclaimantinformationsall($id);   
       $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");

      //echo json_encode($claimnoticenatureofaward); exit;

      $relief_request = DatabaseHelper::getReliefRequest($id);

      $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);

      $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);

      $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);

      $ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);

      $RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id); 

      $AwardedDcouments = DatabaseHelper::getAwardedDcouments($id);

      $AdminAwardedDocuments = DatabaseHelper::getAdminAwardedDocuments($id);    

     $ClaimNoticeStatusCount = count($ClaimNoticeStage);

     $arbitratorlist = ArbitrationMaster::all();
     $dispute_categories = DisputeCategory::all();
     $dispute_subcategories = DisputeSubcategory::all();

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
$claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );

$counter_claim_list=DatabaseHelper::counter_claim_list($id);

      
     return view('ClaimPetition.show', compact('claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','ClaimantclaimNoticeStageDocuments','RespondentclaimNoticeStageDocuments','AwardedDcouments','AdminAwardedDocuments','claimandrelief','getclaim_details','claimnoticenatureofaward','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'));

   }



   //Awadred Documents

   public function update(Request $request, $id)
   {
     //echo $request->claimantnotice_stage_status; exit;
     $arbitration_petionno = $request->arbitration_petionno;
     $claimantnotice_Stage =$request->claimantnotice_Stage;

     $folderName = $request->arbitration_petionno;
     $documentDirectory = $request->alfresco_stage_folderuniqueid; 
     $claimnoticeID = $request->claimnoticeid;
     $stageid = $request->claimnoticestageid;
     $nature_of_award = $request->nature_of_award;
     $notes = $request->notes;

      // echo $request->claimantnotice_stage_status; exit;

   //  echo $nature_of_award; exit;
     if($request->claimantnotice_stage_status == null )
     {
      $claimantnotice_stage_status='Disposed';
     }
     else if($request->claimantnotice_stage_status == 'Send Back To Arbitrator')
     {
     $claimantnotice_stage_status=$request->claimantnotice_stage_status;
     }
     else
     {
      $claimantnotice_stage_status=$request->claimantnotice_stage_status;
     }
// echo $claimantnotice_stage_status;exit;
     $table = DB::table('claimantnotice_stage')
     ->where('id' , $stageid)
     ->update(['claimantnotice_stage_status' => $claimantnotice_stage_status,'notes' => $notes],
              );
     

     $claimstagestatus = new claimstagestatus(); 
     $claimstagestatus->stageid = $stageid;
     $claimstagestatus->claimnoticestatus  = $claimantnotice_stage_status;
     $claimstagestatus->created_id = Auth::user()->id;        
     $claimstagestatus->save();

      $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
    $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
    $ClaimantNoticeStatus->claimantnoticestatus = $claimantnotice_stage_status;
    $ClaimantNoticeStatus->userid = Auth::user()->id;  
    $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
    $ClaimantNoticeStatus->created_id = Auth::user()->id;        
    $ClaimantNoticeStatus->save();
 
      $table = DB::table('claimantnotice')
     ->where('id' , $request->claimnoticeid)
     ->update(['claimnoticestatus' =>$claimantnotice_stage_status]);
     $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
     $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
     $ClaimantNoticeStatus->claimantnoticestatus = $claimantnotice_Stage.' - '.$claimantnotice_stage_status;
     $ClaimantNoticeStatus->userid = Auth::user()->id;
     $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));   
     $ClaimantNoticeStatus->created_id = Auth::user()->id;        
     $ClaimantNoticeStatus->save();
   // echo  $claimantnotice_stage_status;exit; 

    if ( $claimantnotice_stage_status== 'Disposed' || $claimantnotice_stage_status== 'Send Back To Arbitrator')
    {

    
     


     $newclaimant = [
      'body' => $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$claimantnotice_stage_status,
      'actionURL' => route('claimantsnoticelist.index'),
    ];


    $type = 'ClaimNotice';
    $latest = '1';
    $name = $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$claimantnotice_stage_status;
    $notifiable_type = $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$claimantnotice_stage_status;
    $newclaimant =  json_encode($newclaimant);
    $created_at = now();
    $updated_at = now();
    // echo "Sample"; exit;


    if($request->hasFile('awardedstatementdocumentbycenter'))
    {
      //echo "success doxcument"; exit;
      $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno);
      $imageFile = $request->file('awardedstatementdocumentbycenter');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }


  //  echo "success"; exit;

    $stagestatus = $claimantnotice_Stage.' '.$claimantnotice_stage_status;
    $table = DB::table('claimantnotice')
    ->where('id' , $request->claimnoticeid)
    ->update(['claimnoticestatus' => $claimantnotice_stage_status],['awardedstatement' => $request->awardedstatement]);

   

    $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id,res.firstname, 
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
      $notification->registration_claimnotice_id =$request->claimnoticeid;   
      $notification->save(); 

      $repondentmail = $RespondentInformations->email;
      $data = array(
        'email' => $RespondentInformations->email,
        'firstname' => $RespondentInformations->firstname,
        'arbitration_petionno'=>$arbitration_petionno,
        
      );

      //send email to respondant

      Mail::send('emails.admintorespondent', ["data3"=>$data], function($message) use ($repondentmail,$data,$stagestatus,$arbitration_petionno){
        // echo "awarde"; exit;
        $message->to($repondentmail)
        ->subject('Reg. Electronic Arbitration System - Claim Petition  ('.$arbitration_petionno.') - Award Released ');   
       

      });      
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
// echo "award"; exit;
      Mail::send('emails.admintoarbitrator', ["data3"=>$data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
        $message->to($arbitratoremail)
        ->subject('Electronic Arbitration System (EAS)-  Award - Claim Petition (No:'.$arbitration_petionno.') ');     
      }); 
     

    }

    $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, res.username,
      res.phone as daytimetelephone,res.email from claimantnotice sm 
      INNER  join claimantregister res on (res.user_id =  sm.userid) 
      where sm.id=".$request->claimnoticeid);

    foreach ($claimant as $claimants)
    {
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $claimants->userid;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;  
      $notification->registration_claimnotice_id =$request->claimnoticeid;   
      $notification->save();  

      $claimantsmail  = $claimants->email;
      $data = array(
        'email' => $claimants->email,
          'username' => $claimants->username,
          'arbitration_petionno'=>$arbitration_petionno,

      );

      Mail::send('emails.admintoclaimant', ["data1"=>$data], function($message) use ($claimantsmail,$data,$stagestatus,$arbitration_petionno){
        // echo("hjh"); exit;
        $message->to($claimantsmail)
        ->subject('Reg. Electronic Arbitration System - Claim Petition  ('.$arbitration_petionno.') - Award Released ');   
      }); 
     

    }
    $this->storeDocument($folderName, $documentDirectory,$claimnoticeID,$stageid,$request->remarks);

    return redirect()->route('AwardedClaim.show',$request->claimnoticeid)
    ->with('success','Centre Decision Taken Successfully');
  }
  else{
    $mail_ids=$request['mail_id'];
    // dd($request);
    foreach ($mail_ids as $key => $mail){
      // dd($request[$mail]);
    } 

    $input = [
            'claim_notice_id' => $request['claimnoticeid'],
            
            'mail_id' => $request['mail_id'],

            'amount'  =>$request['amount']
        ];

           // echo json_encode($input); exit;

       
            DB::transaction(function() use($input,$arbitration_petionno)
            {

            
             $mail_id = implode(",", $input['mail_id']);

             $user = DB::select("select * from users where id in (".$mail_id.")");

             foreach ($user as $key => $userdetails) 
             {
              $amount_addition=$input['amount'][$userdetails->id];
                $additional_payment_email = DB::table('additional_payment_email')->insertGetId([
                    'claim_notice_id' => $input['claim_notice_id'],
                    
                    'email_id' => $userdetails->email, 
                     'amount' => $amount_addition,                        
                    'user_id' => $userdetails->id,
                    'created_id' => auth()->user()->id,
                    'created_at' => NOW()
                ]);

                 $currency1 =  DB::select("SELECT currency FROM claimant_informations where claimnoticeid =".$input['claim_notice_id']);

                 $currency_fetch=$currency1[0]->currency;

                $data = array(
                  'name' => $userdetails->name,
                  'email' => $userdetails->email,
                  'arbitration_petionno'=>$arbitration_petionno,
                  'amount' => $amount_addition,
                  'currency_fetch' =>$currency_fetch,
                     
              );

                $email =$userdetails->email;

                $claimnotice =  DB::select("SELECT * FROM claimantnotice where id =".$input['claim_notice_id']);



                $claimnoticeno = $claimnotice[0]->claimnoticeno;

                Mail::send('emails.additionalpayment',["data1"=>$data] , function($message) use ($data, $email,$claimnoticeno,$arbitration_petionno)
                {
                    $message->to($email)
                     ->subject('Reg. Electronic Arbitration System - Claim Petition  ('.$arbitration_petionno.') -Award Reserved ');
                });
            }
        });
        
         return redirect()->route('AwardedClaim.show',$request->claimnoticeid)
    ->with('success','Additional Payment Link is Released');
  }
  }


  private function storeDocument($claimpetion_arbitrationNo, $documentDirectory,$claimnoticeID,$stageid,$remarks)
  {

  //  echo $documentDirectory; exit;
    try
    {
      $fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimpetion_arbitrationNo);

    //  echo $fileDirPath; exit;

      $files = array_diff(scandir($fileDirPath), array('.', '..'));

    //  echo json_encode($files); exit;
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

        $documentNode = $objResponse['nodeRef'];
        $arrWorkSpace = explode('://', $documentNode);
        $arrStore = explode('/', $arrWorkSpace[1]);
        $workspace = $arrWorkSpace[0];
        $spaceStore = $arrStore[0];
        $alfrescoDocumentName = $arrStore[1];

        DB::table('claimnoticedocumentdetails')->insert([
          'claimnoticeid' => $claimnoticeID,
          'stageid'=>$stageid,
          'node_ref' => $documentNode,
          'work_space' => $workspace,
          'space_store' => $spaceStore,
          'alfresco_document_name' => $alfrescoDocumentName,
          'document_name' => $value,
          'file_extension' => $fileExtension,
          'document_type' => 'Disposed',
          'remarks' => $remarks,
          'created_id' => auth()->user()->id,
          'created_at' => NOW()
        ]);
      }
      else{

      return redirect()->route('ClaimPetition.show',$claimnoticeid)
    ->with('success','Centre Decision Taken Successfully');
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
    $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
    $document = DatabaseHelper::getClaimPetionDocuments($id);

    $documentName = $document[0]->document_name;
    $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;
    $headers = array(
      'Content-Type: application/pdf',
    );
    return redirect($documentUrl);
  }

}
