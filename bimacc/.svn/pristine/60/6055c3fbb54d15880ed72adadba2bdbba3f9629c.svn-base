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
use App\Mail\SendToArbitrator;
use App\models\notifications;
use Auth;
use App\User;
use App\Role;
use Session;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Input;
use Redirect;
use PDF;
use Dompdf\Dompdf; 
use App\AlfrescoDocument;
use App\DatabaseHelper;
use Crypt;


class ClaimentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {



          //$role = Role()->name;
          //echo $role; exit;
       $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
       }
     
      $claimnotice = DB::select("select distinct sm.id as claimid,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.no_email='0' order by sm.id desc"); 
      
       $active_status=array();
       $active_status1=array();

      foreach ($claimnotice as $status) {
      // array_push($fees->claimid);
        $claimnoticeid=$status->claimid;
        $active_status[]=DB::select("select * from claimantnotice where del_status='0' and id=".$claimnoticeid);
        $active_status1[]=DB::select("select * from claimantnotice where  id=".$claimnoticeid);

// dd($active_status[0][0]->claimnoticestatus);
      } 
      
            //where claimnoticestatus in ('New Claim Created')");


      $arbitratorlist = ArbitrationMaster::all();

      $claimant_informations = ClaimantInformation::all();    

        //echo json_encode($claimant_informations); exit;    

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id');                              


      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DisputeCategory::all();
      $dispute_subcategories = DisputeSubcategory::all();    

      return view('claimentslist.index', compact('claimnotice','arbitratorlist','active_status','active_status1','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories'));
    } 

    public function show($id)
    {

      $claimnotices = DatabaseHelper::getClaimNoticeDetails($id); 
         
      $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);    
       $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");

        $active_status=DB::select("select * from claimantnotice where del_status='0' and id=".$id);
       

      $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 

      $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

      $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);

     

      // $screen_id =  explode(",", $respondantdetails[0]->document_id);  

      

       


      $claim_details = DatabaseHelper::getClaimDetails($id);

      $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

      $relief_request = DatabaseHelper::getReliefRequest($id);

      $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);

      $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);  

      $claimandrelief = DatabaseHelper::getclaimandrelief($id);

      $getclaim_details = DatabaseHelper::getclaim_details($id);

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

$claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );

