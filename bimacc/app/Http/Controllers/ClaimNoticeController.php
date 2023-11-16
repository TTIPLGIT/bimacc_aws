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
use Log;
use File; 
use Storage;
use App\models\User; 
use Role;
use Dompdf\dompdf;
use Redirect; 
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail; 
use App\AlfrescoDocument;
use App\DatabaseHelper;
use Razorpay\Api\Api;

class ClaimNoticeController extends Controller
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
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      session()->flash('ClaimNoticeID');


      $message = '';
      $message1 = '';
      $message2 = '';
      $message3 = '';

      $redirect = request()->i;
      $request = request();

      //echo json_encode($request) ; exit;
      echo $request->key; 

      $key                =   $request->key;
      $salt               =   $request->salt;
      $txnid              =   $request->txnid;
      $amount             =   $request->amount;
      $productInfo        =   $request->productinfo;
      $firstname          =   $request->firstname;
      $email              =   $request->email;
      $udf5               =   $request->udf5;
      $mihpayid           =   $request->mihpayid;
      $status             =   $request->status;
      $resphash               =   $request->hash;
    //Calculate response hash to verify 
      $keyString          =   $key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
      $keyArray           =   explode("|",$keyString);
      $reverseKeyArray    =   array_reverse($keyArray);
      $reverseKeyString   =   implode("|",$reverseKeyArray);
      $CalcHashString     =   strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));

       // echo $request->key; exit;
      if ($status == 'success'  && $resphash == $CalcHashString) {
        $msg = "Transaction Successful and Payment Completed...";
        //Do success order processing here...
      }
      else {
        //tampered or failed
        $msg = "Payment failed for Hasn not verified Please Contact Admin";
      } 

      if ($redirect != null) {


        $key = 'success';
        $key1 = 'failure';
        if ($RMK =='success') { 
        }

        else if($RMK =='failure') { 
        }
        else
        {

        }

        $claimantnoticestatus = 'New Claim Created';
        $table = DB::table('claimantnotice')
        ->where('id' , $ClaimNoticeId)
        ->update(['claimnoticestatus' => $claimnoticestatus]); 
        $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
        $ClaimantNoticeStatus->claimantnoticeid = $ClaimNoticeId;
        $ClaimantNoticeStatus->claimantnoticestatus = $claimnoticestatus;
        $ClaimantNoticeStatus->userid = Auth::user()->id; 
        $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
        $ClaimantNoticeStatus->created_id = Auth::user()->id;        
        $ClaimantNoticeStatus->save();
      }


      // $claimnotice = DB::select("select sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,ci.organization_details,ci.poa_holder,
      //   ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,(SELECT arbitrator_fees FROM arbitrator_allocation_fees 
      //   where cd.claimamount between claim_amount_form and claim_amount_to) AS arbitrator_fees,cd.claimamount,
      //   (SELECT adminstration_fees FROM arbitrator_allocation_fees 
      //   where cd.claimamount between claim_amount_form and claim_amount_to) AS adminstration_fees
      //   from claimantnotice sm
      //   left join claim_fees cf on (cf.claimnoticeid =sm.id )
      //   left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )
      //   inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
      //   left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
      //   left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  where sm.del_status = 0 and sm.userid = ".Auth::user()->id. " order by sm.id desc"); 

       $claimnotice = DB::select("select sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,ci.organization_details,ci.poa_holder,
        ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name
        from claimantnotice sm
        left join claim_fees cf on (cf.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null and cd.deleted_at IS NULL )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  WHERE  sm.del_status='0' and  sm.userid = ".Auth::user()->id. " order by sm.id desc");  

        

       $claimantamend=array();
       

        foreach ($claimnotice as $fees) {
        // array_push($claimnoticeid,$claimnotice->claimid);
        $claimnoticeid=$fees->claimid;
        $claimantamend[] = DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Claimant ClaimNotice Amend'  and  claimnoticeid=".$claimnoticeid . " and created_id = " .Auth::user()->id);

  // dd($claimantamend);
      }
      
      $dispute_categories = DB::select("select dispute_categories.category_name, dispute_subcategories.subcategory_name,dispute_subcategories.dispute_categories_id from dispute_categories
       inner join dispute_subcategories on dispute_categories.id = dispute_subcategories.dispute_categories_id 
       ");
      $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);
 

      $dispute_subcategories = DB::table('dispute_subcategories')->get();
      // ->with('success','Respondent Access Sent Successfully. Please Wait for Respondent Decision')
      return view('claimnotice.index', compact('claimnotice','dispute_categories','dispute_subcategories','message','message1','message2','message3','claimanttype','claimantamend'));          
    }
 public function trash()
    {  
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      
   
        
      



      

       $claimnotice = DB::select("select sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,ci.organization_details,ci.poa_holder,
        ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name
        from claimantnotice sm
        left join claim_fees cf on (cf.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null and cd.deleted_at IS NULL )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  WHERE  sm.del_status='1' and sm.del_status !='0' and sm.userid = ".Auth::user()->id. " order by sm.id desc");  
//        $claimnotice_arr=array();
//        foreach ($claimnotice_list as $status) {
//       // array_push($fees->claimid);
//   $claimnoticeid=$status->claimid;
 
//          $current_date1=DB::select("SELECT CURDATE() as curr_date");

//  $reg_date1=DB::select("SELECT distinct  DATE_FORMAT(created_at, '%Y-%m-%d')  AS reg_date FROM claimantnotice WHERE id=".$claimnoticeid);
 
//   if($reg_date1== null)
//    {
//     $current_date1=DB::select("SELECT CURDATE() as curr_date");
//     $current_date=$current_date1[0]->curr_date;

//     $reg_date="0";
//   }
// // SELECT SUM(case when dbue.points IS NULL then 0 ELSE dbue.points END) AS points
//   else{

//    $current_date1=DB::select("SELECT CURDATE() as curr_date");
//    $current_date=$current_date1[0]->curr_date;
//    $reg_date=$reg_date1[0]->reg_date;

//  }
//  $limit_daynew=DB::select("SELECT DATEDIFF( '$current_date','$reg_date') AS limit_day");
// $limit_daynew1=$limit_daynew[0]->limit_day;

// $claimnotice = DB::select("select sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,ci.organization_details,ci.poa_holder,
//         ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,(SELECT arbitrator_fees FROM arbitrator_allocation_fees 
//         where cd.claimamount between claim_amount_form and claim_amount_to) AS arbitrator_fees,cd.claimamount,
//         (SELECT adminstration_fees FROM arbitrator_allocation_fees 
//         where cd.claimamount between claim_amount_form and claim_amount_to) AS adminstration_fees
//         from claimantnotice sm
//         left join claim_fees cf on (cf.claimnoticeid =sm.id )
//         left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )
//         inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
//         left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
//         left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  WHERE cd.deleted_at IS NULL and sm.del_status='1' and sm.del_status !='0' and $limit_daynew1 <='30' and sm.userid = ".Auth::user()->id. " order by sm.id desc"); 

//  // echo json_encode($limit_daynew);exit;
// $claimnotice_arr = array_merge($claimnotice_arr, $claimnotice);
// // $claimnotice_arr=$claimnotice;
//       }
//       $claimnotice=$claimnotice_arr;
// dd($claimnotice);
       
      
      $dispute_categories = DB::select("select dispute_categories.category_name, dispute_subcategories.subcategory_name,dispute_subcategories.dispute_categories_id from dispute_categories
       inner join dispute_subcategories on dispute_categories.id = dispute_subcategories.dispute_categories_id 
       "); 
      $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);
 

      $dispute_subcategories = DB::table('dispute_subcategories')->get();
      // ->with('success','Respondent Access Sent Successfully. Please Wait for Respondent Decision')
      return view('claimnotice.restore', compact('claimnotice','dispute_categories','dispute_subcategories','claimanttype'));          
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
     $user_id = (auth()->check()) ? auth()->user()->id : null;
     if ( $user_id==null)
     {

      return view('auth.login');
    }
    $total_pay_amt='';
    $extra_amt='';
    $total_pay_amt_check='';
    $claimnoticeIDNew = (session()->get('ClaimNoticeID')); 
    if ($claimnoticeIDNew == '' ) 
    {
      $claimnoticeID = '0';
    }
    else
    {
      $claimnoticeID = (session()->get('ClaimNoticeID')); 
    }

    $claimregister = DB::select("select * from claimantregister where user_id = ".Auth::user()->id);

    $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);


      //echo json_encode($claimregister); exit;

    $respondant_type = DB::select("select * from claimant_respondant_type where type = 'respondant' order by claimant_respondant_type_name asc");
 //echo json_encode($claimantinformations); exit;
    $claimantinformations = DB::select("select ci.others, ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.name,ci.address,ci.country,ci.state,ci.city,ci.age,dis.dispute_category_Code,ci.company_individual ,ci.dept_name,ci.govt_name,ci.others,ci.aadhar_num,
      ci.zipcode,ci.daytimetelephone,ci.email,crt.claimant_respondant_type_name as claimant_type,ci.dispute_categories_id,ci.company_name,ci.dispute_subcategories_id,
      dis.category_name,diss.subcategory_name,ci.claimnoticeid,ci.currency from claimant_informations ci
      left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
      left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)
      left join claimant_respondant_type  crt on (crt.id = ci.claimant_type) 
      where ci.deleted_at is null and ci.claimnoticeid = ".$claimnoticeID );  

// dd ($claimantinformations);
    $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,ci.company_name,ci.proprietar_name,ci.aadhar_num,
      ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
      crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
      left join claimant_respondant_type  crt on (crt.id = ci.respondant_type) where ci.deleted_at is null and  ci.claimnoticeid=".$claimnoticeID);   

       // echo json_encode($respondantinformations); exit;   

    $ClaimDetails = DB::select("select percentage_interest ,total_amount ,Applicants ,
      cd.total_outstanding_amount,cd.date_of_warranty_end,cd.id,cd.account_name,cd.loan_type_id,cd.claim_interest,cd.claimamountwithinterest,
      cd.loanaccountno, cd.rate_penalinterest,cd.sequirity,cd.dateofrevival, cd.NPADate,cd.loan_taken_date, cd.type_account,cd.commercial_monthly, cd.name_of_the_branch,cd.claim_details_Remarks,ci.currency, cd.date_of_account_opened,cd.name_of_the_registered_representative, ci.currency ,dis.category_name,diss.subcategory_name, dis.id as dispute_catagory_id,diss.id as dispute_subcategory_id from claim_details cd left join dispute_categories dis on (dis.id = cd.dispute_categories_id) left join dispute_subcategories diss on (diss.id = cd.dispute_subcategories_id) inner join claimant_informations ci on (ci.claimnoticeid = cd.claimnoticeid) where cd.deleted_at is null and  cd.claimnoticeid = ".$claimnoticeID); 
    


      //claim details send email to centre

      //$claimandrelief = 

    $claimandrelief = DatabaseHelper::getclaimandrelief($claimnoticeID);
    $getloan = DatabaseHelper::getloan($claimnoticeID);

    $getclaim_details = DatabaseHelper::getclaim_details($claimnoticeID);


      //Multiple Addition  Start
    $realestate_claim = DatabaseHelper::realestate_claim($claimnoticeID);
    $realestate_claim_details = DatabaseHelper::realestate_claim_details($claimnoticeID);
    $insurance_claim = DatabaseHelper::insurance_claim($claimnoticeID);
    $insurance_claim_part_2 = DatabaseHelper::insurance_claim_part_2($claimnoticeID);
    $family_claim = DatabaseHelper::family_claim($claimnoticeID);
    $family_claim_movable = DatabaseHelper::family_claim_movable($claimnoticeID);
    $contract_relief = DatabaseHelper::contract_relief($claimnoticeID);

      //Banking and Finaicial Reports 

    $banking_claim_mort = DatabaseHelper::banking_claim_mort($claimnoticeID);
    $banking_claim_hypo = DatabaseHelper::banking_claim_hypo($claimnoticeID);
    $banking_claim_pledge = DatabaseHelper::banking_claim_pledge($claimnoticeID);
    $banking_claim_personal = DatabaseHelper::banking_claim_personal($claimnoticeID);
    $banking_claim_corporate = DatabaseHelper::banking_claim_corporate($claimnoticeID);
    $banking_claim_mort_details = DatabaseHelper::banking_claim_mort_details($claimnoticeID);
    $banking_claim_hypo_details = DatabaseHelper::banking_claim_hypo_details($claimnoticeID);
    $banking_claim_pledge_details = DatabaseHelper::banking_claim_pledge_details($claimnoticeID);
    $banking_claim_pro_details = DatabaseHelper::banking_claim_pro_details($claimnoticeID);
    $banking_relief = DatabaseHelper::banking_relief($claimnoticeID);
    $bank_account = DatabaseHelper::bank_account($claimnoticeID);

     $security_type = DatabaseHelper::security_type($claimnoticeID);
$renewal_date = DatabaseHelper::renewal_date($claimnoticeID);
$revival_date = DatabaseHelper::revival_date($claimnoticeID);

$legal_notice = DatabaseHelper::legal_notice($claimnoticeID);
$other_document = DatabaseHelper::other_document($claimnoticeID);

$security_type_counter = DatabaseHelper::security_type_counter($claimnoticeID);
$renewal_date_counter = DatabaseHelper::renewal_date_counter($claimnoticeID);
$revival_date_counter = DatabaseHelper::revival_date_counter($claimnoticeID);

$legal_notice_counter = DatabaseHelper::legal_notice_counter($claimnoticeID);
$other_document_counter = DatabaseHelper::other_document_counter($claimnoticeID);
$bank_account_counter= DatabaseHelper::bank_account_counter($claimnoticeID);


//      'banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details'

       //Multiple Addition End

    $ReliefRequests = DB::select("SELECT *,cr.total_amount_bank,re.id,ci.currency from relief_request re inner join claimant_informations ci on (ci.claimnoticeid = re.claimnoticeid)
inner join claim_details cr on (cr.claimnoticeid = re.claimnoticeid) where re.deleted_at is null and cr.deleted_at IS null and re.claimnoticeid = ".$claimnoticeID);

    $ClaimFees = DB::select("select *,ci.currency from claim_fees cf inner join claimant_informations ci on (ci.claimnoticeid = cf.claimnoticeid) where cf.claimnoticeid = ".$claimnoticeID); 


    $dispute_categories = DB::select("SELECT category_name,id,deleted_at FROM dispute_categories WHERE deleted_at IS NULL ORDER BY order_by asc,category_name ASC ");
    $dispute_subcategories = DB::select("SELECT subcategory_name,id,deleted_at FROM dispute_subcategories WHERE deleted_at IS NULL ORDER BY order_by asc, subcategory_name asc");

    // echo json_encode($dispute_subcategories);exit;
    $loan_type  = DB::table('loan_type')->get();

    $disputeCategory  = disputeCategory::all();
    $disputeSubcategory  = disputeSubcategory::all();

    $claimant_type = DB::select("select * from claimant_respondant_type where type = 'claimant'");

    $dispute_subcategories_Edit=DB::select("SELECT dc.subcategory_name,dc.id,dc.deleted_at from dispute_subcategories dc INNER JOIN claimant_informations ci ON(dc.dispute_categories_id=ci.dispute_categories_id) WHERE ci.claimnoticeid =".$claimnoticeID." ORDER BY dc.order_by asc, dc.subcategory_name asc");  

    $amount_relief=DB::select("SELECT total_amount_bank FROM claim_details WHERE deleted_at IS NULL and ClaimNoticeID=".$claimnoticeID);


      //echo json_encode($claimant_type); exit;

    $claimnoticedisputecategories = DB::select("SELECT 
      ci.dispute_categories_id, ci.dispute_subcategories_id, dc.category_name,dcs.subcategory_name FROM claimantnotice cn INNER JOIN claimant_informations ci ON (ci.claimnoticeid = cn.id) INNER JOIN dispute_categories dc ON (dc.id = ci.dispute_categories_id) INNER JOIN dispute_subcategories dcs ON (dcs.id = ci.dispute_subcategories_id) WHERE cn.id = ".$claimnoticeID);


    $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request  WHERE claimnoticeid = ".$claimnoticeID );
    if (count($totalclaimamount) >0 ) {
     $total_amount = str_replace( ',', '', $totalclaimamount[0]->total_amount ) ;
    
   }
   else
   {
    $total_amount =  '0';  
  }

  
    $registrationfees = DB::select("SELECT re.registration_fees as registration_fee FROM registration_fees re
      inner JOIN claimant_informations cl ON(cl.currency=re.currency)
      WHERE  " .$total_amount." between re.claim_amount_from and re.claim_amount_to AND cl.claimnoticeid=".$claimnoticeID);
    

    if (count($registrationfees) ==0)  

    {

       $registrationfees = DB::select("SELECT re.registration_fees as registration_fee FROM registration_fees re
      inner JOIN claimant_informations cl ON(cl.currency=re.currency)
      WHERE  " .$total_amount." >= re.claim_amount_from AND re.claim_amount_to IS NULL and cl.claimnoticeid=".$claimnoticeID);
    }
    

    if (!empty($registrationfees))
    { 

    $payment_service_amount=DB::select("SELECT service1_percentage FROM payment_services_charge WHERE end_date IS null");

    $registration_fees_amt=$registrationfees[0]->registration_fee;
    $service_percentage=($payment_service_amount[0]->service1_percentage)/100;
    $extra_amt= $registration_fees_amt * $service_percentage;

    $total_pay_amt_check=  $registration_fees_amt+ $extra_amt; 


$total_pay=number_format((float)$total_pay_amt_check, 2, '.', ''); 
// print_r($total_pay);exit;
    $checking=is_float($total_pay_amt_check);
     $total_pay_amt=str_replace(".", "", $total_pay);

  }
// echo $total_pay_amt;exit;

  
 // echo json_encode($registrationfees);exit;

 //echo json_encode($registrationfees); exit;

 return view('claimnotice.create', compact('getloan','claimantinformations','claimanttype','respondantinformations','ClaimDetails','disputeCategory','disputeSubcategory','dispute_categories','dispute_subcategories','ReliefRequests','ClaimFees','claimant_type','respondant_type','loan_type','claimnoticedisputecategories','totalclaimamount', 'registrationfees','claimandrelief','getclaim_details','claimregister','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','amount_relief','other_document_counter','bank_account_counter','dispute_subcategories_Edit','total_pay_amt','extra_amt','total_pay_amt_check'));                      
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $total_pay_amt='';
    $extra_amt='';
    $total_pay_amt_check='';
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login'); 
      }
      $claimnotices = DatabaseHelper::GetClaimNoticeShow($id); 
    



   

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

  



      $claimantinformations = DatabaseHelper::getclaimantinformationsall($id); 

      $respondantinformations = DatabaseHelper::getRespondantDetails($id);  

      $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);


      

      $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);



      $claimant_information =DatabaseHelper::GetClaimantInformationsshow($id);  

      $respondantdetails =   DatabaseHelper::getRespondantDetails($id);

      $ClaimNoticeStage = DB::select("select * from claimantnotice_stage where claimnoticeid=".$id);


      $claimandrelief = DatabaseHelper::getclaimandrelief($id);
      $getclaim_details = DatabaseHelper::getclaim_details($id);

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
      $arbitratorlist = ArbitrationMaster::all();
      $dispute_categories = DisputeCategory::all();
      $dispute_subcategories = DisputeSubcategory::all(); 

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

      $claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );

      $counter_claim_list=DatabaseHelper::counter_claim_list($id);





      return view('claimnotice.show', compact('claimant_dispute','claimant_information','respondantdetails','claimnotices','dispute_categories','dispute_subcategories','ClaimNoticeStatus','claimandrelief','getclaim_details','respondantinformations','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend','total_pay_amt','extra_amt','total_pay_amt_check'));
    }
public function restore_show($id)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null; 
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $claimnotices = DatabaseHelper::GetClaimNoticeShow($id);

      $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,ci.company_name,ci.proprietar_name,ci.aadhar_num,ci.auth_name,ci.auth_age,
        ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
        crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
        left join claimant_respondant_type  crt on (crt.id = ci.respondant_type) where ci.deleted_at is null and  ci.claimnoticeid=".$id);  
$respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);
      $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);


      $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);  



      $claimant_information =DatabaseHelper::GetClaimantInformationsshow($id);  

      $respondantdetails =   DatabaseHelper::getRespondantDetails($id);

      $ClaimNoticeStage = DB::select("select * from claimantnotice_stage where claimnoticeid=".$id);


      $claimandrelief = DatabaseHelper::getclaimandrelief($id);
      $getclaim_details = DatabaseHelper::getclaim_details($id);

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
      $arbitratorlist = ArbitrationMaster::all();
      $dispute_categories = DisputeCategory::all();
      $dispute_subcategories = DisputeSubcategory::all(); 

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

      $claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );





      return view('claimnotice.restoreshow', compact('claimant_dispute','claimant_information','respondantdetails','claimnotices','dispute_categories','dispute_subcategories','ClaimNoticeStatus','claimandrelief','getclaim_details','respondantinformations','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','respondent_amend','respondent_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

      $ClaimNoticeID =  $id;
      Session(['ClaimNoticeID' => $ClaimNoticeID]);
      return Redirect::to('claimnotice/create');


      // $claimant_type = DB::select("select * from claimant_respondant_type where type = 'claimant'");

      // $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code, FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");
      
      // $respondant_type = DB::select("select * from claimant_respondant_type where type = 'respondant'");

      // $claimantinformations = DB::select("select ci.claimant_type,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation, ci.id,ci.name,ci.address,ci.country,ci.state,ci.city,ci.age,dis.dispute_category_Code,
      //   ci.zipcode,ci.daytimetelephone,ci.email,ci.dispute_categories_id,ci.dispute_subcategories_id,
      //   dis.category_name,diss.subcategory_name,ci.claimnoticeid,crt.claimant_respondant_type_name,ci.currency from claimant_informations ci
      //   left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
      //   left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)
      //   left join claimant_respondant_type  crt on (crt.id = ci.claimant_type) 
      //   where ci.claimnoticeid = ".$id );

      // $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,
      //   ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
      //   crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
      //   left join claimant_respondant_type  crt on (crt.id = ci.respondant_type) where ci.claimnoticeid=".$id);

      // $ClaimDetails = DB::select("select percentage_interest ,total_amount ,Applicants ,
      //   cd.total_outstanding_amount ,cd.id,cd.account_name,cd.loan_type_id,cd.claim_interest,cd.claimamountwithinterest,cd.date_of_warranty_end,
      //   cd.loanaccountno, cd.rate_penalinterest,cd.sequirity,cd.claim_details_Remarks, cd.dateofrevival,cd.NPADate,cd.loan_taken_date,cd.sequirity,cd.type_account,cd.commercial_monthly, cd.name_of_the_branch,cd.date_of_account_opened,cd.name_of_the_registered_representative, ci.currency,dis.category_name,diss.subcategory_name, dis.id as dispute_catagory_id,diss.id as dispute_subcategory_id from claim_details cd left join dispute_categories dis on (dis.id = cd.dispute_categories_id) left join dispute_subcategories diss on (diss.id = cd.dispute_subcategories_id) inner join claimant_informations ci on (ci.claimnoticeid = cd.claimnoticeid)  where cd.claimnoticeid =".$id); 



      // $ReliefRequests = DB::select("select * from relief_request where claimnoticeid = ".$id);
      // $ClaimFees = DB::select("select * from claim_fees where claimnoticeid = ".$id);
      
      // $dispute_categories = DB::table('dispute_categories')->distinct()->get();


      // $dispute_subcategories = DB::table('dispute_subcategories')->get();
      // $loan_type  = DB::table('loan_type')->get();
      // $disputeCategory  = disputeCategory::all();
      // $disputeSubcategory  = disputeSubcategory::all();
      // $claimandrelief = DatabaseHelper::getclaimandrelief($id);
      // $getclaim_details = DatabaseHelper::getclaim_details($id);

      // $claimnoticedisputecategories = DB::select("SELECT distinct 
      //   ci.dispute_categories_id, ci.dispute_subcategories_id, dc.category_name,dcs.subcategory_name FROM claimantnotice cn INNER JOIN claimant_informations ci ON (ci.claimnoticeid = cn.id) INNER JOIN dispute_categories dc ON (dc.id = ci.dispute_categories_id) INNER JOIN dispute_subcategories dcs ON (dcs.id = ci.dispute_subcategories_id) WHERE cn.id = ".$id);


      // $ClaimAmount = DB::select("SELECT claimamount AS total_amount FROM claim_details  WHERE claimnoticeid = ".$id); 

      // $totalclaimamount = DB::select("SELECT SUM(total_amount) AS total_amount FROM claim_details  WHERE claimnoticeid = ".$id); 

      // $registrationfees = DB::select("SELECT registration_fees AS registration_fee FROM registration_fees");

      // return view('claimnotice.create', compact('claimantinformations','claimanttype','respondantinformations','ClaimDetails','disputeCategory','disputeSubcategory','dispute_categories','dispute_subcategories','ReliefRequests','ClaimFees','claimant_type','respondant_type','loan_type','claimnoticedisputecategories','totalclaimamount','registrationfees','claimandrelief','getclaim_details'));                            
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
    Log::error('[Method => ClaimNoticeController => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');
 

  }
  catch(\Exception $exc){

    $documentDirectory='';    
    Log::error('[Method => ClaimNoticeController => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

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

  $this->storeDocument($folderName, $documentDirectory,$ClaimNoticeID,'Claimant ClaimNotice Amend','0','CLAIMANT_AUTHORIZED');
  $alfresco_update = DB::table('alfresco_log')
          ->where(['id'=>$alfresco_id])
          ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);
      return redirect()->route('claimnotice.index')
    ->with('success','Amend Completed Successfully');
}
    else
  {
   return redirect()->route('claimnotice.index')
   ->with('success','Document Upload Failed');

 } 

                                 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    /// echo $id; exit;

     $ClaimNotice = DB::table('claimantnotice')
              ->where('id', $id)
              ->update(['del_status' => 1]);



      
      ///$ClaimNotice = ClaimNotice::find($id);

      //echo json_encode($ClaimNotice);exit;
      if ($ClaimNotice == 1) {
       //$ClaimNotice->delete();
       return redirect()->route('claimnotice.index')
       ->with('success','ClaimNotice Deleted Successfully.');
     }
     else
     {
      return redirect()->route('claimnotice.index')
      ->with('success','Some Referece Found');
    }

  }
  public function getclaimdetailsDocuments($id) 
{
  
  $alfrescoURL = env('DOCUMENT_API').'/node/content/';
  $alfrescoTicket = '?a=true&alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
  
  $document = DatabaseHelper::getclaimdetailsDocuments($id);

  $documentName = $document[0]->document_name;
  $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;

   


  
  
  return redirect($documentUrl);  
}

