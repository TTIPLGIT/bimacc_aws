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
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
use App\User;
use Session;
use Input;
use Redirect;
use PDF;
use Dompdf\Dompdf;
use App\DatabaseHelper;

class ArbitratorConfigurationController extends Controller
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
      $claimnotice = DB::select("select distinct sm.claimnoticeno,sm.claimnoticestatus, date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,dcp.subcategory_name,
      CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code  from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join dispute_categories dc on (cf.dispute_categories_id = dc.id)
         left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )
        inner join dispute_subcategories dcp on (dcp.id = cf.dispute_subcategories_id)
         LEFT JOIN claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id) 
        where claimnoticestatus in ('Payment Completed, Allocate Arbitrator','Arbitrator To Accept the Allocation','Arbitrator Approved and Claim Petition Initiated','Claim Petion Document Uploaded by Claimant','Statement of Objection Uploaded by Respondent','Claim Petition - InProgress','Claim Petition - Completed','Disposed','Arbitrator Rejected','Auto Rejected') or isstageinitiated='Y'  order by sm.id desc");


      $arbitratorlist = DatabaseHelper::getarbitratormaster();

      $claimant_informations = ClaimantInformation::all();        

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id'); 
      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
      $dispute_subcategories = DB::table('dispute_subcategories')->get();    

      return view('arbitratorconfiguration.index', compact('claimnotice','arbitratorlist','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('arbitratorconfiguration.show');
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

      $remarks = $request->remarks;
    $count = count($request->arbitrator_id);

    for ($i=0; $i < $count; $i++) { 
      $arbitratorconfiguration = new  ArbitratorConfiguration();      
      $arbitratorconfiguration->arbitrator_id = $request->arbitrator_id[$i];
      $arbitratorconfiguration->claimnoticeid = $request->claimnoticeid;
      $arbitratorconfiguration->claiment_id = $request->claiment_id;
      $arbitratorconfiguration->user_id = $request->user_id;
      $arbitratorconfiguration->created_id = Auth::user()->id;
      $arbitratorconfiguration->remarks =$remarks;
      $arbitratorconfiguration->save();
      
      $arbitratorconfigurationmail = DB::select("select * from users where id=".$request->arbitrator_id[$i]);
      foreach ($arbitratorconfigurationmail as $key => $arbitratorconfigurationmail1) {
       $email = $arbitratorconfigurationmail1->email;

       

      
        $claimnotices = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,DATE_FORMAT(sm.created_at,'%d/%m/%Y') created_at,cf.claim_amount,sm.id,res.user_id,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,res.firstname AS res_name,ci.firstname AS clai_name from claimantnotice sm
        left join claimant_informations ci on (ci.claimnoticeid= sm.id)
        left join respondantdetails res on (res.claimnoticeid = sm.id)
        left join claim_fees cf on (cf.claimnoticeid =sm.id )
        left join dispute_categories dc on (cf.dispute_categories_id = dc.id)
        left join dispute_subcategories dcp on (dcp.id = cf.dispute_subcategories_id) where sm.id=".$id);

         $claimant_informations = DB::select("select distinct ci.name,ci.address,ci.country,ci.age,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type,cnd.node_ref,cnd.work_space,cnd.space_store,cnd.alfresco_document_name,cnd.id AS document_id,cni.id AS document_id_idproof,cni.document_name AS claimant_IDproof,cnd.document_name,cnd.document_type,cr.organization_name,cr.organization_details  from claimant_informations ci
left join claimant_respondant_type crt on (crt.id =ci.claimant_type) 
inner join claimantnotice cn on (cn.id = ci.claimnoticeid)
inner join claimantregister cr on (cr.user_id = cn.userid)
LEFT join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA')
LEFT join claimnoticedocumentdetails cni on (cni.claimnoticeid = ci.claimnoticeid and cni.document_type='IDPROOF') where ci.claimnoticeid=".$id);    

     $respondantdetails = DB::select("select ci.name,ci.age,ci.address,ci.email,ci.country,ci.state,ci.city,
ci.daytimetelephone,crt.claimant_respondant_type_name as respondant_type,cd.document_name,cd.id as document_id from respondantdetails ci
      inner join claimant_respondant_type crt on (crt.id =ci.respondant_type )
      INNER JOIN claimnoticedocumentdetails cd ON (cd.claimnoticeid = ci.claimnoticeid AND ci.user_id = cd.claimant_respondent_id) where ci.claimnoticeid=".$id);

    $claim_details = DB::select("select account_name,commercial_monthly,percentage_interest,total_amount,Total_outstanding_Amount,date_format(cd.NPADate,'%d-%m-%Y') as NPADate,date_format(cd.loan_taken_date,'%d-%m-%Y') as loan_taken_date,
      claim_details_remarks,loanaccountno,sequirity,rate_penalinterest,
      dateofrevival,lp.loan_type_name,cd.rate_penalinterest,date_format(cd.dateofrevival,'%d-%m-%Y') dateofrevival,cd.claim_details_Remarks from claim_details cd
      inner join loan_type lp on (lp.id = cd.loan_type_id )  where cd.claimnoticeid=".$id);

    $relief_requests = DB::select("select * from relief_request where claimnoticeid=".$id);
    $claim_fees = DB::select("select cf.claim_amount,cf.claim_amount_purpose,cf.registration_fees,dc.category_name,dsc.subcategory_name from claim_fees cf inner join claimant_informations cm on (cm.claimnoticeid = cf.claimnoticeid) inner join dispute_categories dc on (dc.id = cm.dispute_categories_id) inner join dispute_subcategories dsc on (dsc.id = cm.dispute_subcategories_id) where cm.claimnoticeid=".$id); 


      foreach ($claimnotices as $claimnotice) {
        $useridnew= $claimnotice->user_id; 
        $data1 = array(
          'claimnoticeno' => $claimnotice->claimnoticeno,
          'claimnoticestatus' => $claimnotice->claimnoticestatus,
          'claimnoticedate' => $claimnotice->created_at,
          'claim_amount' => $claimnotice->claim_amount,
          'user_id' => $claimnotice->user_id,
          'category_name' => $claimnotice->category_name,
          'subcategory_name' => $claimnotice->subcategory_name,
          'res_name'=>$claimnotice->res_name,
          'clai_name'=>$claimnotice->clai_name,

        );

      }


       $dataname = array(
          'name' =>$arbitratorconfigurationmail1->username
        );
       $data = [
        "data1" => $data1,
        "dataname"=>$dataname 
      ]; 

            
     //send mail claim notice

      $newclaimant = [
        'body' => $data1['claimnoticeno'].' '.'Arbitrator Allocated and Waiting for the acceptance',
        'actionURL' => route('claimantsnoticelist.index'),
      ];


      $newclaimant =  json_encode($newclaimant);
      $notification = new notifications(); 
      $notification->type =  'ClaimNotice';
      $notification->latest = '1';
      $notification->name = $data1['claimnoticeno'].' '.'Arbitrator Allocated and Waiting for the acceptance';
      $notification->notifiable_type = $data1['claimnoticeno'].' '.'Arbitrator Allocated and Waiting for the acceptance';
      $notification->data = $newclaimant;
      $notification->notifiable_id = $arbitratorconfigurationmail1->id;         
      $notification->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
      $notification->updated_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
      $notification->registration_claimnotice_id =$id; 
      $notification->save();
      $claimnotice = '';
      
      foreach ($claimnotices as $claimnotices ) {
       $claimnotice =  '
       <tr>
       <td >'.$claimnotices->claimnoticeno.'</td>
       <td >'.$claimnotices->claimnoticestatus.'</td>
       <td>'.$claimnotices->category_name.'</td>
       <td>'.$claimnotices->subcategory_name.'</td>
       <td>'.$claimnotices->created_at.'</td>

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
     <td>'.$respondantdetail->name.'</td>
     <td '.$respondantdetail->email.'</td>
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
    $claim_fee = '
    <tr>
    <td style="border:1px">'.$claim_fee->claim_amount.'</td>
    <td style="border:1px">'.$claim_fee->claim_amount_purpose.'</td>
    <td style="border:1px">'.$claim_fee->registration_fees.'</td>
    <td style="border:1px">'.$claim_fee->category_name.'</td>
    <td style="border:1px">'.$claim_fee->subcategory_name.'</td>
    </tr>';

  }



    $html = '
   <html>
   <head>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Online Arbitration Systems</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
   <p align="center">Online Arbitration System</p>
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
   <th>daytimetelephone</th>
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
   <th>loan accountno</th> 
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
   <th>Setoff and Counterclaim</th>
   <th>Partition and Distripution of assets</th>  
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
  $dompdf->render();
  $output = $dompdf->output();
  $receiptName = str_replace('/', '_', $data1['claimnoticeno']).'.pdf';
  $receiptPath = $fileDirPath."/".$receiptName;
  file_put_contents($receiptPath, $output);

  Mail::send('emails.SendToArbitrator', $data, function($message) use ($email,$receiptPath,$data,$data1,$dataname){
    // echo "int";exit;
    $message->to($email)
    ->subject(': ElectronicArbitration System (EAS) - Claim Notice('.$data1['claimnoticeno'].') - Arbitrator Appointment.');
   

    // ->attach($receiptPath);
  });
}
}



$respondent_adminfees=DB::select("SELECT * FROM respondents_decision WHERE claim_notice_id = ".$request->claimnoticeid." and respondent_decision='Disputing and Contesting the Claim'");

$respondent_details=DB::select("SELECT * FROM respondantdetails WHERE claimnoticeid = ".$request->claimnoticeid);
$arbitrator_decision=DB::select("SELECT claimnoticestatus FROM claimantnotice WHERE id = ".$request->claimnoticeid);
$arbitrator_decisions=$arbitrator_decision[0]->claimnoticestatus;
// echo ($arbitrator_decisions);exit;
if (count($respondent_adminfees) == count($respondent_details))
  {
   
$table = DB::table('claimantnotice')
->where('id' , $request->claimnoticeid)
->update(['claimnoticestatus' => 'Arbitrator To Accept the Allocation']);
}

elseif ($arbitrator_decisions=='Arbitrator Rejected')
  {
   
$table = DB::table('claimantnotice')
->where('id' , $request->claimnoticeid)
->update(['claimnoticestatus' => 'Arbitrator To Accept the Allocation']);
}
elseif ($arbitrator_decisions=='Auto Rejected')
  {
   
$table = DB::table('claimantnotice')
->where('id' , $request->claimnoticeid)
->update(['claimnoticestatus' => 'Arbitrator To Accept the Allocation']);
}
else{
$table = DB::table('claimantnotice')
->where('id' , $request->claimnoticeid)
// ->update(['claimnoticestatus' => 'Arbitrator To Accept the Allocation']);
->update(['claimnoticestatus' => 'Arbitrator Allocated and Waiting for the Respondent Payment']);
}
$ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
$ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
$ClaimantNoticeStatus->remarks = $request->remarks;
$ClaimantNoticeStatus->claimantnoticestatus = 'Arbitrator Allocated';
$ClaimantNoticeStatus->userid = Auth::user()->id;
$ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
$ClaimantNoticeStatus->created_id = Auth::user()->id;        
$ClaimantNoticeStatus->save(); 
return redirect()->route('arbitratorconfiguration.index')
->with('success','Arbitrator Allocated Successfully. Please Wait for Further Updates');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
      
$claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");


       $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);  

     $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);
     $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
     $respondantdetails = DatabaseHelper::getRespondantDetails($id); 
     $claim_details = DatabaseHelper::getClaimDetails($id);
     $claim_fees = DatabaseHelper::getClaimfeesDetails($id);      
     $relief_request = DatabaseHelper::getReliefRequest($id);
     $claimandrelief = DatabaseHelper::getclaimandrelief($id);
     $getclaim_details = DatabaseHelper::getclaim_details($id);
     $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);
     $ClaimNoticeStatus =DatabaseHelper::getClaimNoticeStatus($id);
     $arbitratorlist = DatabaseHelper::getarbitratormaster();
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
$respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);

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




     return view('arbitratorconfiguration.show', compact('claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','claimandrelief','getclaim_details','claimanttype','claimantinformations','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'
));

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ArbitratorAllocation(Request $request,$id)
    {

        // $request->arbitrator_id;
       // echo $id; exit;

    }
  }