$counter_claim_list=DatabaseHelper::counter_claim_list($id);
 


      return view('claimentslist.show', compact('active_status','claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','claimandrelief','getclaim_details','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'));


      // $claimantRegister = ClaimantRegister::findOrFail($id);
     //    return view('claimentslist.show', compact('claimantRegister', $claimantRegister));
    }

    public function RespodentAccess($id, Request $request)
    {
      $claimnotices = DB::select("select  sm.claimnoticeno,sm.claimnoticestatus,sm.created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.id=".$id);
      $userid = '0';
      //send mail claimant details
      $claimant_informations = DB::select("select ci.name,ci.address,ci.country,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type,node_ref,work_space,space_store,alfresco_document_name,document_name,document_type from claimant_informations ci
        left join claimant_respondant_type crt on (crt.id =ci.claimant_type ) 
        left join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA') where ci.claimnoticeid=".$id); 
   //send mail respondant details

      $respondantdetails = DB::select("select ci.firstname,ci.address,ci.email,ci.country,ci.state,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as respondant_type from respondantdetails ci
        inner join claimant_respondant_type crt on (crt.id =ci.respondant_type ) where ci.claimnoticeid=".$id);

      $claimantdetails =DB::select("select us.name,rd.user_id AS userid FROM users us INNER JOIN respondantdetails rd ON (us.id=rd.created_id)where rd.claimnoticeid=".$id); //Mailclaimantname


      $claim_details = DB::select("select account_name,commercial_monthly,percentage_interest,total_amount,Total_outstanding_Amount,date_format(cd.NPADate,'%d-%m-%Y') as NPADate,date_format(cd.loan_taken_date,'%d-%m-%Y') as loan_taken_date,
        claim_details_remarks,loanaccountno,sequirity,rate_penalinterest,
        dateofrevival,lp.loan_type_name,cd.rate_penalinterest,date_format(cd.dateofrevival,'%d-%m-%Y') dateofrevival,cd.claim_details_Remarks from claim_details cd
        inner join loan_type lp on (lp.id = cd.loan_type_id )  where cd.claimnoticeid=".$id);

      $relief_requests = DB::select("select * from relief_request where claimnoticeid=".$id);

      $claim_fees = DB::select("select cf.claim_amount,cf.claim_amount_purpose,cf.registration_fees,dc.category_name,dsc.subcategory_name from claim_fees cf inner join claimant_informations cm on (cm.claimnoticeid = cf.claimnoticeid) inner join dispute_categories dc on (dc.id = cm.dispute_categories_id) inner join dispute_subcategories dsc on (dsc.id = cm.dispute_subcategories_id) where cm.claimnoticeid=".$id); 

       $status = 'Respondent Access Provided Waiting for the Acceptance';
        $table = DB::table('claimantnotice')
        ->where('id' , $id)
        ->update(['claimnoticestatus' => $status,'access_time'=>date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))]);
        $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
        $ClaimantNoticeStatus->claimantnoticeid = $id;
        $ClaimantNoticeStatus->claimantnoticestatus = $status;
        $ClaimantNoticeStatus->userid = Auth::user()->id; 
        $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
        $ClaimantNoticeStatus->created_id = Auth::user()->id;        
        $ClaimantNoticeStatus->save();


      $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, res.daytimetelephone,res.email,res.firstname,us.password,us.encrypt_pass from claimantnotice sm 
        INNER JOIN respondantdetails res on (res.claimnoticeid =  sm.id)
        INNER JOIN users us ON (us.id = res.user_id) where sm.id=".$id);

    // $RespondentInformation1 = DB::select("SELECT count(*) as same from claimantnotice sm 
    //   INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$id);

//echo json_encode($RespondentInformation); exit;

      foreach ($RespondentInformation as $RespondentInformations)
      {

        $user_id=$RespondentInformations->user_id;
        $email = $RespondentInformations->email;
        $phone = $RespondentInformations->daytimetelephone;
           $firstname = $RespondentInformations->firstname;



        foreach ($claimnotices as $claimnotice ) {

          $data1 = array(
            'claimnoticeid'=>$claimnotice->id,
            'claimnoticeno' => $claimnotice->claimnoticeno,
            'claimnoticestatus' => $claimnotice->claimnoticestatus,
            'category_name' => $claimnotice->category_name,
            'subcategory_name' => $claimnotice->subcategory_name,
            'name' => $claimnotice->name,
            'created_at' => $claimnotice->created_at);
        } 

        //echo json_encode(Crypt::decrypt($RespondentInformations->encrypt_pass)); exit();

        foreach ($respondantdetails as $respondantdetail) {
          $data3 = array(
            'firstname' => $RespondentInformations->firstname,
            'email' => $RespondentInformations->email,
            'decrypt' => Crypt::decrypt($RespondentInformations->encrypt_pass),      
            'daytimetelephone' => $respondantdetail->daytimetelephone,
            'respondant_type' => $respondantdetail->respondant_type,
            'user_id'=>Crypt::encrypt ($RespondentInformations->user_id),
          );
        }
        foreach ($claimantdetails as $claimantdetail)
        {
          $data4 = array(
            'name' => $claimantdetail->name,
            
          ); 
        }   //mailclaimantname
        $data = [
          "data1" => $data1,       
          "data3" => $data3,
          "data4"=>$data4
        ]; 

//echo json_encode($data); exit;

       

        $newclaimant = [
          'body' => $RespondentInformations->claimnoticeno.' '.$status,
          'actionURL' => route('claimantsnoticelist.index'),
        ];

        $newclaimant =  json_encode($newclaimant);

        $notification = new notifications(); 
        $notification->type = $status;
        $notification->latest = '1';
        $notification->name = $RespondentInformations->claimnoticeno.'  ' .$status;
        $notification->notifiable_type = $status;
        $notification->data = $newclaimant;
        $notification->notifiable_id = $RespondentInformations->user_id;         
        $notification->created_at = date('Y-m-d H:i:s');
        $notification->updated_at = date('Y-m-d H:i:s');
        $notification->registration_claimnotice_id =$data1['claimnoticeid']; 
        $notification->save();



        $claimnotice = '';

        foreach ($claimnotices as $claimnotice ) {

         $claimnotice =  '
         <tr>
         <td >'.$claimnotice->claimnoticeno.'</td>
         <td >'.$claimnotice->claimnoticestatus.'</td>
         <td>'.$claimnotice->category_name.'</td>
         <td>'.$claimnotice->subcategory_name.'</td>
         <td>'.$claimnotice->created_at.'</td>

         </tr>';
       } 



       $claimant_information = '';
       foreach ($claimant_informations as $claimant_information){
        $claimant_information =  '
        <tr>
        <td >'.$claimant_information->name.'</td>
        <td >'.$claimant_information->email.'</td>
        <td>'.$claimant_information->daytimetelephone.'</td>
        <td>'.$claimant_information->address.'</td>
        </tr>';
      }



      $respondantdetail ='';
      foreach ($respondantdetails as $respondantdetail) {
       $respondantdetail =  '
       <tr>
       <td >'.$respondantdetail->firstname.'</td>
       <td >'.$respondantdetail->email.'</td>
       <td>'.$respondantdetail->daytimetelephone.'</td>
       <td>'.$respondantdetail->address.'</td>
       </tr>';
     }

     $claim_detail = '';
     foreach ($claim_details as $claim_detail) {
      $claim_detail =  '
      <tr>
      <td >'.$claim_detail->account_name.'</td>     
      <td>'.$claim_detail->loan_taken_date.'</td>
      <td>'.$claim_detail->percentage_interest.'</td>
      <td>'.$claim_detail->NPADate.'</td>
      <td>'.$claim_detail->total_amount.'</td>     
      <td>'.$claim_detail->loanaccountno.'</td>     
      </tr>';
    } 

    $relief_request = '';
    // foreach ($relief_requests as $relief_request)
    // {
    //   $relief_request = '
    //   <tr>
    //   <td>'.$relief_request->recovery_of_money.'</td>
    //   <td>'.$relief_request->penal_interest.'</td>        
    //   <td>'.$relief_request->recident_backwages.'</td>
    //   <td>'.$relief_request->CANCELLATION_OF_ALOTTMENT_OF_SHARES.'</td>
    //   <td>'.$relief_request->SETOFF_SAND_COUNTERCLAIM.'</td>
    //   <td>'.$relief_request->PARTITION_AND_DISTRIBUTION_OF_ASSETS.'</td>       
    //   </tr>';          
    // }

    $claim_fee = '';
    foreach($claim_fees as $claim_fee) 
    {
      $claim_fee = 
      '<tr>
      <td >'.$claim_fee->claim_amount.'</td>
      <td >'.$claim_fee->claim_amount_purpose.'</td>
      <td >'.$claim_fee->registration_fees.'</td>
      <td >'.$claim_fee->category_name.'</td>
      <td >'.$claim_fee->subcategory_name.'</td>
      </tr>';

    }

  //$imagepath = storage_path().'/app/public/images/logo1.png';
    $basepath= url('/');

    $imagepath = $basepath.'/images/pic.png';

  //echo $imagepath; exit;

    $html = '
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Electronic Arbitration System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    /** Define the margins of your page **/
    @page {
      margin: 100px 25px;
    }

            #header {
    position: fixed;
    top: -60px;
    left: 0px;
    right: 0px;
    height: 50px;
    text-align: center;
    line-height: 50px;      

  }

            #footer {
  position: fixed; 
  bottom: -60px; 
  left: 0px; 
  right: 0px;
  height: 50px; 

  text-align: center;                
}
            #footer .page:after { content: counter(page, upper-number); }
</style>
</head>
<body>

<div id="header">
<img style="width:16%;float:left;" src= "'.$imagepath.'" >
<h3>Electronic Arbitration System</h3>
</div>

<div id="footer">
<p class="page"><hr>Bangalore International Mediation, Arbitration and Conciliation Centre (BIMACC)
</p>
</div>
<div id="content">      
<p align="center"><br><b>Claim Notice Details</b></p><br>
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th>Claim Notice No</th>
<th>Claim Notice Status</th>
<th>Category Name</th>
<th>Subcategory Name</th>
<th>Created At</th>
</tr>
<tbody>
'.$claimnotice.'
</tbody>
</table>
<br>
<p align="center"><br><b>Claimant Information</b></p><br> 
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
</tr>    
<tbody>
'.$claimant_information.'
</tbody>
</table>
<br> 
<p align="center"><br><b>Respondant Information</b></p><br>
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th>Name</th>
<th>Email</th>
<th>Daytime Telephone</th>
<th>Address</th>
</tr>
<tbody>
'.$respondantdetail.'
</tbody>
</table>   
<br> 
<p align="center"><br><b>Claim Details</b></p><br>  
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th>Account Name</th>   
<th>Loan Taken Date</th>
<th>Interest Percentage</th>
<th>NPA Date</th>
<th>Total Amount</th>      
<th>Loan Account No</th> 
</tr>
<tbody>
'.$claim_detail.'
</tbody>
</table>
<br><br><br><br><br>
<p align="center"><br><b>Relief Request </b></p><br>
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th>Recovery Of Money</th>
<th>Penal Interest</th>   
<th>Recident Backwages</th>
<th>Cancellation of alottment of shares</th>
<th>Set-off and Counter Claim</th>
<th>Partition and Distribution of assets</th>  
</tr>
<tbody>'.$relief_request.'</tbody>
</table>
<br>
<p align="center"><br><b>Claim Fees</b></p><br>
<table style="font-size:14px" class="table table-bordered" >
<tr>
<th style="border:1px">Claim Amount</th>
<th style="border:1px">Claim Amount Purpose</th>
<th style="border:1px">Registration Fees</th>
<th style="border:1px">Category Name</th>
<th style="border:1px">Subcategory Name</th>
</tr>
<tbody>'.$claim_fee.'</tbody>
</table>
</div>  
</body>
</html>';
 


$fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $data1['claimnoticeno']);

