<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\DatabaseHelper;
use App\Http\Controllers\Controller;
use App\models\ClaimantRegister;

class NotificationsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
          $table = DB::table('notifications')
        ->update(['latest' => 0]);

        $rows = DatabaseHelper::getNotificationByUser(auth()->user()->id);
        return view('notifications.index', compact('rows'));
    }

    public function read($notificationId)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
        $notification = DatabaseHelper::getNotificationById($notificationId);
        $objMessage = json_decode($notification[0]->data, TRUE);


        $table = DB::table('notifications')
        ->where('id' , $notificationId)
        ->update(['latest' => 0]);
        return redirect()->route('home');
    }


      public function reading($notificationId,$id)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
        $notification = DatabaseHelper::getNotificationById($notificationId);
       
        foreach ($notification as $key => $notifications) {
           $type = $notifications->type;  # code...
        }
        
        $table = DB::table('notifications')
        ->where('id' , $notificationId)
        ->update(['latest' => 0]);

        if ($type=='Registration') {

              $claimantslist = DB::select("select * from claimantregister where id = ".$id);
              return view('notifications.registrationnotification', compact('claimantslist')); 
        }
        else if($type='ClaimNotice')
        {
           // echo "ClaimNotice"; exit;

          $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);
          $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
          $claimandrelief = DatabaseHelper::getclaimandrelief($id);
          $getclaim_details = DatabaseHelper::getclaim_details($id);
          $respondantdetails = DatabaseHelper::getRespondantDetails($id);
          $claim_details = DatabaseHelper::getClaimDetails($id);
          $claim_fees = DatabaseHelper::getClaimfeesDetails($id);
          $relief_request = DatabaseHelper::getReliefRequest($id);
          $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);
          $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);
          $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id); 

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


          $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");
      
      $dispute_subcategories = DB::table('dispute_subcategories')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
          
     $claimant_information = DatabaseHelper::getclaimantinformationsall($id); 
          $ClaimNoticeStatusCount = count($ClaimNoticeStatus);
          $claimantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.name,ci.address,ci.country,ci.state,ci.city,ci.age,dis.dispute_category_Code,ci.company_name,ci.dept_name,ci.govt_name,ci.others,
        ci.company_individual,ci.zipcode,ci.daytimetelephone,ci.email,crt.claimant_respondant_type_name as claimant_type,ci.dispute_categories_id,ci.dispute_subcategories_id,ci.aadhar_num,cnd.id AS document_id,cni.id AS document_id_idproof,cni.document_name AS claimant_IDproof,cnd.document_name,cnd.document_type,
        dis.category_name,diss.subcategory_name,ci.claimnoticeid,ci.currency from claimant_informations ci
        left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
        left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)
        left join claimant_respondant_type  crt on (crt.id = ci.claimant_type) 
        LEFT join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA')
    LEFT join claimnoticedocumentdetails cni on (cni.claimnoticeid = ci.claimnoticeid and cni.document_type='IDPROOF')
        where ci.deleted_at is null and ci.claimnoticeid = ".$id ); 
          $claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );

          $counter_claim_list=DatabaseHelper::counter_claim_list($id);
          $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);

     // $arbitratorlist = ArbitrationMaster::all();
     // $dispute_categories = DisputeCategory::all();
     // $dispute_subcategories = DisputeSubcategory::all(); 

     return view('notifications.claimnotice', compact('claimant_dispute','claimant_information','claimantinformations','respondantdetails','claim_details','relief_request','claim_fees','claimnotices','ClaimNoticeStatus','claimandrelief','dispute_subcategories','dispute_categories','claimanttype','claimant_information','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'));
        }
        // return redirect()->route('home');
    }

    /**
     * @param  int  $id  Notification ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
        $notification = Auth::user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return redirect($notification->data['actionURL']);
        }
    }


    

    public function delete($id) {
        $user = Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }

}
