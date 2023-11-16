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
use App\models\paymentdetails;
use App\models\notifications;
use DB;
use Session;
use Auth;
use App\models\User;
use Role;
use Dompdf\dompdf;
use Redirect;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\AlfrescoDocument;
use App\DatabaseHelper;
use Razorpay\Api\Api;

class ClaimNoticeFeesController extends Controller
{
  public function index() 
  {  
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    if ( $user_id==null)
    {

      return view('auth.login');
    } 
    

    $claimnotice = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,
      ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name
      from claimantnotice sm
      left join claim_fees cf on (cf.claimnoticeid =sm.id )
      left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )
      inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
      left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
      left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  where sm.claimnoticestatus='Payment Initiated Waiting for The Payment' and sm.userid = ".Auth::user()->id. " order by sm.id desc");  
    $dispute_categories = DB::select("select dispute_categories.category_name, dispute_subcategories.subcategory_name from dispute_categories
     inner join dispute_subcategories on dispute_categories.id = dispute_subcategories.dispute_categories_id
     ");


    $dispute_subcategories = DB::table('dispute_subcategories')->get();
      // ->with('success','Respondent Access Sent Successfully. Please Wait for Respondent Decision')
    return view('claimnotice_fees.index', compact('claimnotice','dispute_categories','dispute_subcategories'));          
  }
  public function show($id)
  {
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    if ( $user_id==null)
    {

      return view('auth.login');
    }
    $claimnotices = DatabaseHelper::GetClaimNoticeShow($id);

     $total_pay_amt='';
    $extra_amt='';



   

    $payment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");

    $registration_fees_amt=$claimnotices[0]->total_fee;


    $service_percentage=($payment_service_amount[0]->service1_percentage)/100;

    $extra_amt= $registration_fees_amt * $service_percentage;

      // echo $registration_fees_amt;exit;

    $total_pay_amt_check=  $registration_fees_amt+ $extra_amt; 


$total_pay=number_format((float)$total_pay_amt_check, 2, '.', ''); 
// print_r($total_pay);exit;
    $checking=is_float($total_pay_amt_check);
     $total_pay_amt=str_replace(".", "", $total_pay);

    $respondantinformations = DatabaseHelper::getRespondantDetails($id); 
    $claimanttype=DB::select("select  cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");


    $claimantinformations =DatabaseHelper::getclaimantinformationsall($id);   



    $claimant_information =DatabaseHelper::GetClaimantInformationsshow($id);  

    $respondantdetails =   DatabaseHelper::getRespondantDetails($id);

    $ClaimNoticeStage = DB::select("select * from claimantnotice_stage where claimnoticeid=".$id);


    $claimandrelief = DatabaseHelper::getclaimandrelief($id);
    $getclaim_details = DatabaseHelper::getclaim_details($id);

    $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);

    $Arbitrator_Allocation = DB::select("select name as arbitrationname,DATE_FORMAT(cac.created_at,'%d/%m/%Y')  as arbitrator_acclocatedDate from claimant_arbitrator_configuration cac
      inner join users us on (us.id = cac.arbitrator_id) where claimnoticeid = ".$id);

    $ClaimNoticeStatus = DB::select("select us.name as creatorname,date_format(cns.created_at,'%d-%m-%Y %H:%i:%s') created_at,cns.claimantnoticestatus from claimantnoticestatus cns inner join users us on (us.id = cns.userid) where cns.claimantnoticeid = ".$id. " order by cns.id asc");
    $ClaimNoticeStatusCount = count($ClaimNoticeStatus);

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

    $counter_claim_list=DatabaseHelper::counter_claim_list($id);

    


    return view('Claimnotice_fees.show', compact('claimant_information','respondantdetails','claimnotices','dispute_categories','dispute_subcategories','ClaimNoticeStatus','claimandrelief','getclaim_details','respondantinformations','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend','total_pay_amt','extra_amt','total_pay_amt_check'));
  }

  public function payadminstrativefees_new(Request $request)
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
   $claimnotices = DB::select("select  sm.claimnoticeno,sm.claimnoticestatus,sm.created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name,cr.username, (cr.firstname + cr.lastname) as name,cr.phone,
    dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
    left join claimantregister cr on (cr.user_id =  sm.userid)
    inner join claim_fees cf on (cf.claimnoticeid =sm.id )
    INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
    inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
    inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.id=".$claimnoticeid);
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
  $data = [
    "data1" => $data1,       

  ]; 

  $status = 'Payment Completed, Allocate Arbitrator';
  $table = DB::table('claimantnotice')
  ->where('id' , $claimnoticeid)
  ->update(['claimnoticestatus' => 'Payment Completed, Allocate Arbitrator']);

  DB::table('claimnotice_invoices')
->where([['claimnoticeid' , $claimnoticeid],['invoice_type', 'Administration']])
->update(['platform_fee' => $request->extra_amt, 'transaction_id' => $payment_id]);

  $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
  $ClaimantNoticeStatus->claimantnoticeid = $claimnoticeid;
  $ClaimantNoticeStatus->claimantnoticestatus = 'Payment Completed, Allocate Arbitrator';
  $ClaimantNoticeStatus->userid = Auth::user()->id; 
  $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
  $ClaimantNoticeStatus->created_id = Auth::user()->id;        
  $ClaimantNoticeStatus->save();


  Mail::send('emails.claimantadminreceipt', $data, function($message) use ($claimantemail,$data,$data1){
            // echo ($claimantemail);exit;
   $message->to($claimantemail)
  ->subject('Electronic Arbitration System (EAS)- Claim Notice  ( No:'.$data1['claimnoticeno'].')-  Administration and Arbitration fees Payment Receipt');
 });

  $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, res.daytimetelephone,res.email,us.password,us.encrypt_pass from claimantnotice sm 
    INNER JOIN respondantdetails res on (res.claimnoticeid =  sm.id)
    INNER JOIN users us ON (us.id = res.user_id) where sm.id=".$claimnoticeid);
  
  foreach ($RespondentInformation as $RespondentInformations)
  {

    $newclaimant = [
      'body' => $RespondentInformations->claimnoticeno.' '.$status,
      'actionURL' => route('claimantsnoticelist.index'),
    ];
  }

  $newclaimant =  json_encode($newclaimant);
  $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
  foreach($emails as $Adminemail){
    $email = $Adminemail->email;
 // echo $data1['claimnoticeid']; exit;
    

    $notification = new notifications(); 
    $notification->type = 'ClaimNotice';
    $notification->latest = '1';
    $notification->name = $data1['claimnoticeno'].'  ' .'Payment Completed, Allocate Arbitrator';
    $notification->notifiable_type = 'Payment Completed, Allocate Arbitrator';
    $notification->data = $newclaimant;
    $notification->notifiable_id = $Adminemail->id;         
    $notification->created_at = date('Y-m-d H:i:s');
    $notification->updated_at = date('Y-m-d H:i:s');
    $notification->registration_claimnotice_id =$data1['claimnoticeid']; 
    $notification->save();
  }
  return redirect()->route('payadministationfees.index')
  ->with('success','Payment Completed Successfully. Please Wait for the Arbitrator Allocation for this Claim Notice');

  
}
public function invoice_list()
{  
  echo "jhjh";exit;
  $user_id = (auth()->check()) ? auth()->user()->id : null;
  if ( $user_id==null)
  {

    return view('auth.login');
  }
  $invoice=DB::select("SELECT * FROM claimnotice_invoices ci
    INNER JOIN claimantnotice cm ON (cm.id = ci.claimnoticeid)");
  return view('invoice.index', compact('invoice'));
}

}