$dompdf = new Dompdf();
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);
$dompdf->set_option('isHtml5ParserEnabled', true); 
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->render();
$output = $dompdf->output();
$receiptName = str_replace('/', '_', $data1['claimnoticeno']).'.pdf';
$receiptPath = $fileDirPath."/".$receiptName;
file_put_contents($receiptPath, $output);



$subject = 'Online Arbitration System(Claim Notice No:'.$data1['claimnoticeno'].') - Respondent System Access Permission'; 

  //echo $subject; exit;

Mail::send('emails.welcome1', $data, function($message) use ($email,$receiptPath,$data,$data1){
  $message->to($email)
  ->subject('Electronic Arbitration System (EAS) - Claim Notice  ('.$data1['claimnoticeno'].') Access Permission regarding Claim Notice ('.$data1['claimnoticeno'].') raised by '.$data1['name'].'')
  ->attach($receiptPath);
   

}); 



//send a sms to respondant

$url="https://www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Thank you for Your Registeration as a Respondent.");
        // urlencode your message
$curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
        curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=9NTU6RCILNPNZWF5MYHMK7O9TA0W9OZB&secret=REL8EGNQQK3XCEE3&usetype=stage&phone=$phone&senderid=Auth::user()->id&message=$message");
        // post data
        // query parameter values must be given without squarebrackets.
         // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
      //end of send sms 
      }

      return redirect()->route('claimantsnoticelist.index')
      ->with('success','Respondent Access Sent Successfully. Please Wait for Respondent Decision');
    }





    public function Initiatepayment($id, Request $request)
    {
      //echo "Sample"; exit;
      $claimnotices = DB::select("select  sm.claimnoticeno,sm.claimnoticestatus,sm.created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name,cr.username, (cr.firstname + cr.lastname) as name,cr.phone,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.id=".$id);
      $userid = '0';
      //send mail claimant details
      $claimant_informations = DB::select("select ci.name,ci.address,ci.country,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type,node_ref,work_space,space_store,alfresco_document_name,document_name,document_type from claimant_informations ci
        left join claimant_respondant_type crt on (crt.id =ci.claimant_type ) 
        left join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA') where ci.claimnoticeid=".$id); 
   //send mail respondant details

    
             $respondantdetails = DB::select("select ci.name,ci.address,ci.email,ci.country,ci.state,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as respondant_type from respondantdetails ci
        inner join claimant_respondant_type crt on (crt.id =ci.respondant_type ) where ci.claimnoticeid=".$id);



        $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request   WHERE is_respondant is null and claimnoticeid = ".$id);
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
    

    if($arbfees >3000000  && $selected_currency=='INR')
    {
      $arbfees=3000000; 
    }
    else if($arbfees >100000 && $selected_currency=='USD')
    {
      $arbfees=100000;
    }







       // echo $arbitrator_allocation_fees[0]->total_fees; exit;

    $invoice_details =DB::table('claimnotice_invoices')->orderBy('id', 'desc')->first();
    if ($invoice_details ==null) 
    {
      $invoiceno =  'INV/'.date("Y").'/001';
    }
    else
    {
      $invoiceno = $invoice_details->invoiceno;
      $invoiceno =  ++$invoiceno;  // AAA004  
    }

    
      $totalfeesamount = $adminfee + $arbfees;



   
    

    

    $claimnotice_invoices = DB::table('claimnotice_invoices')->insertGetId([
              'invoiceno' => $invoiceno,
              'claimnoticeid' => $id,
               'invoicedate' => NOW(),
              'invoice_type' => 'Administration',
              'admin_fee'=>$adminfee,
              'arbitrtor_fee'=>$arbfees,
              'invoiceamount' => $totalfeesamount, 
              'created_by' => auth()->user()->id,
              'created_at' => NOW()
      ]);
     $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, res.daytimetelephone,res.email,us.password,us.encrypt_pass from claimantnotice sm 
        INNER JOIN respondantdetails res on (res.claimnoticeid =  sm.id)
        INNER JOIN users us ON (us.id = res.user_id) where sm.id=".$id);

      

    // $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, res.daytimetelephone,res.email from claimantnotice sm 
    //     INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$id);

      $claimantdetails =DB::select("select us.name,rd.user_id AS userid FROM users us INNER JOIN respondantdetails rd ON (us.id=rd.created_id)where rd.claimnoticeid=".$id); //mailclaimantname
 
  

  foreach ($claimnotices as $claimnotice ) {
    $claimantemail = $claimnotice->email;

          $data1 = array(
            'claimnoticeid'=>$claimnotice->id,
            'claimnoticeno' => $claimnotice->claimnoticeno,
            'claimnoticestatus' => $claimnotice->claimnoticestatus,
            'category_name' => $claimnotice->category_name,
            'subcategory_name' => $claimnotice->subcategory_name,
            'username' => $claimnotice->username,
           

            'created_at' => $claimnotice->created_at);
        } 

        // foreach ($respondantdetails as $respondantdetail)
        // {
        //   $data3 = array(
        //     'name' => $respondantdetail->name,
        //     'email' => $respondantdetail->email,
        //     'decrypt' => Crypt::decrypt($RespondentInformations->encrypt_pass),
        //     'daytimetelephone' => $respondantdetail->daytimetelephone,
        //     'respondant_type' => $respondantdetail->respondant_type,
        //   );
        // }
        foreach ($claimantdetails as $claimantdetail)
        {
          $data2 = array(
            'name' => $claimantdetail->name,
            
          ); 
        }   //mailclaimantname

        $data = [
          "data1" => $data1,       
           
          "data4"=>$data2
        ]; 

        $status = 'Payment Initiated Waiting for The Payment';
        $table = DB::table('claimantnotice')
        ->where('id' , $id)
        ->update(['claimnoticestatus' => $status]);
        $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
        $ClaimantNoticeStatus->claimantnoticeid = $id;
        $ClaimantNoticeStatus->claimantnoticestatus = $status;
        $ClaimantNoticeStatus->userid = Auth::user()->id; 
        $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
        $ClaimantNoticeStatus->created_id = Auth::user()->id;        
        $ClaimantNoticeStatus->save();

        $newclaimant = [
          'body' => $claimnotice->claimnoticeno.' '.$status,
          'actionURL' => route('claimantsnoticelist.index'),
        ];

        $newclaimant =  json_encode($newclaimant);

        $notification = new notifications(); 
        $notification->type = $status;
        $notification->latest = '1';
        $notification->name = $claimnotice->claimnoticeno.'  ' .$status;
        $notification->notifiable_type = $status;
        $notification->data = $newclaimant;
        $notification->notifiable_id = $claimnotice->userid;         
        $notification->created_at = date('Y-m-d H:i:s');
        $notification->updated_at = date('Y-m-d H:i:s');
        $notification->registration_claimnotice_id =$data1['claimnoticeid']; 
        $notification->save();



        $claimnotice = '';

        foreach ($claimnotices as $claimnotice ) {


          // $subject = 'Online Arbitration System(Claim Notice No:'.$data1['claimnoticeno'].') - Waiting For the Payment'; 
          Mail::send('emails.claimantpaymentadvice', $data, function($message) use ($claimantemail,$data,$data1){
            // echo ($claimantemail);exit;
            $message->to($claimantemail)
            ->subject('Electronic Arbitration System (EAS) - Payment Advice For Administration fees and Arbitration fees (Claim Notice - No:'.$data1['claimnoticeno'].')');
          });
        }




return redirect()->route('claimantsnoticelist.index')
->with('success','Payment Initiated has been Sent Successfully. Please Wait for Payment Completion');
}



public function getClaimNoticeDocumentDocumentss($id,$documenttype)
{
  $alfrescoURL = env('DOCUMENT_API').'/node/content/';
  $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
  $document = DatabaseHelper::getClaimDocumentDocumentsByDocumentType($id,$documenttype);
  $documentName = $document[0]->document_name;
  $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;
  $headers = array(
    'Content-Type: application/pdf',
  );
  return redirect($documentUrl);
}

}
