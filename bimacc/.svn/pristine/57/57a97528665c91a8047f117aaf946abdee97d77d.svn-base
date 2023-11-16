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
use App\models\notifications;
use App\Mail\DocumentMail;
use Illuminate\Support\Facades\Mail;
use Log;
use App\models\User;
use App\AlfrescoDocument; 
use App\DatabaseHelper;
use DB;
use Session;
use Auth;
use Role;
use Input; 
use Redirect;
use PDF;
use File;
use Datatables; 
use Storage;
use Filesystem; 
use Razorpay\Api\Api;

use Exception;


class ClaimantrespondantaccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
      $user_id = (auth()->check()) ? auth()->user()->id : null;
       // echo $user_id; exit;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      session()->flash('ClaimNoticeID');

      
      
      
      $claimnotice = DB::select("select distinct sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name,cr.username,cr.phone,rp.firstname,rp.user_id as respondant_id,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name,rp.auth_name,rp.poa_holder,rp.firstname,rp.lastname,rp.address,rp.age,rp.auth_age from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        left join respondantdetails rp on (rp.claimnoticeid = sm.id)
        where rp.user_id =  ". Auth::user()->id."  order by sm.id desc");
      $res_fees=array();
      $claimantamend=array();
      $claimantamend1=array();

      // dd($claimnotice);  
      foreach ($claimnotice as $fees) {
        // array_push($claimnoticeid,$claimnotice->claimid);
        $claimnoticeid=$fees->claimid;
        $res_fees[]=DB::select("SELECT * FROM respondentfees WHERE claimnoticeid=".$claimnoticeid." and user_id=".Auth::user()->id." and fees_type='Administartion'");

        $claimantamend[] = DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Respondent Details Amend'  and  claimnoticeid=".$claimnoticeid . " and created_id = " .Auth::user()->id);
        $claimantamend1[] = DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Respondent ClaimNotice Amend'  and  claimnoticeid=".$claimnoticeid . " and created_id = " .Auth::user()->id);

  // dd($claimantamend); 
      }
      // echo json_encode($claimnoticeid); exit;


      $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,ci.company_name,ci.proprietar_name,
        ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
        crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
        left join claimant_respondant_type  crt on (crt.id = ci.respondant_type)
        left join users us on (us.id = ci.user_id) where ci.deleted_at is null and ci.user_id=".auth()->user()->id); 



      return view('claimantrespondantaccess.index', compact('claimnotice','respondantinformations','res_fees','claimantamend','claimantamend1')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      // echo auth()->user()->id;exit;
      if ( $user_id==null)
      { 

        return view('auth.login');
      }
      $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);

      $rtotal_pay_amt='';
      $rextra_amt='';
      $rtotal_pay_amt_check='';
      $arbfees=''; 
      $adminfee='';
      $total_pay_amt='';
      $extra_amt='';
      $total_pay_amt_check='';
      $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request   WHERE claimnoticeid = ".$id." and user_id=".auth()->user()->id." and is_respondant='1'");

      if(!empty($totalclaimamount))
      {

       $user_currency= DB::select("SELECT currency as currency FROM claimant_informations  WHERE claimnoticeid = ".$id."");

       $selected_currency=$user_currency[0]->currency;

       if ($totalclaimamount[0]->total_amount != null ) {
         $total_amount = str_replace( ',', '', $totalclaimamount[0]->total_amount ) ;
       }
       else
       {
        $total_amount =  '0';
      }



      $arbitrator_allocation_fees = DB::select("SELECT aa.adminstration_fees,aa.arbitartion_percentage,aa.arbitrator_fees FROM arbitrator_allocation_fees aa
        inner JOIN claimant_informations cl ON(cl.currency=aa.currency)
        WHERE " .$total_amount." between aa.claim_amount_form and aa.claim_amount_to  AND cl.claimnoticeid=".$id );

      $user_currency= DB::select("SELECT currency as currency FROM claimant_informations  WHERE claimnoticeid = ".$id."");

      $selected_currency=$user_currency[0]->currency;

      if (count($arbitrator_allocation_fees) ==0)  

      {
       $arbfees=0; 
       $adminfee=0;

     }
     else
     {

      $arbfee_percentage=($arbitrator_allocation_fees[0]->arbitartion_percentage) /100;
      $adminfee = str_replace( ',', '', $arbitrator_allocation_fees[0]->adminstration_fees );
      $arbfees=str_replace( ',', '', $arbitrator_allocation_fees[0]->arbitrator_fees )+($arbfee_percentage * $total_amount);
    }
    

    if($arbfees >3000000 && $selected_currency=='INR')
    {
      $arbfees=3000000; 
    }
    else if($arbfees >100000 && $selected_currency=='USD')
    {
      $arbfees=100000;
    }



    $total_fee=$arbfees + $adminfee;






    $rpayment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");



    $rservice_percentage=($rpayment_service_amount[0]->service1_percentage)/100;

    $rextra_amt= $total_fee * $rservice_percentage;

    // echo $total_fee;exit;

      // echo $registration_fees_amt;exit;

    // $rtotal_pay_amt=  $total_fee+ $rextra_amt;

    $rtotal_pay_amt_check=  $total_fee+ $rextra_amt; 


    $total_pay=number_format((float)$rtotal_pay_amt_check, 2, '.', ''); 

    
    $rtotal_pay_amt=str_replace(".", "", $total_pay);

     // print_r($rtotal_pay_amt_check);exit;
  }


     // $respondent_decision = DatabaseHelper::getrespondentdecisionDetails($id);

  $respondent_decision = DB::select("SELECT * FROM respondents_decision as sm
   where sm.claim_notice_id=".$id." and created_id =".Auth::user()->id);

      // echo json_encode($respondent_decision); exit;

     // echo json_encode($claimnotices); exit;

  $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
  $getclaimandrelief = DatabaseHelper::getclaimandrelief($id); 

  $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

  $claim_details = DatabaseHelper::getClaimDetails($id);

  $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

  $relief_request = DatabaseHelper::getReliefRequest($id);

  $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);

  $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);

  $claimandrelief = DatabaseHelper::getclaimandrelief($id);



  $getclaim_details = DatabaseHelper::getclaim_details($id);

  $ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);

  $RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id);    

  $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);

  $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id);   
  $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");

  $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);

  $claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
    dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
    left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
    left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

    where ci.deleted_at is null and ci.claimnoticeid = ".$id." and ci.user_id =".auth()->user()->id."" ); 

  $counter_claim_list=DatabaseHelper::counter_claim_list($id);

  $respondent_details=DatabaseHelper::respondent_details($id);

  $respondent_amend=DatabaseHelper::respondent_amend($id);







  $ClaimNoticeStatusCount = count($ClaimNoticeStage);
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
      // dd ($respodentcounterclaimandrelief);
      // $respondentclaim_new=$respodentcounterclaimandrelief['claims'];
      //  $respondentrelief_new=$respodentcounterclaimandrelief['relief'];

        // echo json_encode($respondentclaim_new);exit;


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
      // echo json_encode($bank_account_counter); exit;

  $dispute_categories = DB::select("SELECT category_name,id,deleted_at FROM dispute_categories WHERE deleted_at IS NULL ORDER BY order_by asc,category_name ASC ");
  $dispute_subcategories = DB::select("SELECT subcategory_name,id,deleted_at FROM dispute_subcategories WHERE deleted_at IS NULL ORDER BY subcategory_name asc"); 
  $dispute_respondent=DB::select("SELECT * FROM repondent_dispute_information WHERE claimnoticeid = ".$id." and user_id =".auth()->user()->id."");

  $respondent_adminfees=DB::select("SELECT * FROM respondents_decision WHERE claim_notice_id = ".$id." and created_id =".auth()->user()->id." and respondent_decision='Making a Counter Claim'");

  $respondent_adminfees_paid=DB::select("SELECT * FROM respondentfees WHERE claimnoticeid = ".$id." and created_id =".auth()->user()->id." and fees_type= 'Administartion'");



  $ReliefRequests = DB::select("SELECT * from relief_request re inner join repondent_dispute_information ci on (ci.claimnoticeid = re.claimnoticeid)
    inner join claim_details cr on (cr.claimnoticeid = re.claimnoticeid) where re.is_respondant='1' and cr.is_respondant='1' and re.deleted_at is null and re.claimnoticeid = ".$id);

  $claim_respondent_details=DB::select("SELECT * FROM claim_details WHERE claimnoticeid = ".$id." and created_id =".auth()->user()->id."");



      // $payment_relief= DB::select("SELECT * from relief_request re inner join repondent_dispute_information ci on (ci.claimnoticeid = re.claimnoticeid)
      //  where re.is_respondant='1'  and re.deleted_at is null and re.claimnoticeid = ".$id." and re.user_id =".auth()->user()->id."");

  $payment_relief= DB::select("SELECT * from relief_request where is_respondant='1'  and deleted_at is null and claimnoticeid = ".$id." and user_id =".auth()->user()->id."");

  $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request  WHERE is_respondant='1' and claimnoticeid = ".$id." and user_id=".auth()->user()->id."");
  if (count($totalclaimamount) >0 ) {
   $total_amount = str_replace( ',', '', $totalclaimamount[0]->total_amount ) ;
 }
 else
 {
  $total_amount =  '0';  
}


$registrationfees = DB::select("SELECT re.registration_fees as registration_fee FROM registration_fees re
  inner JOIN claimant_informations cl ON(cl.currency=re.currency)
  WHERE  " .$total_amount." between re.claim_amount_from and re.claim_amount_to AND cl.claimnoticeid=".$id);


if (count($registrationfees) ==0)

{

 $registrationfees = DB::select("SELECT re.registration_fees as registration_fee FROM registration_fees re
  inner JOIN claimant_informations cl ON(cl.currency=re.currency)
  WHERE  " .$total_amount." >= re.claim_amount_from AND re.claim_amount_to IS NULL and cl.claimnoticeid=".$id);
} 



if (!empty($registrationfees))
{ 

  $payment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");

  $registration_fees_amt=$registrationfees[0]->registration_fee;
  $service_percentage=($payment_service_amount[0]->service1_percentage)/100;
  $extra_amt= $registration_fees_amt * $service_percentage;

    // $total_pay_amt=  $registration_fees_amt+ $extra_amt; 

  $total_pay_amt_check=  $registration_fees_amt+ $extra_amt; 


  $total_pay=number_format((float)$total_pay_amt_check, 2, '.', ''); 
// print_r($total_pay);exit;
  $checking=is_float($total_pay_amt_check);
  $total_pay_amt=str_replace(".", "", $total_pay);

}




return view('claimantrespondantaccess.show', compact('user_id','payment_relief','registrationfees','total_amount','totalclaimamount','dispute_respondent','ReliefRequests','getclaimandrelief','claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimantclaimNoticeStageDocuments','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','RespondentclaimNoticeStageDocuments','claimandrelief','getclaim_details','claimanttype','claimantinformations','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','respondent_decision','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','dispute_categories','dispute_subcategories','counter_claim_list','respondent_adminfees','respondent_adminfees_paid','claim_respondent_details','respondent_details','respondent_amend','total_pay_amt','extra_amt','rtotal_pay_amt','rextra_amt','arbfees','adminfee','total_pay_amt_check','rtotal_pay_amt_check'));

}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generateAccessToRespondant($id = null)
    {

     $claimnotice = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,DATE_FORMAT(sm.created_at,'%d/%m/%Y') created_at,cf.claim_amount,sm.id,sm.userid,
      cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
      left join claim_fees cf on (cf.claimnoticeid =sm.id )
      left join dispute_categories dc on (cf.dispute_categories_id = dc.id)
      left join dispute_subcategories dcp on (dcp.id = cf.dispute_subcategories_id) where sm.id=".$id);      
     $userid = '0';
     foreach ($claimnotice as $claimnotice) {
      $useridnew= $claimnotice->userid; 
    }

    $claimantInformation = DB::select("select username,email,usertype,name,id,roles_id from users where id=".$useridnew);


    foreach ($claimantInformation as $claimantInformations ) {
     $mailid = $claimantInformations->email;
   }

   // Mail::to( $mailid)->send(new DocumentMail($claimantInformation));
   $table = DB::table('claimantnotice')
   ->where('id' , $id)
   ->update(['claimnoticestatus' => 'Waiting for the Accept the claim Notice by Respondent']);
   $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
   $ClaimantNoticeStatus->claimantnoticeid = $id;
   $ClaimantNoticeStatus->claimantnoticestatus = 'Waiting for the Accept the claim Notice by Respondent';
   $ClaimantNoticeStatus->userid = Auth::user()->id; 
   $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' )); 
   
   $ClaimantNoticeStatus->created_id = Auth::user()->id;        
   $ClaimantNoticeStatus->save();


   return redirect()->route('claimantrespondantaccess.index')
   ->with('success','Respondat Access Sent Successfully. Please Wait for Further Updates');
 }

 public function store(Request $request)
 {
   // echo $request->claimnoticeid;exit;
  $claimnotice = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,DATE_FORMAT(sm.created_at,'%d/%m/%Y') created_at,cf.claim_amount,sm.id,sm.userid,
    cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
    left join claim_fees cf on (cf.claimnoticeid =sm.id )
    left join dispute_categories dc on (cf.dispute_categories_id = dc.id)
    left join dispute_subcategories dcp on (dcp.id = cf.dispute_subcategories_id) where sm.id=".$request->claimnoticeid);      
  $userid = '0';
  DB::table('respondents_decision')->insert([
    'claim_notice_id' => $request->claimnoticeid,
    'respondent_decision'=>$request->claimnoticestatus,
    'remarks'=>$request->remarks,
    'created_id' => auth()->user()->id,
    'created_at' => NOW()
  ]);

  
  foreach ($claimnotice as $claimnotice) {
    $useridnew= $claimnotice->userid; 
    $claimantInformation = DB::select("select username,email,usertype,name,id,roles_id from users where id=".$useridnew);
    foreach ($claimantInformation as $claimantInformations ) {
     $mailid = $claimantInformations->email;
    // Mail::to( $mailid)->send(new DocumentMail($claimantInformation));    
   }
 }

  // echo  $request->claimnoticestatus; exit;


 if ($request->claimnoticestatus == "Disputing and Contesting the Claim" || $request->claimnoticestatus =="Making a Counter Claim") 
 {
  $respondent_count1=DB::select("SELECT * FROM respondantdetails WHERE claimnoticeid=".$request->claimnoticeid);
  $respondent_decision_count=DB::select("SELECT * FROM respondents_decision WHERE claim_notice_id=".$request->claimnoticeid);
// echo (count($respondent_count1));exit;
  if (count($respondent_count1) == count($respondent_decision_count))
  {
   $table = DB::table('claimantnotice')
   ->where('id' , $request->claimnoticeid)
   ->update(['claimnoticestatus' => $request->claimnoticestatus,
    'respondant_status' =>  $request->claimnoticestatus]);
 }
}
else
{
  $respondent_count = DB::select("SELECT * FROM respondantdetails where claimnoticeid=".$request->claimnoticeid);
  if ($request->claimnoticestatus == "Accepting and Admitting the Claim") 
  {
    $respondents_decision = DB::select("SELECT * FROM respondents_decision where claim_notice_id=".$request->claimnoticeid. " and respondent_decision ='Accepting and Admitting the Claim'");
    if (count($respondent_count) == (count($respondents_decision) +1 )) 
    {
      $table = DB::table('claimantnotice')
      ->where('id' , $request->claimnoticeid)
      ->update(['claimnoticestatus' => $request->claimnoticestatus,
        'respondant_status' =>  $request->claimnoticestatus]);
    }
  }
  else if ($request->claimnoticestatus == "Willing to Negotiate Directly/Mediate") 
  {

    $respondents_decision = DB::select("SELECT * FROM respondents_decision where claim_notice_id=".$request->claimnoticeid. " and respondent_decision ='Willing to Negotiate Directly/Mediate'");

    if (count($respondent_count) == (count($respondents_decision) +1 )) 
    {
      $table = DB::table('claimantnotice')
      ->where('id' , $request->claimnoticeid)
      ->update(['claimnoticestatus' => $request->claimnoticestatus,
        'respondant_status' =>  $request->claimnoticestatus]);
    }
    
  }
}
//Respondent Decision We need to write the new functionality



 //End

$ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
$ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
$ClaimantNoticeStatus->claimantnoticestatus = $request->claimnoticestatus;
$ClaimantNoticeStatus->userid = Auth::user()->id; 
$ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
$ClaimantNoticeStatus->created_id = Auth::user()->id;        
$ClaimantNoticeStatus->save();


$ClaimNotice = DB::select("select * from claimantnotice where id = ".$request->claimnoticeid);
foreach ($ClaimNotice as $ClaimNotices) {
  $claimnoticeno = $ClaimNotices->claimnoticeno;
  $claimnoticeid = $ClaimNotices->id; 
}

$emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
foreach($emails as $Adminemail){
  $email = $Adminemail->email;

  $newclaimant = [
    'body' => $claimnoticeno.' '.$request->claimnoticestatus,
    'actionURL' => route('claimantsnoticelist.index'),
  ];

  $newclaimant =  json_encode($newclaimant);

  $notification = new notifications(); 
  $notification->type = $claimnoticeno.' '.$request->claimnoticestatus;
  $notification->latest = '1';
  $notification->name = $claimnoticeno.' '.$request->claimnoticestatus;

  $notification->notifiable_type = $claimnoticeno.' '.$request->claimnoticestatus;
  $notification->data = $newclaimant;
  $notification->notifiable_id = $Adminemail->id;         
  $notification->created_at = date('Y-m-d H:i:s');
  $notification->updated_at = date('Y-m-d H:i:s');
  $notification->registration_claimnotice_id =$claimnoticeid; 
  $notification->save();
  $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
    res.phone as daytimetelephone,res.email,res.username,sm.respondant_status from claimantnotice sm 
    INNER  join claimantregister res on (res.user_id =  sm.userid)  
    where sm.id=".$request->claimnoticeid);

  foreach ($claimant as $claimants)
  {
    $claimantemail = $claimants->email;
    // $notification = new notifications(); 
    // $notification->type = $type;
    // $notification->latest = $latest;
    // $notification->name = $name;
    // $notification->notifiable_type = $notifiable_type;
    // $notification->data = $newclaimant;
    // $notification->notifiable_id = $claimants->userid;  
    // $notification->created_at = $created_at;
    // $notification->updated_at = $updated_at;  
    // $notification->registration_claimnotice_id =$request->claimnoticeid;   
    // $notification->save(); 

    $data = array(
      'email' => $claimants->email,
      'username' => $claimants->username,
      'claimnoticeno' => $claimants->claimnoticeno,
      'respondant_status' => $claimants->respondant_status,


    );
       // echo $claimnoticestatus;exit;
      //send email to claimant
    if ( $claimants->respondant_status =='Willing to Negotiate Directly/Mediate'){

      Mail::send('emails.Respondant_negoitiate',["data1"=> $data], function($message) use ($claimantemail,$data){
        $message->to($claimantemail)
        ->subject('Reg.Online Arbitration System - Claim Notice (NO - '.$data['claimnoticeno'].') - Respondent - Willing to Negotiate Directly/Mediate ');   
      });
    }
  }



}
return redirect()->route('claimantrespondantaccess.index')
->with('success','Respondent Action Taken Successfully. Please Wait for Further Updates');
}


public function edit(Request $request,$id)
{


}
public function amendupdate(Request $request, $id =null)
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
   Log::error('[Method => ClaimrespondentController => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');


 }
 catch(\Exception $exc){

  $documentDirectory='';    
  Log::error('[Method => ClaimrespondentController => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

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

  // $this->storeamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_NAME');
  // if (!File::exists($storagePath))
  // {
  //   File::makeDirectory($storagePath);
  // }
  // else
  // {
  //   File::cleanDirectory($storagePath);
  // }

  if($request->hasFile('fileidproof'))
  {
    $storagePath = $storagePath;
    $imageFile = $request->file('fileidproof');
    $imageName = $imageFile->getClientOriginalName();
    $imageFile->move($storagePath, $imageName);
  }
        // commanded start

  // $this->storeamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_NAME');
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

  $this->storeamendDocument($folderName, $documentDirectory,$ClaimNoticeID,'Respondent ClaimNotice Amend',$request->user_id,'RESPONENT_AUTH');
  $alfresco_update = DB::table('alfresco_log')
  ->where(['id'=>$alfresco_id])
  ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);
  return redirect()->route('claimantrespondantaccess.index')
  ->with('success','Amend Completed Successfully');
}
else
{
  return redirect()->route('claimantrespondantaccess.index')
  ->with('success','Document Upload Failed');

} 


}
public function disputedetail(Request $request)
{
  $ClaimNoticeID =$request->claimnoticeid;
  $user_id=$request->user_id;
  $amend = DB::table('Repondent_dispute_information')->insertGetId([
    'dispute_categories_id' => $request->dispute_categories_id,
    'dispute_subcategories_id' =>  $request->dispute_subcategories_id,
    'others'=>$request->others,
    'user_id' => $user_id,
    'created_id'=>$user_id,
    'claimnoticeid'=>$ClaimNoticeID,

    'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
  ]);








  return redirect()->back()
  ->with('success','Dispute Selected Successfully');

}
public function payadminstrativefees_respondent(Request $request)
{
  $claimnoticeid=$request->claimnoticeid;
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

//  $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request   WHERE claimnoticeid = ".$id." and user_id=".auth()->user()->id." and is_respondant='1'");

//  $user_currency= DB::select("SELECT currency as currency FROM claimant_informations  WHERE claimnoticeid = ".$id."");

//  $selected_currency=$user_currency[0]->currency;

//  if ($totalclaimamount[0]->total_amount != null ) {
//    $total_amount = str_replace( ',', '', $totalclaimamount[0]->total_amount ) ;
// }
// else
// {
//   $total_amount =  '0';
// }

//   $arbitrator_allocation_fees = DB::select("SELECT aa.adminstration_fees,aa.arbitartion_percentage,aa.arbitrator_fees FROM arbitrator_allocation_fees aa
//   inner JOIN claimant_informations cl ON(cl.currency=aa.currency)
//   WHERE " .$total_amount." between aa.claim_amount_form and aa.claim_amount_to  AND cl.claimnoticeid=".$id );

//   $user_currency= DB::select("SELECT currency as currency FROM claimant_informations  WHERE claimnoticeid = ".$id."");

//  $selected_currency=$user_currency[0]->currency;

//   if (count($arbitrator_allocation_fees) ==0)  

//     {
//    $arbfees=0; 
//   $adminfee=0;

//   }
// else
// {

// $arbfee_percentage=($arbitrator_allocation_fees[0]->arbitartion_percentage) /100;
// $adminfee = str_replace( ',', '', $arbitrator_allocation_fees[0]->adminstration_fees );
// $arbfees=str_replace( ',', '', $arbitrator_allocation_fees[0]->arbitrator_fees )+($arbfee_percentage * $total_amount);
// }


//     if($arbfees >3000000 && $selected_currency=='INR')
//     {
//       $arbfees=3000000; 
//     }
//     else if($arbfees >100000 && $selected_currency=='USD')
//     {
//       $arbfees=100000;
//     }







//   $totalfeesamount = $adminfee + $arbfees;






  DB::table('respondentfees')->insertGetId([
    'fees_amount' => $request->adminstration_fees + $request->arbitrator_fees,
    'user_id' => auth()->user()->id,
    'created_id'=>auth()->user()->id,
    'admin_fee'=>$request->adminstration_fees,
    'arbitrtor_fee'=>$request->arbitrator_fees,
    'platform_fee'=>$request->extra_amt,
    'transaction_id'=>$payment_id,
    'claimnoticeid'=>$claimnoticeid,
    'fees_type'=>'Administartion',
    'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
  ]);
      // echo $id;exit;




  $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
  $ClaimantNoticeStatus->claimantnoticeid = $claimnoticeid;
// $ClaimantNoticeStatus->remarks = $request->remarks;
  $ClaimantNoticeStatus->claimantnoticestatus = 'Payment Completed';
  $ClaimantNoticeStatus->userid = Auth::user()->id;
  $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
  $ClaimantNoticeStatus->created_id = Auth::user()->id;        
  $ClaimantNoticeStatus->save(); 
  $claimnotice_number=DB::select("select claimnoticeno from claimantnotice where id=".$claimnoticeid);
  $claimnoticenumber=$claimnotice_number[0]->claimnoticeno;
  $status='Payment Completed';
  $newclaimant = [
    'body' => $claimnoticenumber.' '.$status,
    'actionURL' => route('claimantsnoticelist.index'),
  ];

  $newclaimant =  json_encode($newclaimant);

  $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");

  foreach($emails as $Adminemail){
    $email = $Adminemail->email;

    $notification = new notifications(); 
    $notification->type = 'Respondent Fees';
    $notification->latest = '1';
    $notification->name =$claimnoticenumber.'  ' .'Payment Completed';
    $notification->notifiable_type = 'Payment Completed';
    $notification->data = $newclaimant;
    $notification->notifiable_id = $Adminemail->id;         
    $notification->created_at = date('Y-m-d H:i:s');
    $notification->updated_at = date('Y-m-d H:i:s');
    $notification->registration_claimnotice_id =$claimnoticeid; 
    $notification->save();

  }
  $respondent_adminfees=DB::select("SELECT * FROM respondents_decision WHERE claim_notice_id = ".$claimnoticeid." and respondent_decision='Making a Counter Claim'");
  $fees_count=DB::select("SELECT * FROM respondentfees WHERE claimnoticeid = ".$claimnoticeid." and fees_type='Administartion'");

  if (count($respondent_adminfees) == count($fees_count))
  {

    $table = DB::table('claimantnotice')
    ->where('id' , $claimnoticeid)
    ->update(['claimnoticestatus' => 'Arbitrator To Accept the Allocation']);
  }

  return redirect()->route('claimantrespondantaccess.index')
  ->with('success','Respondent Administration and Arbitration Payment Completed.');

}
public function respondentfees(Request $request)
{
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
$ClaimNoticeID =$request->claimnoticeid;
$user_id=$request->user_id;
DB::table('respondents_decision')->insert([
  'claim_notice_id' => $request->claimnoticeid,
  'respondent_decision'=>'Making a Counter Claim',
  'created_id' => auth()->user()->id,
  'created_at' => NOW()
]);
$amend = DB::table('respondentfees')->insertGetId([
  'claim_amount_purpose' => $request->claim_amount_purpose,
  'fees_amount' =>  $request->registration_fees,
  'user_id' => $user_id,
  'created_id'=>$user_id,
  'claimnoticeid'=>$ClaimNoticeID,
  'platform_fee'=>$request->extra_fees,
  'transaction_id'=>$payment_id,
  'fees_type'=>'Registration',
  'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
]);
$respondent_count1=DB::select("SELECT * FROM respondantdetails WHERE claimnoticeid=".$request->claimnoticeid);
$respondent_decision_count=DB::select("SELECT * FROM respondents_decision WHERE claim_notice_id=".$request->claimnoticeid);
// echo (count($respondent_count1));exit;
if (count($respondent_count1) == count($respondent_decision_count))
{
  $table = DB::table('claimantnotice')
  ->where('id' , $request->claimnoticeid)

  ->update(['claimnoticestatus' => "Making a Counter Claim",
    'respondant_status' =>  "Making a Counter Claim"]);
}
$ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
$ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
$ClaimantNoticeStatus->claimantnoticestatus = "Making a Counter Claim";
$ClaimantNoticeStatus->userid = Auth::user()->id; 
$ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
$ClaimantNoticeStatus->created_id = Auth::user()->id;        
$ClaimantNoticeStatus->save();

$ClaimNotice = DB::select("select * from claimantnotice where id = ".$request->claimnoticeid);
foreach ($ClaimNotice as $ClaimNotices) {
  $claimnoticeno = $ClaimNotices->claimnoticeno;
  $claimnoticeid = $ClaimNotices->id; 
}

$emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
foreach($emails as $Adminemail){
  $email = $Adminemail->email;

  $newclaimant = [
    'body' => $claimnoticeno.' '.$request->claimnoticestatus,
    'actionURL' => route('claimantsnoticelist.index'),
  ];

  $newclaimant =  json_encode($newclaimant);

  $notification = new notifications(); 
  $notification->type = $claimnoticeno.' '.$request->claimnoticestatus;
  $notification->latest = '1';
  $notification->name = $claimnoticeno.' '.$request->claimnoticestatus;
  $notification->notifiable_type = $claimnoticeno.' '.$request->claimnoticestatus;
  $notification->data = $newclaimant;
  $notification->notifiable_id = $Adminemail->id;         
  $notification->created_at = date('Y-m-d H:i:s');
  $notification->updated_at = date('Y-m-d H:i:s');
  $notification->registration_claimnotice_id =$claimnoticeid; 
  $notification->save();



}








return redirect()->route('claimantrespondantaccess.index')
->with('success','Respondent Decision Taken Successfully');

}
public function detailsupdate(Request $request, $id =null)
{

  $ClaimNoticeID =$request->claimnoticeid;
  $claimnoticeno=$request->claimnoticeno;
  $user_id=$request->user_id;

  $claimnotice=DB::select("select * from respondantdetails where claimnoticeid=".$ClaimNoticeID . " and user_id = " .$user_id);
  $claimantamend = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Respondent Details Amend'  and  claimnoticeid=".$ClaimNoticeID . " and created_id = " .$user_id);

  $amend = DB::table('amend_details')->insertGetId([
    'organization_details' => $claimnotice[0]->auth_name,
    'poa_holder' => $claimnotice[0]->poa_holder,
    'age' => $claimnotice[0]->age,
    'email'=>$claimnotice[0]->email,

    'user_id' => $user_id,
    'claimnoticeid'=>$ClaimNoticeID,
    'user_type'=>"respondent",
    'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
  ]);
  DB::table('respondantdetails')

  ->where([['claimnoticeid', '=' , $ClaimNoticeID],['user_id' ,'=' ,$user_id]])
  ->update([
    'auth_name' => request('auth_name'),
    'poa_holder'=>request('poa_holder'),
    'auth_age'=>request('age'),


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
    'user_id' => $user_id,
    'doc_type'=>'Respondent Details',
    'claimnotice_id'=>$ClaimNoticeID,
    'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
  ]);
  $parentFolder = 'documentLibrary/Claim/Respondent-Details';
  // $count = count($claimantamend) +1;
  $email=$claimnotice[0]->email;

  // $folderName = str_replace('/', '_', $claimnoticeno).$email.'_'.'Amend'.$count;

  $folderName = str_replace('/', '_', $claimnoticeno).$email.'_'.'Authorized Person';


      //dd ($folderName);
  $folderTitle =  $claimnoticeno;
  $folderDescription = $claimnoticeno;
  try{
    $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
    Log::error('[Method => ClaimantrespondantaccessController => log_detail1 => Step2 => success Code:'.$user_id.''.$folderName.']');


  }
  catch(\Exception $exc){

    $documentDirectory='';    
    Log::error('[Method => ClaimantrespondantaccessController => log_detail2 => Error Code:'.$exc.''.$user_id.''.$folderName.']');

  }
 // echo $documentDirectory;exit;

  if($documentDirectory != '')
  {
    $storagePath = storage_path().'/app/public/uploads/respondantdetails/'.$folderName;

    if (!File::exists($storagePath))
    {
      File::makeDirectory($storagePath);
    }
    else
    {
      File::cleanDirectory($storagePath);
    }

    if($request->hasFile('fileupload_auth'))
    {
        //echo ("gjh");exit;
      $storagePath = $storagePath;
      $imageFile = $request->file('fileupload_auth');
      $imageName1 = $imageFile->getClientOriginalName();
      $imageName=str_replace(' ', '', $imageName1);
      $imageFile->move($storagePath, $imageName);
      Log::error('[Method => fileupload_auth =>log_detail3 => Step3 => Error Code:'.$storagePath.'::'. $imageName.'::'.$user_id.']');
    }
    if($request->hasFile('fileupload'))
    {
      $storagePath = $storagePath;
      $imageFile = $request->file('fileupload');
      $imageName1 = $imageFile->getClientOriginalName();
      $imageName=str_replace(' ', '', $imageName1);
      $imageFile->move($storagePath, $imageName);

      Log::error('[Method => fileupload =>log_detail4 => Step4 => Error Code:'.$storagePath.'::'. $imageName.'::'.$user_id.']');
    }
//echo json_encode($user_id);exit;

    $this->storeresponentdetails($folderName, $documentDirectory,$ClaimNoticeID,'Respondent Details Amend',$request->user_id,'AUTH_NAME',$alfresco_id);
    // if (!File::exists($storagePath))
    // {
    //   File::makeDirectory($storagePath);
    // }
    // else
    // {
    //   File::cleanDirectory($storagePath);
    // }         

    
        // commanded start

    // $this->storeresponentdetails($folderName, $documentDirectory,$ClaimNoticeID,'Respondent Details Amend',$request->user_id,'AGE',$alfresco_id);

    $alfresco_update = DB::table('alfresco_log')
    ->where(['id'=>$alfresco_id])
    ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);

    return redirect()->route('claimantrespondantaccess.index')
    ->with('success','Respondent Details Addded Successfully');

  }
  else
  {
   return redirect()->route('claimantrespondantaccess.index')
   ->with('success','Document Upload Failed');

 }                           
}


