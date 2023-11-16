<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Charts;
use DB;
use Carbon;
use App\models\DisputeSubcategory;
use App\models\DisputeCategory;
use App\models\notifications;
use App\models\RespondantInformation;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyFirstNotification;
use App\models\ClaimantRegister;
use Notification;
use App\DatabaseHelper;
use Auth;


class HomeController extends Controller
{
 use Notifiable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
// echo("demo");exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ($user_id==null) {
        return view('auth.login');
      }
      else
      {

          $redirect = request()->i;
       $request = request();

      // echo json_encode($request) ; exit;
        echo $request->key; 

        // echo json_encode(DB::select("select * from   notifications 
        //  where latest=1 and  notifiable_id = ".auth()->user()->id)); exit;
        $Notification = DatabaseHelper::getNotificationByUserBylatest(auth()->user()->id);

        $NotificationCount = DatabaseHelper::getNotificationCountByUser(auth()->user()->id);

        $total_claim_counts = DB::select("select count(*) totalclaimcount from claimantnotice");

        $total_Draft_count = DB::select("select count(*) Draft from claimantnotice where claimnoticestatus ='New Claim'");

        $total_Send_count = DB::select("select count(*) Send from claimantnotice where claimnoticestatus ='New Claim Created'");

        $total_Await_count = DB::select("select count(*) Await from claimantnotice where claimnoticestatus ='Respondent Access Provided Waiting for the Acceptance'");

        $total_Closed_count = DB::select("select count(*) Closed from claimantnotice where claimnoticestatus ='Arbitrator Approved and Pleadings Initiated'");

        $total_Claim_petition_count = DB::select("select count(*) Closed from claimantnotice where claimnoticestatus !='Arbitrator Approved and Pleadings Initiated'");

        $total_Filed_count = DB::select("select count(*) Filed from claimantnotice where claimnoticestatus ='Respondent Access Provided Waiting for the Acceptance'");

        $total_Pending_count = DB::select("select count(*) Pending from claimantnotice where claimnoticestatus !='Disposed'");

        $total_Disposed_count = DB::select("select count(*) Disposed from claimantnotice where claimnoticestatus ='Disposed'");

        $claimnotice = DB::select("select sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,ci.organization_details,ci.poa_holder,
        ci.dispute_categories_id,ci.dispute_subcategories_id,dc.category_name,dcp.subcategory_name
        from claimantnotice sm
        left join claim_fees cf on (cf.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null and cd.deleted_at IS NULL )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)  WHERE  sm.del_status='0' and  sm.userid = ".Auth::user()->id. " order by sm.id desc");

        $respondentcount = count($claimnotice);
 
       
         $claimnotice_centre = DB::select("select distinct sm.id as claimid,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id) where sm.no_email='0'"); 
          $total_claim_count = count($claimnotice_centre);
         $payadministration_fees = DB::select("select count(*) total_count_fees from claimantnotice where claimnoticestatus = 'Payment Initiated Waiting for The Payment' and userid = ".auth()->user()->id);

        $claimantRecoveryAmount = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount   from claimantnotice cn  inner join claim_details cd on (cd.claimnoticeid = cn.id)
          where cn.userid = ".auth()->user()->id);
        $allocateArbitratorcount = DB::select("select count(*) allocatedarbitrator from claimantnotice cm
          inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid =cm.id ) where cm.userid = ".auth()->user()->id);

         $claimpetition = DB::select("select distinct sm.id as claimid,sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,ci.organization_details,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,isstageinitiated,pet.arbitration_petionno, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        inner join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
        where sm.userid= ".Auth::user()->id. " order by sm.id desc");
         $claimantDashboardClaimpetioncount = count($claimpetition);

      $resondent_claimnotice = DB::select("select distinct sm.id as claimid, sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name,cr.username,cr.phone,rp.firstname,rp.user_id as respondant_id,
        dcp.id as dispute_categories_id,dc.id as dispute_subcategories_id,dc.category_name,dcp.subcategory_name,rp.auth_name,rp.poa_holder,rp.firstname,rp.lastname,rp.address,rp.age,rp.auth_age from claimantnotice sm
        left join claimantregister cr on (cr.user_id =  sm.userid)
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        INNER JOIN claimant_informations ci ON (ci.claimnoticeid = sm.id) 
        inner join dispute_categories dc ON (dc.id = ci.dispute_categories_id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        left join respondantdetails rp on (rp.claimnoticeid = sm.id)
        where rp.user_id =  ". Auth::user()->id);
       $counterclaimbyrespodent = count($resondent_claimnotice);
        // $claimantDashboardClaimpetioncount =DB::select("select count(*) claimantDashboardClaimpetion from claimantnotice where isstageinitiated='Y' and userid = ".auth()->user()->id);


        $claimantcurrentyearrecovery = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount from claimantnotice cn inner join claim_details cd on (cd.claimnoticeid = cn.id)
         where userid = ".auth()->user()->id." and YEAR(cd.created_at) =".date("Y"))  ;        

        $TotalAmountRecovery = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount from claimantnotice cn inner join claim_details cd on (cd.claimnoticeid = cn.id)");

        $CurrentMonthTotalAmountRecovery = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount from claimantnotice cn inner join claim_details cd on (cd.claimnoticeid = cn.id) where YEAR(cd.created_at) =".date("Y"));
        $claimpetion_repondent = DB::select("select distinct sm.claimnoticeno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s')  created_at,cr.email,cf.claim_amount,sm.id,sm.userid,cr.organization_name, (cr.firstname + cr.lastname) as name,cr.phone,rp.user_id as respondant_id,rp.poa_holder,rp.auth_name,rp.poa_holder,rp.firstname,rp.lastname,rp.address,
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
    where rp.user_id =  ". Auth::user()->id);

         $AllocatedArbitratorCount = count($claimpetion_repondent);

        $claimpetition_arb = DB::select("select distinct sm.claimnoticeno,cpa.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
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

      $totalclaimbyarbitrator = count($claimpetition_arb);

      $claimpetition_arb_ongoing = DB::select("select distinct sm.claimnoticeno,cpa.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )

        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
         left join claimnotice_petion_arbitrationno cpa on (cpa.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        where sm.claimnoticestatus!='Disposed' and cac.arbitrator_id= ".Auth::user()->id. " order by sm.id desc");

       $ongoingarbitration = count($claimpetition_arb_ongoing);

        $ClosedClaimsCountByArbitrator = DB::select("select count(*) closedclaims from claimantnotice cn
          inner join claimant_arbitrator_configuration cbc on cbc.claimnoticeid = cn.id
          where cn.claimnoticestatus='Disposed' and cbc.arbitrator_id = ".auth()->user()->id);

        $ArbitratorHelpedRecoverAmount = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount from claimantnotice cn 
          inner join claim_details cd on (cd.claimnoticeid = cn.id)
          inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = cn.id) where cac.arbitrator_id = ".auth()->user()->id);

        $ArbitratorHelpedCurrentRecoverAmount = DB::select("select sum(Total_Outstanding_amount) Total_Outstanding_amount from claimantnotice cn 
          inner join claim_details cd on (cd.claimnoticeid = cn.id)
          inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = cn.id) where cac.arbitrator_id = ".auth()->user()->id." and YEAR(cd.created_at) =".date("Y"));

        $RespondentAllocatedArbitrator = DB::select("select count(*) allocatedarbitrator from claimantnotice cn
          inner join respondantdetails re on re.claimnoticeid = cn.id
          inner join claimant_arbitrator_configuration cac on cac.claimnoticeid = cn.id where  re.user_id = ".auth()->user()->id);

        

       

       

        return view('home',compact('respondentcount', 'allocateArbitratorcount','claimantDashboardClaimpetioncount','claimantRecoveryAmount','claimantcurrentyearrecovery','TotalAmountRecovery','CurrentMonthTotalAmountRecovery','AllocatedArbitratorCount','ClosedClaimsCountByArbitrator','ArbitratorHelpedRecoverAmount','ArbitratorHelpedCurrentRecoverAmount','RespondentAllocatedArbitrator','Notification','NotificationCount','total_claim_count','payadministration_fees','ongoingarbitration','totalclaimbyarbitrator','counterclaimbyrespodent','total_claim_counts','total_Draft_count','total_Send_count','total_Await_count','total_Closed_count','total_Claim_petition_count','total_Filed_count','total_Pending_count','total_Disposed_count')); 
      }
    }

    public function doLogout()
    {
    Auth::logout(); // log the user out of our application
    return Redirect::to('login'); // redirect the user to the login screen
  }

  public function getDisputeList(Request $request, $id = null)
  {
    // $disputeSubCategory = DB::table('dispute_subcategories')
    // ->where('dispute_categories_id', $request->dispute_categories_id)
   
    // ->pluck('subcategory_name','id');

     $disputeSubCategory = DB::select("SELECT subcategory_name,id FROM dispute_subcategories WHERE dispute_categories_id =".$request->dispute_categories_id." and deleted_at IS NULL ORDER BY order_by asc, subcategory_name asc");
     

    return response()->json($disputeSubCategory);
  }

  public function putDisputeList(Request $request, $id)
  {
    $disputeSubCategory = DB::table('dispute_subcategories')
    ->where('dispute_categories_id', $request->dispute_categories_id)
    ->pluck('subcategory_name','id');
    return response()->json($disputeSubCategory);  
  }


  public function sendNotification()
  {
    $user = User::first();
    $details = [
      'greeting' => 'Hello ',
      'body' => 'This is my first notification from online Arbitration',         
      'actionText' => 'View My Site',
      'actionURL' => route('claimantsnoticelist.index'),            
    ];
    $rows = $user->unreadNotifications;
    $user->notify(new MyFirstNotification($details));            
  }     
}