// public function download_templates($id)
// {
// $alfrescoURL = env('DOCUMENT_API').'/node/content/';
// $alfrescoTicket = 'content?a=true?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
// $document =DB::select("select * From template_libary  where id='".$id."' ");
// $downloadURL = $alfrescoURL.'workspace/SpacesStore'.'/'.$document[0]->alfersco_document_name.'?a=true&alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();

// return redirect($downloadURL);
// }

  public function store(Request $request)
  {

       // $files = $request->file('attachment[]');
       // echo json_encode($files); exit;

       // if($request->hasFile('file'))
       //  {

       //      foreach ($files as $file) {
       //          $file->store('vendor/');
       //      }
       //  }
   $table = DB::table('claimantnotice')
   ->where('id' , $request->claimnoticeid)
   ->update(['claimnoticestatus' => 'Payment Completed, Allocate Arbitrator']);
   $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
   $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
   $ClaimantNoticeStatus->claimantnoticestatus = 'Payment Completed, Allocate Arbitrator';
   $ClaimantNoticeStatus->userid = Auth::user()->id; 
   $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
   $ClaimantNoticeStatus->created_id = Auth::user()->id;        
   $ClaimantNoticeStatus->save();
   
   return redirect()->route('claimnotice.index')
   ->with('success','Payment Completed Successfully. Please Wait for the Arbitrator Allocation for this Claim Notice');
 }

 public function getClaimNoticeDocumentDocuments($id)
 {
  $alfrescoURL = env('DOCUMENT_API').'/node/content/';
  $alfrescoTicket = '?a=true&?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
  $document = DatabaseHelper::getLeaveDocumentsByDocumentType($id, 'GPA');

  $documentName = $document[0]->document_name;
  $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;
  
  return redirect($documentUrl); 
}
public function trash_restore($id){ 
  $table = DB::table('claimantnotice')
->where('id' , $id)
->update(['del_status' =>'0']);
return redirect()->route('claimnotice.trash')
->with('success','Claim Notice Restored Successfully');
}