public function update(Request $request, $id)
{

 $arbitration_petionno = $request->arbitration_petionno;
 $claimantnotice_Stage =$request->claimantnotice_Stage;

 $claimnoticestatus = $claimantnotice_Stage.' Statement of Objection Uploaded by Respondent';
 $folderName = $request->arbitration_petionno;
 $documentDirectory = $request->alfresco_stage_folderuniqueid;
 // echo $documentDirectory ;exit;
 $claimnoticeID = $request->claimnoticeid;
 $stageid = $request->claimnoticestageid;
  // echo $stageid; exit;
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

 $newclaimant = [
  'body' => $request->claimnoticeno.' '.$claimantnotice_Stage.' Statement of Objection Uploaded by Respondent',
  'actionURL' => route('claimantsnoticelist.index'),
];

$type =  'ClaimNotice';
$latest = '1';
$name = $request->claimnoticeno.' '.$claimantnotice_Stage.' Statement of Objection Uploaded by Respondent';
$notifiable_type = $request->claimnoticeno.' '.$claimantnotice_Stage.' Statement of Objection Uploaded by Respondent';

$newclaimant =  json_encode($newclaimant);
$created_at = now();
$updated_at = now();

$claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
  res.phone as daytimetelephone,res.email,res.username,sm.respondant_status from claimantnotice sm 
  INNER  join claimantregister res on (res.user_id =  sm.userid)  
  where sm.id=".$request->claimnoticeid);

foreach ($claimant as $claimants)
{
  $claimantemail = $claimants->email;
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

  $data = array(
    'email' => $claimants->email,
    'username' => $claimants->username,
    'claimnoticeno' => $claimants->claimnoticeno,
    'respondant_status' => $claimants->respondant_status,
    'arbitration_petionno' => $arbitration_petionno,

  );
       // echo $claimnoticestatus;exit;
      //send email to claimant
  if ( $claimants->respondant_status =='Disputing and Contesting the Claim' && $claimnoticestatus=='Pleadings Statement of Objection Uploaded by Respondent'){
    // echo "hgjhg"; exit;

    Mail::send('emails.respondentclaimant', ["data1"=>$data], function($message) use ($claimantemail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantemail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition  (No:'.$arbitration_petionno.') -  Statement of Objections lodged by the Respondent ');   
    });
  }


  else if ( $claimants->respondant_status =='Making a Counter Claim' && $claimnoticestatus=='Pleadings Statement of Objection Uploaded by Respondent' ){
// echo"yyyy"; exit;
    Mail::send('emails.respondantclaimant_making', ["data1"=>$data], function($message) use ($claimantemail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantemail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') -  Statement of Objections and Counter-Claim lodged by the Respondent');   
    });
  }
  else if($claimnoticestatus=='Evidence Statement of Objection Uploaded by Respondent'){
    // echo "jhj"; exit;
    Mail::send('emails.evidenceupload_by_respondant', ["data1"=>$data], function($message) use ($claimantemail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantemail)
      ->subject("Electronic Arbitration System (EAS) - Claim Petition (No:".$arbitration_petionno.") -  Respondent's Evidence Uploaded");   
    });

  }
  else if($claimnoticestatus=='Hearing-1 Statement of Objection Uploaded by Respondent'){
    // echo "jhj"; exit;
    Mail::send('emails.hearing1_by_respondant', ["data1"=>$data], function($message) use ($claimantemail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantemail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') -  Hearing Number: 1 Statement of Objection Document Uploaded By Respondent');   
    });

  }
  
  else if($claimnoticestatus=='Hearing-2 Statement of Objection Uploaded by Respondent'){
    // echo "jhj"; exit;
    Mail::send('emails.hearing2_by_respondant', ["data1"=>$data], function($message) use ($claimantemail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantemail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') -  Hearing Number: 2');   
    });

  }
  




}

