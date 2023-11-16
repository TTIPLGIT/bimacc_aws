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
use DB;
use Auth;
use App\User;
use Session;
use Input;
use Redirect;
use PDF;
use App\AlfrescoDocument;
use App\DatabaseHelper;

class ArbitratorAllocatedClaimsController extends Controller
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
      $claimnotice = DB::select("select distinct sm.claimnoticeno,cpa.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )

        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
         left join claimnotice_petion_arbitrationno cpa on (cpa.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        where cac.arbitrator_id= ".Auth::user()->id. " order by sm.id desc");


      $arbitratorlist = ArbitrationMaster::all();

      $claimant_informations = ClaimantInformation::all();        

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id');                              
      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
      $dispute_subcategories = DB::table('dispute_subcategories')->get();    

      return view('ArbitratorAllocatedClaims.index', compact('claimnotice','arbitratorlist','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('ArbitratorAllocatedClaims.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = $request->claimnoticeid;
      $claimnotices = DB::select("select  sm.claimnoticeno,sm.claimnoticestatus,sm.created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name,cr.username, (cr.firstname + cr.lastname) as name,cr.phone,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.id=".$id);


      $claimnotice = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,DATE_FORMAT(sm.created_at,'%d/%m/%Y') created_at,cf.claim_amount,sm.id,res.user_id,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join respondantdetails res on (res.claimnoticeid = sm.id)
        left join claim_fees cf on (cf.claimnoticeid =sm.id )
        left join dispute_categories dc on (cf.dispute_categories_id = dc.id)
        left join dispute_subcategories dcp on (dcp.id = cf.dispute_subcategories_id) where sm.id=".$id);      


     //send mail claim notice

      foreach ($claimnotice as $claimnotice) {
        $useridnew= $claimnotice->user_id; 
        $data1 = array(
          'claimnoticeno' => $claimnotice->claimnoticeno,
          'claimnoticestatus' => $claimnotice->claimnoticestatus,
          'claim_amount' => $claimnotice->claim_amount,
          'user_id' => $claimnotice->user_id,
          'category_name' => $claimnotice->category_name,
          'subcategory_name' => $claimnotice->subcategory_name,
        );

      }
      //send mail claimant details

      $claimant_informations = DB::select("select ci.name,ci.address,ci.country,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type from claimant_informations ci
        left join claimant_respondant_type crt on (crt.id =ci.claimant_type ) where ci.claimnoticeid=".$id);
      foreach ($claimant_informations as $claimant_information){
        $data2 = array(
          'name' => $claimant_information->name,
          'email' => $claimant_information->email,
          'daytimetelephone' => $claimant_information->daytimetelephone,
          'claimant_type' => $claimant_information->claimant_type,
          'address' => $claimant_information->address,
          'city' => $claimant_information->city,
        );

      } 

   //send mail respondant details

      $respondantdetails = DB::select("select ci.firstname,ci.address,ci.email,ci.country,ci.state,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as respondant_type from respondantdetails ci
        left join claimant_respondant_type crt on (crt.id =ci.respondant_type ) where ci.claimnoticeid=".$id); 




      foreach ($respondantdetails as $respondantdetail ) {

       $data3 = array(
        'firstname' => $respondantdetail->firstname,
        'email' => $respondantdetail->email,
        'address' => $respondantdetail->address,
        'country' => $respondantdetail->country,
        'state' => $respondantdetail->state,
        'city' => $respondantdetail->city,
        'daytimetelephone' => $respondantdetail->daytimetelephone,
        'respondant_type' => $respondantdetail->respondant_type,
        
      );


     }

   //claim details send to email 

     $claim_details = DB::select("select * from claim_details where claimnoticeid=".$id);

     foreach($claim_details as $claim_detail){
      $data4 = array(
        'account_name' => $claim_detail->account_name,
        'type_account' => $claim_detail->type_account,
        'name_of_the_branch' => $claim_detail->name_of_the_branch,
        'date_of_account_opened' => $claim_detail->date_of_account_opened,
        'name_of_the_registered_representative' => $claim_detail->name_of_the_registered_representative,
        'dispute_categories_id' => $claim_detail->dispute_categories_id,
        'dispute_subcategories_id' => $claim_detail->dispute_subcategories_id,
        'claimnoticeid' => $claim_detail->claimnoticeid,
        'commercial_monthly' => $claim_detail->commercial_monthly,
        'loan_taken_date' => $claim_detail->loan_taken_date,
        'percentage_interest' => $claim_detail->percentage_interest,
        'NPADate' => $claim_detail->NPADate,
        'Applicants' => $claim_detail->Applicants,
        'total_amount' => $claim_detail->total_amount,
        'Total_Outstanding_Amount' => $claim_detail->Total_Outstanding_Amount,
        'Total_Outstanding_Amount_Compund_Monthly' => $claim_detail->Total_Outstanding_Amount_Compund_Monthly,
        'claim_details_Remarks' => $claim_detail->claim_details_Remarks,
      );

    }

    //Releif Request send to email 

    //$relief_requests = DB::select("select * from relief_request where claimnoticeid=".$id);



    $claimnoticestatus = '';
    $Arbitratordecision = $request->isAgreeorDisagree;
    $reason_disagree = $request->reason_disagree;
   // echo  $request->claimnoticeid; exit;
    if ($Arbitratordecision =='Agree') {
     $claimnoticestatus = 'Arbitrator Approved and Pleadings Initiated';
   }
   else
   {
    $claimnoticestatus = 'Arbitrator Rejected';
  }
  if ($Arbitratordecision =='DisAgree')
  {
    $Arbitrator_disagreement = DB::table('Arbitrator_disagreement')
    ->insertGetId([        
      'reason_disagree' => $reason_disagree,
      'dispute_name' =>$claimnotice->dispute_categories_id,
      'claim_notice_id' => $request->claimnoticeid,
      'arbitrator_id' => Auth::user()->id,    
      'created_id' =>  Auth::user()->id,

    ]); 
    DB::delete('delete from claimant_arbitrator_configuration where claimnoticeid ='.$request->claimnoticeid);
  } 

  
  if ($Arbitratordecision=='Agree') 
  {
    $ArbitratorConfigurationUpdate = DB::table('claimant_arbitrator_configuration')
  ->where(['arbitrator_id'=>Auth::user()->id,'claimnoticeid' => $request->claimnoticeid])
  ->update(['isAgreeorDisagree' => $request->isAgreeorDisagree],['isundertake' => $request->isundertake],
    ['arbitratorRemarks' => $request->arbitratorRemarks]);

    $arbitrationodetails =DB::table('claimnotice_petion_arbitrationno')->orderBy('id', 'desc')->first();
    if ($arbitrationodetails ==null) 
    {
      $ArbitrationNo =  'ARB/EAS/'.date("Y").'/001';
    }
    else
    {
      $ArbitrationNo = $arbitrationodetails->arbitration_petionno;
        $ArbitrationNo =  ++$ArbitrationNo;  // AAA004  
      }


      $claimdetails =DB::select("select claimnoticeno from claimantnotice where id = ".$request->claimnoticeid); 

      foreach ($claimdetails as $key => $notice) {
       $claimnoticenoNEw = $notice->claimnoticeno;
     }


      $ClaimPetitionparentFolder = 'documentLibrary/Claim/ClaimPetition';
      $ClaimPetitionfolderName = str_replace('/', '_', $ArbitrationNo);
      $ClaimPetitionfolderTitle = 'Claim Notice '. $ArbitrationNo;
      $ClaimPetitionfolderDescription = 'Claim Notice '. $ArbitrationNo;
      $ClaimPetitiondocumentDirectory = AlfrescoDocument::SetAlfrescoFolder($ClaimPetitionparentFolder, $ClaimPetitionfolderName, $ClaimPetitionfolderTitle, $ClaimPetitionfolderDescription);


//Send To Admin

     $newclaimant = [
      'body' => $claimnoticenoNEw.' '.'Arbitratior Approved and Pleadings Initiated',
      'actionURL' => route('claimantsnoticelist.index'),
    ];

    $type =  'ClaimNotice';
    $latest = '1';
    $name = $claimnoticenoNEw.' '.'Arbitratior Approved and Pleadings Initiated';
    $notifiable_type = $claimnoticenoNEw.' '.'Arbitratior Approved and Pleadings Initiated';
    $newclaimant =  json_encode($newclaimant);
    $created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
    $updated_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));


    $fromDate = date('Y-m-d H:i',strtotime('+0 days'));
    $todate = date('Y-m-d H:i',strtotime('+30 days'));
    $claimantnotice_Stage = "Pleadings";
    $claimantnotice_stage_description ="For Filling Pleadings";
    $ArbitratorStaging = str_replace('/', '_', $claimnoticenoNEw).'_'.$claimantnotice_Stage;
    $parentFolder = 'documentLibrary/Claim/ClaimPetition/'.str_replace('/', '_', $ArbitrationNo);
    $folderName = $ArbitratorStaging;
    $folderTitle = 'Staging '. $ArbitratorStaging;
    $folderDescription = 'Claim Notice Staging'. $ArbitratorStaging;
    // command start
    $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
    // command end

    $table = DB::table('claimantnotice')
    ->where('id' , $request->claimnoticeid)
    ->update(['isstageinitiated' => 'Y','claimpetitionalfrescouniquefolder_id' =>$ClaimPetitiondocumentDirectory ]);

    $claimnotice_petion_arbitrationno = new claimnotice_petion_arbitrationno(); 
    $claimnotice_petion_arbitrationno->claimnoticeid = $request->claimnoticeid;
    $claimnotice_petion_arbitrationno->arbitration_petionno  = $ArbitrationNo;
    $claimnotice_petion_arbitrationno->created_id = Auth::user()->id;   
    $claimnotice_petion_arbitrationno->updated_id = Auth::user()->id;        
    $claimnotice_petion_arbitrationno->save();

    $Claim_Notice_Stage = new ClaimNoticeStage();
    $Claim_Notice_Stage->claimantnotice_Stage = $claimantnotice_Stage;
    $Claim_Notice_Stage->claimantnotice_stage_description = $claimantnotice_stage_description;
    // command start
    $Claim_Notice_Stage->alfresco_stage_folderuniqueid = $documentDirectory;
    // command end
    $Claim_Notice_Stage->stagefromdate = $fromDate;
    $Claim_Notice_Stage->stagetodate = $todate;
    $Claim_Notice_Stage->claimnoticeid = $request->claimnoticeid;
    $Claim_Notice_Stage->claimantnotice_stage_status = "InProgress";
    $Claim_Notice_Stage->created_id = Auth::user()->id;
    $Claim_Notice_Stage->save();
    $Claim_Notice_StageID =  DB::getPdo()->lastInsertId();


    $claimstagestatus = new claimstagestatus(); 
    $claimstagestatus->stageid = $Claim_Notice_StageID;
    $claimstagestatus->claimnoticestatus  = 'Claim Petition Initiated';
    $claimstagestatus->created_id = Auth::user()->id;        
    $claimstagestatus->save();



    $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
      res.phone as daytimetelephone,res.email,res.username  from claimantnotice sm 
      INNER  join claimantregister res on (res.user_id =  sm.userid) 
      where sm.id=".$request->claimnoticeid);

     $get_arbitrator = DB::select("SELECT am.username from claimant_arbitrator_configuration cpa   
      INNER  join arbitration_masters am on (am.user_id =  cpa.arbitrator_id) 

      where cpa.claimnoticeid=".$request->claimnoticeid);
     $arbitrator_name=$get_arbitrator[0]->username;

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
      $notification->registration_claimnotice_id =$id;   
      $notification->save();  
      $claimantsmail  = $claimants->email;

      $data = array(
        'email' => $claimants->email,
        'username' => $claimants->username,
        'claimnoticeno' => $claimants->claimnoticeno,
        'ArbitrationNo' => $ArbitrationNo,
        'arbitrator_name'=>$arbitrator_name,

      );
      

      Mail::send('emails.claim_petition', ["data1"=>$data], function($message) use ($claimantsmail,$data,$ArbitrationNo){
        $message->to($claimantsmail)
        ->subject('ElectronicArbitration System (EAS)- Claim Petition (No:'.$ArbitrationNo.') -  Appointment of Arbitrator'); 
       
  
      }); 

    }

    $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.firstname,res.user_id, res.daytimetelephone,res.email from claimantnotice sm 
      INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$id);

    $get_arbitrator = DB::select("SELECT am.username from claimant_arbitrator_configuration cpa   
      INNER  join arbitration_masters am on (am.user_id =  cpa.arbitrator_id) 

      where cpa.claimnoticeid=".$request->claimnoticeid);
     $arbitrator_name=$get_arbitrator[0]->username;



    foreach ($RespondentInformation as $RespondentInformations)
    {

      //Write Mail Content

      $respondentemail = $RespondentInformations->email;

      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $RespondentInformations->user_id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;  
      $notification->registration_claimnotice_id =$id;   
      $notification->save(); 

      $data = array(
        'email' => $RespondentInformations->email,
        'firstname' => $RespondentInformations->firstname,
        'email' => $RespondentInformations->email,
        'claimnoticeno' => $RespondentInformations->claimnoticeno,
        'ArbitrationNo' => $ArbitrationNo,
        'arbitrator_name'=>$arbitrator_name,

      );

      Mail::send('emails.respondant',  ["data3"=>$data], function($message) use ($respondentemail,$data,$ArbitrationNo){
        $message->to($respondentemail)
        ->subject('ElectronicArbitration System (EAS)- Claim Petition (No:'.$ArbitrationNo.') -  Appointment of Arbitrator');   
      });       

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
      $notification->registration_claimnotice_id =$id;   
      $notification->save();       
      $data = array(
        'email' => $Adminemail->email,
      );

      $adminmail = $Adminemail->email;
      Mail::send('emails.arbitratortoadmin', $data, function($message) use ($respondentemail,$data,$ArbitrationNo,$adminmail){ 
        $message->to($adminmail)
        ->subject('Online Arbitration System(Claim Petition No:'.$ArbitrationNo.') - Arbitrator Claim Petition Initiated'); 
      });

    }

  }
  $table = DB::table('claimantnotice')
  ->where('id' , $request->claimnoticeid)
  ->update(['claimnoticestatus' => $claimnoticestatus]);
  $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
  $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
  $ClaimantNoticeStatus->claimantnoticestatus = $claimnoticestatus;
  $ClaimantNoticeStatus->userid = Auth::user()->id;  
  $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
  $ClaimantNoticeStatus->created_id = Auth::user()->id;        
  $ClaimantNoticeStatus->save();

  // $data = [ 
  //   "data1" => $data1, 
  //   "data2" => $data2,
  //   "data3" => $data3,
  //   "data4" => $data4,
  //   "data5" =>$data5,
  //   "data6" =>$data6,
  // ];

 



  return redirect()->route('ArbitratorAllocatedClaims.index')
  ->with('success','Arbitrator Decision Taken Successfully. Please Wait for Further Updates');
}

public function show($id)
{
  $user_id = (auth()->check()) ? auth()->user()->id : null;
  if ( $user_id==null)
  {

    return view('auth.login');
  }
  $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);

  $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
  $claimandrelief = DatabaseHelper::getclaimandrelief($id);

  $getclaim_details = DatabaseHelper::getclaim_details($id);
  $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

  $claim_details = DatabaseHelper::getClaimDetails($id);

  $claim_fees = DatabaseHelper::getClaimfeesDetails($id);
  $relief_request = DatabaseHelper::getReliefRequest($id);
  $claimnoticenatureofaward = DatabaseHelper::getnatureofclaimaward($id);
  $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");


    $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);
    $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);  


// commandstart
  // $claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);
     // commandend

  $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);
  $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id);
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


  
  return view('ArbitratorAllocatedClaims.show', compact('claimant_dispute','claimant_information','respondantdetails','AdminAwardedDocuments','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','ClaimantclaimNoticeStageDocuments','RespondentclaimNoticeStageDocuments','AwardedDcouments','claimandrelief','getclaim_details','claimnoticenatureofaward','claimanttype','claimantinformations','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'));

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  }
