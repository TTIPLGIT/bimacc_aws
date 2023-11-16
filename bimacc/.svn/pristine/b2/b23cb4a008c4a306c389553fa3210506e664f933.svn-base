<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ClaimFees;
use App\models\ClaimNotice;
use App\models\ClaimantNoticeStatus;
use App\models\ClaimantRegister;
use App\models\notifications;
use DB;
use Auth;
use Role;
use App\models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use Dompdf\Dompdf;
use App\Notifications\NewClaimantNotification;
use Illuminate\Notifications\Notifiable;
use App\AlfrescoDocument;
use App\DatabaseHelper;
use Razorpay\Api\Api;
use Session;
use Exception;


class ClaimFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {
 
     $ClaimFees = ClaimFees::all();        

     return view('claimnotice.create', compact('ClaimFees'));
   }


   public function store(Request $request, $id =null)
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
 
    $ClaimFess = new ClaimFees(); 
    $ClaimFess->dispute_categories_id = $request->dispute_categories_id;
    $ClaimFess->dispute_subcategories_id = $request->dispute_subcategories_id;
    //$ClaimFess->claim_amount = $request->claim_amount;
    $ClaimFess->claim_amount_purpose = $request->claim_amount_purpose;
    $ClaimFess->registration_fees = $request->registration_fees;
    $ClaimFess->status = 'Payment In Progress';
    $ClaimFess->claimnoticeid = session()->get('ClaimNoticeID');
    $ClaimFess->created_id = Auth::user()->id;        
    $ClaimFess->user_id = Auth::user()->id;



      //  echo json_encode($ClaimFess); exit;
    if($ClaimFess->save()){


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

    $claimnotice_invoices = DB::table('claimnotice_invoices')->insertGetId([
              'invoiceno' => $invoiceno,
              'claimnoticeid' => session()->get('ClaimNoticeID'),
               'invoicedate' => NOW(),
              'invoice_type' => 'Registration',
              'invoiceamount' => $request->registration_fees,
              'platform_fee'=>$request->extra_fees,
              'transaction_id'=>$payment_id,
              'created_by' => auth()->user()->id,
              'created_at' => NOW()
      ]);


     $ClaimNoticeID = session()->get('ClaimNoticeID');
     // $table = DB::table('claimantnotice')
     // ->where('id' , $ClaimFess->claimnoticeid)
     // ->update(['claimnoticestatus' => 'Payment In Progress']);

   
 
       $table = DB::table('claimantnotice')
     ->where('id' , $ClaimFess->claimnoticeid)
     ->update(['claimnoticestatus' => 'New Claim Created']);


     // $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
     // $ClaimantNoticeStatus->claimantnoticeid = session()->get('ClaimNoticeID');
     // $ClaimantNoticeStatus->claimantnoticestatus = 'Payment In Progress';
     // $ClaimantNoticeStatus->userid = Auth::user()->id;  
     // $ClaimantNoticeStatus->created_id = Auth::user()->id;        
     // $ClaimantNoticeStatus->save();

      $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
     $ClaimantNoticeStatus->claimantnoticeid = session()->get('ClaimNoticeID');
     $ClaimantNoticeStatus->claimantnoticestatus = 'New Claim Created';
     $ClaimantNoticeStatus->userid = Auth::user()->id;  
     $ClaimantNoticeStatus->created_id = Auth::user()->id;
    $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));
     $ClaimantNoticeStatus->save();

     $userid = Auth::user()->id;

     $id=session()->get('ClaimNoticeID');
       //send email and pdf to claimant

     
     $claimnotices = DB::select("select  sm.claimnoticeno,sm.claimnoticestatus,sm.created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,
      dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
      left join claimantregister cr on (cr.user_id =  sm.userid)
      inner join claim_fees cf on (cf.claimnoticeid =sm.id )
      INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
      inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
      inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.id=".$id);


     $claimant_informations = DB::select("select ci.name,ci.address,ci.country,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type,node_ref,work_space,space_store,alfresco_document_name,document_name,document_type from claimant_informations ci
      left join claimant_respondant_type crt on (crt.id =ci.claimant_type ) 
      left join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA') where ci.claimnoticeid=".$id); 

     $respondantdetails = DB::select("select ci.name,ci.address,ci.email,ci.country,ci.state,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as respondant_type from respondantdetails ci
      inner join claimant_respondant_type crt on (crt.id =ci.respondant_type ) where ci.claimnoticeid=".$id);

     $claim_details = DB::select("select account_name,commercial_monthly,loan_taken_date,percentage_interest,
      NPADate,total_amount,Total_outstanding_Amount,
      claim_details_remarks,loanaccountno,sequirity,rate_penalinterest,
      dateofrevival,lp.loan_type_name from claim_details cd
      inner join loan_type lp on (lp.id = cd.loan_type_id ) where cd.claimnoticeid=".$id);


     $relief_requests = DB::select("select * from relief_request where claimnoticeid=".$id);

     $claim_fees = DB::select("select cf.claim_amount,cf.claim_amount_purpose,cf.registration_fees,dc.category_name,dsc.subcategory_name from claim_fees cf inner join claimant_informations cm on (cm.claimnoticeid = cf.claimnoticeid) inner join dispute_categories dc on (dc.id = cm.dispute_categories_id) inner join dispute_subcategories dsc on (dsc.id = cm.dispute_subcategories_id) where cm.claimnoticeid=".$id);


     $ClaimantInformationss = DB::select("select * from claimantregister where user_id=".Auth::user()->id);

     foreach ($ClaimantInformationss as $ClaimantInformation){
      $user_id = $ClaimantInformation->user_id;
      $email = $ClaimantInformation->email;
      $phone = $ClaimantInformation->phone;
      $firstname=$ClaimantInformation->firstname;
      $lastname=$ClaimantInformation->lastname;

      $ClaimantInformation = array(
            'user_id'=>$ClaimantInformation->user_id,
            'email' => $ClaimantInformation->email,
            'phone' => $ClaimantInformation->phone,
            'firstname' => $ClaimantInformation->firstname,
            'lastname' => $ClaimantInformation->lastname);

    } 

    foreach ($claimnotices as $claimnotice ) {

      $data1 = array(
        'claimnoticeid'=>$claimnotice->id,
        'claimnoticeno' => $claimnotice->claimnoticeno,
        'claimnoticestatus' => $claimnotice->claimnoticestatus,
        'category_name' => $claimnotice->category_name,
        'subcategory_name' => $claimnotice->subcategory_name,
        'created_at' => $claimnotice->created_at);
    } 

    $data = [
      "data1" => $data1 
    ];


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
   <td >'.$respondantdetail->name.'</td>
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

$basepath= url('/');
$imagepath = $basepath.'/images/pic.png';

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

$claimnoticedetails = DatabaseHelper::getClaimNoticeUserDetails($ClaimNoticeID);
   foreach ($claimnoticedetails as $claimnoticedetail) {
          $claimnoticeno = $claimnoticedetail->claimnoticeno;
          $email = $claimnoticedetail->email;
          $phone = $claimnoticedetail->phone;
          $claimantname = $claimnoticedetail->username;

        } 
   $data = array(
    'claimantname' => $claimantname,
    'claimnoticeno'=>$claimnoticeno,

  );


      // command start
  Mail::send('emails.claimant_paymentreceipt', ["data1"=>$data], function($message) use ($email,$receiptPath,$data,$claimnoticeno){
    $message->to($email)
    ->subject('Electronic Arbitration System (EAS) Claim Notice  ( No:'.$data['claimnoticeno'].') -Registration Payment Receipt')
    ->attach($receiptPath);
  }); 
// command end



//exit;



               //end claimant
$emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
foreach($emails as $Adminemail){
  $email = $Adminemail->email;
// echo $email; exit;
  // commad start
  // Mail::send('emails.welcome2', $data, function($message) use ($email,$receiptPath,$data,$data1){
  //   $message->to($email)
  //   ->subject('Online Arbitration System(Claim Notice No:'.$data1['claimnoticeno'].') - Respondent System Access Permission')
  //   ->attach($receiptPath);
  // });
// commad end
  $newclaimant = [
    'body' => $data1['claimnoticeno'].'  New Claim Notice Created',
    'actionURL' => route('claimantsnoticelist.index'), 
  ];

  $newclaimant =  json_encode($newclaimant);

  $notification = new notifications(); 
  $notification->type = 'ClaimNotice';
  $notification->latest = '1';
  $notification->name = $data1['claimnoticeno'].'  ' .'New Claim Notice Created';
  $notification->notifiable_type = 'New Claim Created';
  $notification->data = $newclaimant;
  $notification->notifiable_id = $Adminemail->id;         
  $notification->created_at = date('Y-m-d H:i:s');
  $notification->updated_at = date('Y-m-d H:i:s');
  $notification->registration_claimnotice_id = session()->get('ClaimNoticeID'); 
  $notification->save();
 }
}

// try {
//             $key = env('PAYUMONEY_MERCHANT_KEY');
//             $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//             $amount = $request->registration_fees;
//             $firstname = $ClaimantInformation['firstname'];
//             $email = $ClaimantInformation['email'];
//             $phone = $ClaimantInformation['phone'];
//             $productinfo = 'Registration';
//             $udf1 = $data1['claimnoticeno'];
//             $udf2 = $data1['claimnoticeid'];
//             $udf3 = '';
//             $udf4 = '';
//             $udf5 = '';
//             $udf6 = '';
//             $udf7 = '';
//             $udf8 = '';
//             $udf9 = '';
//             $udf10 = ''; 

//             $hash_string = $key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$udf5.'|'.$udf6.'|'.$udf7.'|'.$udf8.'|'.$udf9.'|'.$udf10.'|';
//             $hash_string .= env('PAYUMONEY_SALT');
//             $hash = strtolower(hash('sha512', $hash_string));
//             $action = env('PAYUMONEY_BASE_URL').'/_payment';
//             $success = env('PAYUMONEY_PAYMENT_SUCCESS_URL');
//             $failure = env('PAYUMONEY_PAYMENT_FAILURE_URL');
//             $serviceProvider = env('PAYUMONEY_SERVICE_PROVIDERL');
            
//             return view('payment.payment', compact('key', 'txnid', 'amount', 'firstname', 'email', 'phone', 'productinfo', 'hash', 'action', 'success', 'failure', 'serviceProvider','udf1','udf2'));
//         } catch (\Exception $exc) {
//             echo $exc;
//         }

return redirect()->route('claimnotice.index')
    ->with('success','Claim Notice Created Successfully. Please Wait for the Respondent Confirmation');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function razorpayindex()
    {        
        return view('razorpayView');
    }

    private function GeneratePayment($i)
    {
          
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

      $this->validate($request, [
        'claim_amount' => 'required',                        
        'claim_amount_purpose' => 'required',
        'registration_fees' => 'required',            
      ]);

      $ClaimFess = ClaimFees::findOrFail($id);
      $ClaimFess->dispute_categories_id = $request->dispute_categories_id;
      $ClaimFess->dispute_subcategories_id = $request->dispute_subcategories_id;
      $ClaimFess->claim_amount = $request->claim_amount;
      $ClaimFess->claim_amount_purpose = $request->claim_amount_purpose;
      $ClaimFess->registration_fees = $request->registration_fees;
      $ClaimFess->status = 'New Claim Created';
      $ClaimFess->claimnoticeid = session()->get('ClaimNoticeID');
      $ClaimFess->created_id = Auth::user()->id;        
      $ClaimFess->user_id = Auth::user()->id;
      $ClaimFess->update();
      return redirect()->route('claimnotice.index')
      ->with('success','Claim Notice Updated Successfully.');
    }

     public function razorpayment(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
         return redirect()->route('claimnotice.index');
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
  }
