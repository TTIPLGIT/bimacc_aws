<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use DB;


class MiscounterController  extends Controller
{
    public function index()
    {
         $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login'); 
      }
      $claimant_type = DB::select("SELECT claimant_respondant_type_name,id FROM claimant_respondant_type WHERE TYPE='respondant' order by claimant_respondant_type_name asc ");
      

      
    	
    	
      $dispute_categories = DB::select("SELECT category_name,id,deleted_at FROM dispute_categories WHERE deleted_at IS NULL ORDER BY order_by asc,category_name ASC ");
    	return view('mis_counter.index', compact('dispute_categories','claimant_type'));

    }
public function store(Request $request)
    {
        
        $from_date=$request->from_date;
        $from_date1=date('Y-m-d', strtotime($from_date));
      // echo json_encode($from_date1);exit;
        $received_date=$request->received_date;
         $received_date1=date('Y-m-d', strtotime($received_date));
         $claimant_type=$request->claimant_type;
          $dispute_categories_id=$request->dispute_categories_id;

if($claimant_type=='')
  {
        
if($dispute_categories_id =='2'){
          $claimlist = DB::select("sELECT  cs.claimnoticeno,ba.id,ba.loan_acc_bank,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,ba.loan_acc_bank,ba.sanction_ammount,ba.date_of_application_bank,ba.date_of_sanction_bank,st.security_type,st.mortgage_property,st.hypo_property,st.mortgage_value_bank,st.hypo_value,st.mortgage_schedule,st.hypo_schedule,st.guarntee_name,st.hypo_name,st.mortgage_name,st.mortgage_date,st.hypo_date,st.guarntor_agreement,st.hypo_engine,st.hypo_chassis,rd.renewal_date,rv.revival_date,od.other_document,ln.legal_notice,ba.date_of_dafault,ba.npa_date_bank,ba.amount_as_account,ba.interest_bank,ba.penel_interest_bank,ba.other_charges_bank,ba.outstanding_amount,ba.outstanding_amount,ba.amount_as_date,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,(SELECT DISTINCT aa.arbitrator_fees FROM arbitrator_allocation_fees aa
 inner JOIN claimant_informations cl ON(cl.currency=aa.currency)
    where rr.damage_with_interest between aa.claim_amount_form and aa.claim_amount_to and cl.claimnoticeid=cs.id) AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 left JOIN banking_account_detail ba on(cs.id=ba.claim_notice_id)
 left JOIN security_type st on(st.claim_id=ba.id)
left JOIN renewal_date rd on(rd.claim_id=ba.id)
left JOIN revival_date rv on(rv.claim_id=ba.id)
left JOIN other_document od on(od.claim_id=ba.id)
left JOIN legal_notice ln on(ln.claim_id=ba.id)
left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)
left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)
left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and ba.is_respondant is not null and rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(red.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(red.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
        }
  elseif($dispute_categories_id =='4'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees from claimantnotice cs
 left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)
left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
inner JOIN contract_relief cor on(cor.relief_id=rr.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='10'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*,fcm.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
inner JOIN family_claim cor on(cor.claim_id=cdd.id)
    inner JOIN family_claim_movable fcm ON(fcm.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='11'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)

   inner JOIN insurance_claim cor on(cor.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='13'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)

    inner JOIN realestate_claim cor on(cor.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  else{
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 
left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and  rr.is_respondant is not null and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }

 } 
 else
 {
   if($dispute_categories_id =='2'){
  $claimlist = DB::select("sELECT  cs.claimnoticeno,ba.id,ba.loan_acc_bank,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,ba.loan_acc_bank,ba.sanction_ammount,ba.date_of_application_bank,ba.date_of_sanction_bank,st.security_type,st.mortgage_property,st.hypo_property,st.mortgage_value_bank,st.hypo_value,st.mortgage_schedule,st.hypo_schedule,st.guarntee_name,st.hypo_name,st.mortgage_name,st.mortgage_date,st.hypo_date,st.guarntor_agreement,st.hypo_engine,st.hypo_chassis,rd.renewal_date,rv.revival_date,od.other_document,ln.legal_notice,ba.date_of_dafault,ba.npa_date_bank,ba.amount_as_account,ba.interest_bank,ba.penel_interest_bank,ba.other_charges_bank,ba.outstanding_amount,ba.outstanding_amount,ba.amount_as_date,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 left JOIN banking_account_detail ba on(cs.id=ba.claim_notice_id)
 left JOIN security_type st on(st.claim_id=ba.id)
left JOIN renewal_date rd on(rd.claim_id=ba.id)
left JOIN revival_date rv on(rv.claim_id=ba.id)
left JOIN other_document od on(od.claim_id=ba.id)
left JOIN legal_notice ln on(ln.claim_id=ba.id)
left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)
left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and ba.is_respondant is not null and rr.is_respondant is not null and rdd.respondant_type =".$claimant_type." and  rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."' ");
}
elseif($dispute_categories_id =='4'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees from claimantnotice cs
 left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)
left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
inner JOIN contract_relief cor on(cor.relief_id=rr.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdd.respondant_type =".$claimant_type." and rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='10'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*,fcm.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
inner JOIN family_claim cor on(cor.claim_id=cdd.id)
    inner JOIN family_claim_movable fcm ON(fcm.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdd.respondant_type =".$claimant_type." and rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='11'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)

   inner JOIN insurance_claim cor on(cor.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdd.respondant_type =".$claimant_type." and rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
  elseif($dispute_categories_id =='13'){
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*,cor.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 

left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)

left JOIN relief_request rr on(rr.claimnoticeid=cs.id)

    inner JOIN realestate_claim cor on(cor.claim_id=cdd.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and rr.is_respondant is not null and  rdd.respondant_type =".$claimant_type." and rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }
else{
    $claimlist=DB::select("sELECT distinct cdd.*,rr.*, cs.claimnoticeno,cs.claimnoticestatus,cs.id,dc.category_name,dcc.subcategory_name,cdd.total_amount_bank,rr.rate_of_interest,rr.amount_of_debt,rr.damages_rs,rr.rate_of_penal_interest,rf.claim_amount_purpose,rdd.firstname,red.respondent_decision,cai.arbitration_petionno,rf.arbitrtor_fee  AS arbitrator_fees,rr.damage_with_interest,
        rf.admin_fee  AS adminstration_fees
 from claimantnotice cs
 
left JOIN claim_details cdd on(cdd.claimnoticeid=cs.id)
left JOIN respondentfees cf on(cf.claimnoticeid=cs.id)
left JOIN relief_request rr on(rr.claimnoticeid=cs.id)
left JOIN respondantdetails rdd on(rdd.claimnoticeid=cs.id)
left JOIN respondents_decision red on(red.claim_notice_id=cs.id)

left JOIN repondent_dispute_information rdi on(rdi.claimnoticeid=cs.id)
left JOIN claimnotice_petion_arbitrationno cai on(cai.claimnoticeid=cs.id)
INNER JOIN dispute_categories dc on(dc.id=rdi.dispute_categories_id)
left join respondentfees rf on (rf.claimnoticeid = cdd.claimnoticeid AND rf.admin_fee IS NOT null)
INNER JOIN dispute_subcategories dcc on(dcc.id=rdi.dispute_subcategories_id) where cdd.is_respondant is not null and  rr.is_respondant is not null and  rdd.respondant_type =".$claimant_type." and rdi.dispute_categories_id =".$dispute_categories_id." and DATE_FORMAT(cs.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cs.created_at, '%Y-%m-%d')   <= '".$received_date1."'
      ");
  }

}


          return view('mis_counter.list', compact('claimlist','dispute_categories_id'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