public function payadminstrativefees(Request $request) 
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

 DB::table('claimnotice_invoices')
->where([['claimnoticeid' , $claimnoticeid],['invoice_type', 'Administration']])
->update(['platform_fee' => $request->extra_amt, 'transaction_id' => $payment_id]);

// DB::table("UPDATE claimnotice_invoices 
// SET 
//     platform_fee =$request->extra_amt and transaction_id= $payment_id
// WHERE
   
//      claimnoticeid = $claimnoticeid and 
//     invoice_type = 'Administration'");


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

 

$ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
$ClaimantNoticeStatus->claimantnoticeid = $claimnoticeid;
$ClaimantNoticeStatus->claimantnoticestatus = 'Payment Completed, Allocate Arbitrator';
$ClaimantNoticeStatus->userid = Auth::user()->id; 
$ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
$ClaimantNoticeStatus->created_id = Auth::user()->id;        
$ClaimantNoticeStatus->save();

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
Mail::send('emails.claimantadminreceipt', $data, function($message) use ($claimantemail,$data,$data1){
            // echo ($claimantemail);exit;
 $message->to($claimantemail)
 ->subject('Electronic Arbitration System (EAS)- Claim Notice  ( No:'.$data1['claimnoticeno'].')-  Administration and Arbitration fees Payment Receipt');
});


return redirect()->route('claimnotice.index')
->with('success','Payment Completed Successfully. Please Wait for the Arbitrator Allocation for this Claim Notice');

 
}
private function storeDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
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
}