$arbitratorsid = DB::select("select arbitrator_id,claimnoticeid,us.email,us.username,cn.respondant_status from claimant_arbitrator_configuration arc
  INNER JOIN claimantnotice cn ON (cn.id= arc.claimnoticeid) 
  inner JOIN users us on (us.id = arc.arbitrator_id)  where arc.isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);


  // $arbitratorsid = DB::select("select arbitrator_id,claimnoticeid from claimant_arbitrator_configuration where isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);

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
  $notification->registration_claimnotice_id =$request->claimnoticeid;  
  $notification->save();  


  $data = array(
   'email' => $arbitratorid->email,
   'username'=>$arbitratorid->username,
   'arbitration_petionno'=>$arbitration_petionno,
   'respondant_status'=>$arbitratorid->respondant_status,
 );

  if ( $arbitratorid->respondant_status =='Disputing and Contesting the Claim' && $claimnoticestatus=='Pleadings Statement of Objection Uploaded by Respondent'){
    Mail::send('emails.respondenttoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject('Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') -  Statement of Objections lodged by the Respondent');


    });
  } 

  else if ( $arbitratorid->respondant_status =='Making a Counter Claim' && $claimnoticestatus=='Pleadings Statement of Objection Uploaded by Respondent'){
      //echo "jhghg";exit;
    Mail::send('emails.respondenttoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject(' Electronic Arbitration System (EAS) - Claim Petition  (No:'.$arbitration_petionno.') -  Statement of Objections and Counter Claim lodged by the Respondent');



    });
  }

  
  else if ( $claimnoticestatus=='Claim Evidence Statement of Objection Uploaded by Respondent'){
    Mail::send('emails.respondent_evidencetoarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject("Electronic Arbitration System (EAS) - Claim Petition (No:".$arbitration_petionno."); -  Respondents's Evidence Uploaded");
      

    });
  }
  else if ( $claimnoticestatus=='Hearing-1 Statement of Objection Uploaded by Respondent'){
    Mail::send('emails.respondent_hearing1toarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject("  Electronic Arbitration System (EAS) - Claim Petition  (No:".$arbitration_petionno.") -  Hearing Number: 1 Written Arguments uploaded by Respondent");

      

    });
  }
  else if ( $claimnoticestatus=='Hearing-2 Statement of Objection Uploaded by Respondent'){
    Mail::send('emails.respondent_hearing2toarbitrator',["data3"=> $data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject(" Electronic Arbitration System (EAS) - Claim Petition  (No:".$arbitration_petionno.") -  Hearing Number: 2 Additional Arguments/Document uploaded by the Respondent");
      

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
  $notification->registration_claimnotice_id =$request->claimnoticeid;    
  $notification->save();   

  $data = array(
    'email' => $Adminemail->email,
  );

  $adminmail = $Adminemail->email;
  // Mail::send('emails.respondenttoadmin', $data, function($message) use ($adminmail,$data,$arbitration_petionno, $claimantnotice_Stage){
  //   $message->to($adminmail)
  //   ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - Respondent Uploaded Document Statement of Objection against '.$claimantnotice_Stage.'.'); 
  // });
}      
$alfresco_id=DB::table('alfresco_log')->insertGetId([
  'user_id' => Auth::user()->id,
  'claimnotice_id'=>$claimnoticeID,
  'doc_type'=>'respondent Document',
  'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
]);

$this->storeDocument($folderName, $documentDirectory,$claimnoticeID,$stageid,$request->remarks,$alfresco_id);
return redirect()->route('ClaimPetion.respodentclaimpetitionshow',$request->claimnoticeid)
->with('success','Statement of Objection Uploaded Successfully');
}

private function storeDocument($claimpetion_arbitrationNo, $documentDirectory,$claimnoticeID,$stageid,$remarks,$alfresco_id)
{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/respondentclaim/'.auth()->user()->id.'_'.str_replace('/', '_', $claimpetion_arbitrationNo);
 // echo $fileDirPath; exit;
    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      // echo "jhjh";exit;
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claim Petion Document Uploaded By Respondent';
      Log::error('[Method => alfrescodocument_folder_stage => log_detail5  => Step5 => Error Code:'.$fileDirPath.''.$fileName.'::'.$documentDirectory.'::'.auth()->user()->id.']');

      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      if($response !=''){ 
        $getting_code=json_decode($response);
        $getting_code2=$getting_code->status->code;
      }
      else{
        $getting_code2='';
      }
      
         // Log::error('[Method => alfrescodocument_folder_stage => log_detail6AB => Step9 =>Error Code:'.$exc.'::'.auth()->user()->id.']');
        // return redirect()->route('ClaimPetion.respodentclaimpetitionshow',$claimnoticeID)
        // ->with('success','Statement of Objection Uploaded successfully');
        // File::cleanDirectory($fileDirPath);

      Log::error('[Method => alfrescodocument_folder_stage => log_detail6 => Step9 =>Error Code:'.$response.'::'.auth()->user()->id.']');
      if($getting_code2=='200')
      { 
        $objResponse = json_decode($response, TRUE);


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
          'remarks' => $remarks,
          'document_type' => 'Stage Documents',
          'created_id' => auth()->user()->id,
          'created_at' => NOW()
        ]);
        
      }
      else{

       return redirect()->route('ClaimPetion.respodentclaimpetitionshow',$claimnoticeID)
       ->with('success','Statement of Objection Uploaded successfully');
       File::cleanDirectory($fileDirPath);
     }
   }
   File::cleanDirectory($fileDirPath);
 }


 catch(Exception $exc)
 {
  Log::error('[Method => alfrescodocument_folder_stage => log_detail7 => Error Code:'.$exc.'::'.$fileDirPath.'::'.$documentDirectory.'::'.auth()->user()->id.']');
}
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function storeamendDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
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
    private function storeresponentdetails($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type,$alfresco_id)
    {
      try
      {
      // Log::error('[Method => alfrescodocument => details_success => Error Code: yes success]');
        $fileDirPath = storage_path().'/app/public/uploads/respondantdetails/'.$folderName;

        $files = array_diff(scandir($fileDirPath), array('.', '..'));
        foreach ($files as $key => $value)
        {


          $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
          $fileName = $value;
          Log::error('[Method => alfrescodocument_folder => log_detail5  => Step5 => Error Code:'.$fileDirPath.''.$fileName.'::'.$documentDirectory.'::'.auth()->user()->id.']');
          $fileDescription = 'Respondent Details';
          $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
          Log::error('[Method => alfrescodocument_folder => log_detail6 => Step9 =>Error Code:'.$response.'::'.auth()->user()->id.']');


          $objResponse = json_decode($response, TRUE);

          $documentNode = $objResponse['nodeRef'];
          $arrWorkSpace = explode('://', $documentNode);
          $arrStore = explode('/', $arrWorkSpace[1]);
          $workspace = $arrWorkSpace[0];
          $spaceStore = $arrStore[0];
          $alfrescoDocumentName = $arrStore[1];

          // $alfresco_update = DB::table('alfresco_log')
          // ->where(['id'=>$alfresco_id])
          // ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes')),'document_name'=>$value]);

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
        Log::error('[Method => alfrescodocument_folder => log_detail7 => Error Code:'.$exc.'::'.$fileDirPath.'::'.$documentDirectory.'::'.auth()->user()->id.']');
      }
    }
    public function destroy($id)
    {


    }
  }