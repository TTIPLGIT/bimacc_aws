<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ClaimDetails;
use App\models\ReliefRequest;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;

use App\models\LoanBank;

use DB;
use Auth;
use Role;
use App\models\User;
use App\Http\Controllers\BaseController as BaseController;

class ClaimDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ClaimDetails = ClaimDetails::all();  
        $dispute_categories = DB::select("select dispute_categories.category_name, dispute_subcategories.subcategory_name from dispute_categories
         inner join dispute_subcategories on dispute_categories.id = dispute_subcategories.dispute_categories_id
         ");
        
        $dispute_subcategories = DB::table('dispute_subcategories')->get(); 
        return view('claimdetails.index', compact('ClaimDetails','dispute_categories','dispute_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disputeSubcategory = DisputeCategory::all();
        
        $disputecategory = DisputeSubcategory::all();    

        return view('claimdetails.create', compact('disputeSubcategory','disputecategory'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        // $this->validate($request, [

        //  'loan_taken_date' => 'required',
        //  'NPADate' => 'after:loan_taken_date',
        //  ]);

     $claimnoticeid =(session()->get('ClaimNoticeID'));

        // $percentage_interest = str_replace('%', '', $request->percentage_interest);
        // $rate_penalinterest = str_replace('%', '', $request->rate_penalinterest);
        // $claimdetails = new ClaimDetails();
        // $claimdetails->account_name = "10";
        // $claimdetails->loan_type_id = "10";
        // $claimdetails->loanaccountno ="10";
        //

        // $claimdetails->total_amount = "10";
        // $claimdetails->percentage_interest = "10";
        // $claimdetails->rate_penalinterest = "10";
        // $claimdetails->total_outstanding_amount = "10";
        // $claimdetails->commercial_monthly = "10";
        // $claimdetails->sequirity =  "10";
        // $claimdetails->claim_details_Remarks = "10";
        // // $claimdetails->claimnoticeid = $claimnoticeid;
        // $claimdetails->created_id = Auth::user()->id;        
        // $claimdetails->user_id = Auth::user()->id;


   //  echo "Exit"; exit;
    //  $form_data = array(
    //     'vesselname'        =>  $request->vesselname,
    //     'carriername'        =>  $request->carriername,
    //     'charterparty'        =>  $request->charterparty,
    //     'pnrno'        =>  $request->pnrno,
    //     'cargonature'        =>  $request->cargonature,
    //     'natureofincident'        =>  $request->natureofincident,
    //     'cargoname'        =>  $request->cargoname,
    //     'quantity'        =>  $request->quantity,
    //     'lossdetails'        =>  $request->lossdetails,
    //     'claimamount'        =>  $request->claimamount,
    //     'contractdate'        =>  $request->contractdate,
    //     'bill_of_lading_details_date_no'        =>  $request->bill_of_lading_details_date_no,
    //     'passenger_ticket_booking_no'        =>  $request->passenger_ticket_booking_no,
    //     'passenger_ticket_booking_date'        =>  $request->passenger_ticket_booking_date,
    //     'due_date'        =>  $request->due_date,
    //     'claimnoticeid'        =>  $claimnoticeid,
    //     'noticedate'        =>  $request->noticedate,
    //     //Form 3:
    //     'loan_acc' => $request->loan_acc,
    //     'date_of_application' => $request->date_of_application,
    //     'sanction' => $request->sanction,
    //     'mortgage' => $request->mortgage,
    //     'hypothecation'        =>  $request->hypothecation,
    //     'pledge' => $request->pledge,
    //     'pro_note' => $request->pro_note,
    //     'revival_letter'        =>  $request->revival_letter,
    //     'date_of_demand'        =>  $request->date_of_demand,
    //     'date_of_default'        =>  $request->date_of_default,
    //     'npa_date_bank'        =>  $request->npa_date_bank,
    //     'date_of_breach'        =>  $request->date_of_breach,
    //     'loan_agreement' => $request->loan_agreement,
    //             //form 4
    //     'details_of_goods' => $request->details_of_goods,
    //     'details_of_service' => $request->details_of_service,
    //     'date_of_contract' => $request->date_of_contract,
    //     'date_of_invoice' => $request->date_of_invoice,
    //     'claim_amount'        =>  $request->claim_amount,
    //     'date_of_warranty' => $request->date_of_warranty,
    //     'default_date_of_cause_of_action' => $request->default_date_of_cause_of_action,
    //     'date_of_notice' => $request->date_of_notice,         

    //     //form 5 
    //     'nature_of_breach' => $request->nature_of_breach,
    //     'date_of_demand' => $request->date_of_demand,
    //     //form 6 
    //     'partnership_deed_date' => $request->partnership_deed_date,
    //     'date_of_reconstitution' => $request->date_of_reconstitution,
    //     'date_of_dissolution' => $request->date_of_dissolution,
    //     'date_of_agreement' => $request->date_of_agreement,
    //     'par_dispute_amount' => $request->par_dispute_amount,
    //     //form 7 no need to create
    //     //form8 
    //     'details_of_documents' => $request->details_of_documents,
    //     //form9
    //     'date_of_employment' => $request->date_of_employment,
    //     'date_of_consultancy_contract' => $request->date_of_consultancy_contract,
    //     //form 10 no need to create
    //     //form 11
    //     'claim_value' => $request->claim_value,
    //     'date_of_cause_of_action' => $request->date_of_cause_of_action,

    //     //form 12
    //     'date_of_notification' => $request->date_of_notification,
    //     'date_of_tender' => $request->date_of_tender,
    //     //form 13
    //     'date_of_registration' => $request->date_of_registration,
    //     'date_of_licence'  => $request->date_of_licence,
    //     'earliest_date_of_prior_use' => $request->earliest_date_of_prior_use,
    //     'date_of_breach_or_infringement' => $request->date_of_breach_or_infringement,
    //     //form 14
    //     'policy_details' => $request->policy_details,
    //     'maturity_date' => $request->maturity_date,
    //     'lorry_reciept_date' => $request->lorry_reciept_date,
    //     'warehousing_receipt_date' => $request->warehousing_receipt_date,
    //     //form 15
    //     'contract_details' => $request->contract_details,
    //     //form 17
    //     'details_of_contract' => $request->details_of_contract,
    //     'reason_for_claim'=>$request->reason_for_claim,
    //     //form1
    //     'claim_interest'=>$request->claim_interest,
    //     'claimamountwithinterest'=>$request->claimamountwithinterest,
    //     // family
    //     'nature_of_immovable'=>$request->nature_of_immovable,
    //     'name_of_possessor'=>$request->name_of_possessor,
    //     'name_of_property'=>$request->name_of_property,
    //     'property_description'=>$request->property_description,
    //     'schedule_boundary'=>$request->schedule_boundary,
    //     'nature_and_specific'=>$request->nature_and_specific,
    //     'nature_of_cause_of_action'=>$request->nature_of_cause_of_action,
    //     'average_annnual'=>$request->average_annnual,
    //     'owner_movable'=>$request->owner_movable,
    //     'possessor_movable'=>$request->possessor_movable,


    //     'created_id'        =>  Auth::user()->id,
    //     'user_id'        =>  Auth::user()->id
    // );
//$claimdetails=ClaimDetails::create($form_data);

// try {

     $claimdetails_id = DB::table('claim_details')
     ->insertGetId([
        'vesselname'        =>  $request->vesselname,
        'carriername'        =>  $request->carriername,
        'charterparty'        =>  $request->charterparty,
        'pnrno'        =>  $request->pnrno,
        'cargonature'        =>  $request->cargonature,
        'natureofincident'        =>  $request->natureofincident,
        'cargoname'        =>  $request->cargoname,
        'quantity'        =>  $request->quantity,
        'lossdetails'        =>  $request->lossdetails,
        'claimamount'        =>  intval(str_replace(',', '', $request->claimamount)),
        'contractdate'        =>  $request->contractdate,
        'date_of_breach'        =>  $request->date_of_breach,
        'date_of_demand'        =>  $request->date_of_demand,
        'bill_of_lading_details_date_no'        =>  $request->bill_of_lading_details_date_no,
        'passenger_ticket_booking_no'        =>  $request->passenger_ticket_booking_no,
        'passenger_ticket_booking_date'        =>  $request->passenger_ticket_booking_date,
        'due_date'        =>  $request->due_date,
        'claimnoticeid'        =>  $claimnoticeid,
        'noticedate'        =>  $request->noticedate,
         //'date_of_breach'        =>  $request->date_of_breach,
         //Form 3:

        'total_amount_bank' =>$request->total_amount_bank,


        // // 'loan_acc' => $request->loan_acc,
        // // 'date_of_application' => $request->date_of_application,
        // // 'sanction' => $request->sanction,
        // // 'mortgage' => $request->mortgage,
        // // 'hypothecation'        =>  $request->hypothecation,
        // // 'pledge' => $request->pledge,
        // // 'pro_note' => $request->pro_note,
        // //'revival_letter'        =>  $request->revival_letter,
        // 'date_of_demand'        =>  $request->date_of_demand,
        // 'date_of_default'        =>  $request->date_of_default,
        // 'npa_date_bank'        =>  $request->npa_date,
        
        // 'loan_agreement' => $request->loan_agreement,

         // 'loan_acc' => $request->loan_acc,
         // 'date_of_application' => $request->date_of_application,
         // 'date_of_sanction' => $request->date_of_sanction,
         // 'nature_of_aggrement' => $request->nature_of_aggrement,


         // 'date_of_default'        =>  $request->date_of_default,
         // 'npa_date'        =>  $request->npa_date,
         // 'date_of_breach'        =>  $request->date_of_breach,
         // 'amount_due_per_account'        =>  $request->amount_due_per_account,
         // 'date_of_demand'        =>  $request->date_of_demand,

         // 'rate_of_interest' =>$request->rate_of_interest,
         // 'penel_interest_bank' =>$request->penel_interest_bank,
         // 'due_date'        =>  $request->due_date,

        'other_charges' =>$request->other_charges,
        'total_due_date' =>$request->total_due_date,

                //form 4
        'details_of_goods' => $request->details_of_goods,
        'details_of_service' => $request->details_of_service,
        'date_of_contract' => $request->date_of_contract,
        'date_of_invoice' => $request->date_of_invoice,
        'claim_amount'        =>  $request->claim_amount,
        'date_of_warranty' => $request->date_of_warranty,
        'default_date_of_cause_of_action' => $request->default_date_of_cause_of_action,
        'date_of_notice' => $request->date_of_notice,         

        //form 5 
        'nature_of_breach' => $request->nature_of_breach,
        // 'date_of_demand' => $request->date_of_demand,
        //form 6 
        'partnership_deed_date' => $request->partnership_deed_date,
        'date_of_reconstitution' => $request->date_of_reconstitution,
        'date_of_dissolution' => $request->date_of_dissolution,
        'date_of_agreement' => $request->date_of_agreement,
        'par_dispute_amount' => $request->par_dispute_amount,
        'total_amount_bank' => $request->total_amount_bank,

        //form 7 no need to create
        //form8 
        'details_of_documents' => $request->details_of_documents,
        //form9
        'date_of_employment' => $request->date_of_employment,
        'date_of_consultancy_contract' => $request->date_of_consultancy_contract,
        //form 10 no need to create
        //form 11
        'claim_value' => $request->claim_value,
        'date_of_cause_of_action' => $request->date_of_cause_of_action,

        //form 12
        'date_of_notification' => $request->date_of_notification,
        'date_of_tender' => $request->date_of_tender,
        //form 13
        'date_of_registration' => $request->date_of_registration,
        'date_of_licence'  => $request->date_of_licence,
        'earliest_date_of_prior_use' => $request->earliest_date_of_prior_use,
        'date_of_breach_or_infringement' => $request->date_of_breach_or_infringement,
        //form 14
        'policy_details' => $request->policy_details,
        'maturity_date' => $request->maturity_date,
        'lorry_reciept_date' => $request->lorry_reciept_date,
        'warehousing_receipt_date' => $request->warehousing_receipt_date,
        //form 15
        'contract_details' => $request->contract_details,
        //form 17
        'details_of_contract' => $request->details_of_contract,
        'reason_for_claim'=>$request->reason_for_claim,
        //form1
        'claim_interest'=>$request->claim_interest,
        'claimamountwithinterest'=>$request->claimamountwithinterest,
        // family
        'nature_of_immovable'=>$request->nature_of_immovable,
        'name_of_possessor'=>$request->name_of_possessor,
        'name_of_property'=>$request->name_of_property,
        'property_description'=>$request->property_description,
        'schedule_boundary'=>$request->schedule_boundary,
        'nature_and_specific'=>$request->nature_and_specific,
        'nature_of_cause_of_action'=>$request->nature_of_cause_of_action,
        'average_annnual'=>$request->average_annnual,
        'owner_movable'=>$request->owner_movable,
        'possessor_movable'=>$request->possessor_movable,

        'created_id'        =>  Auth::user()->id,
        'user_id'        =>  Auth::user()->id
    ]);

// }catch(\Exception $exc)
// {
//             return $this->sendLog("Sample", $exc->getCode(), $exc->getMessage(), $exc->getTrace()[0]['line'], $exc->getTrace()[0]['file']);
// }






$immovable_nature = $request->immovable_nature;
$movable_nature = $request->movable_nature;
$immovable_possessor = $request->immovable_possessor;
$immovable_owner = $request->immovable_owner;
$immovable_description = $request->immovable_description;
$immovable_schedule = $request->immovable_schedule;
$immovable_market = $request->immovable_market;
$movable_possessor = $request->movable_possessor;
$movable_owner = $request->movable_owner;
$movable_value = $request->movable_value;


if (!empty($immovable_possessor)) {
 for ($i=0; $i < count($immovable_possessor); $i++) { 

   $family_claim = DB::table('family_claim')
   ->insertGetId([ 
    'immovable_nature' => $immovable_nature[$i],       
    'immovable_possessor' => $immovable_possessor[$i],
    'immovable_owner' =>$immovable_owner[$i],
    'immovable_description' =>$immovable_description[$i],
    'immovable_schedule' =>$immovable_schedule[$i],
    'immovable_market' =>$immovable_market[$i],
    'claim_notice_id' =>session()->get('ClaimNoticeID'),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $loan_acc_bank = $request->loan_acc_bank;
// $date_of_application_bank = $request->date_of_application_bank;
// $date_of_sanction_bank = $request->date_of_sanction_bank;
// $nature_of_aggrement_bank = $request->nature_of_aggrement_bank;
// $date_of_default_bank = $request->date_of_default_bank;
// $npa_date_bank = $request->npa_date_bank;
// $date_of_breach_bank = $request->date_of_breach_bank;
// $amount_due_per_account_bank = $request->amount_due_per_account_bank;
// $date_of_demand_bank = $request->date_of_demand_bank;
// $rate_of_interest_bank = $request->rate_of_interest_bank;
// $penel_interest_bank_bank = $request->penel_interest_bank_bank;
// $due_date_bank = $request->due_date_bank;

// $security_type = $request->security_type;
// $mortgage_value_bank = $request->mortgage_value_bank;
// $mortgage_name = $request->mortgage_name;
// $mortgage_date = $request->mortgage_date;
// $hypo_value = $request->hypo_value;
// $hypo_name = $request->hypo_name;
// $hypo_date = $request->hypo_date;
// $hypo_engine = $request->hypo_engine;
// $hypo_chassis = $request->hypo_chassis;
// $guarntee_name = $request->guarntee_name;
// $guarntor_agreement = $request->guarntor_agreement;
// $others_details = $request->others_details;

// $others_date = $request->others_date;
// $renewal_date = $request->renewal_date;
// $revival_date = $request->revival_date;
// $date_of_dafault = $request->date_of_dafault;
// $legal_notice = $request->legal_notice;
// $other_document = $request->other_document;
// $npa_date = $request->npa_date;
// $amount_as_account = $request->amount_as_account;
// $interest_bank = $request->interest_bank;
// $penel_interest_bank = $request->penel_interest_bank;
// $other_charges_bank = $request->other_charges_bank;
// $amount_as_date = $request->amount_as_date;

// $sanction_ammount = $request->sanction_ammount;
// $mortgage_property = $request->mortgage_property;
// $hypo_property = $request->hypo_property;
// $mortgage_schedule = $request->mortgage_schedule;
// $hypo_schedule = $request->hypo_schedule;

// if (!empty($loan_acc_bank)) {
//  for ($i=0; $i < count($loan_acc_bank); $i++) { 

//    $family_claim = DB::table('banking_account_detail')
//    ->insertGetId([        
//     'loan_acc_bank' =>$loan_acc_bank[$i],
//     'date_of_application_bank' =>$date_of_application_bank[$i],
//     'date_of_sanction_bank' =>$date_of_sanction_bank[$i],
//     'nature_of_aggrement_bank' =>$nature_of_aggrement_bank[$i],
//     'date_of_default_bank' =>$date_of_default_bank[$i],
//     'npa_date_bank' =>$npa_date_bank[$i],
//     'date_of_breach_bank' =>$date_of_breach_bank[$i],
//     'amount_due_per_account_bank' =>$amount_due_per_account_bank[$i],
//     'date_of_demand_bank' =>$date_of_demand_bank[$i],
//     'rate_of_interest_bank' =>$rate_of_interest_bank[$i],
//     'penel_interest_bank_bank' =>$penel_interest_bank_bank[$i],
//     'due_date_bank' =>$due_date_bank[$i],

//     'security_type' =>$security_type[$i],
//     'mortgage_value_bank' =>$mortgage_value_bank[$i],
//     'mortgage_name' =>$mortgage_name[$i],

//     'mortgage_date' =>$mortgage_date[$i],
//     'hypo_value' =>$hypo_value[$i],
//     'hypo_name' =>$hypo_name[$i],
//     'hypo_date' =>$hypo_date[$i],
//     'hypo_engine' =>$hypo_engine[$i],
//     'hypo_chassis' =>$hypo_chassis[$i],
//     'guarntee_name' =>$guarntee_name[$i],
//     'guarntor_agreement' =>$guarntor_agreement[$i],

//     'others_details' =>$others_details[$i],
//     'others_date' =>$others_date[$i],
//     'renewal_date' =>$renewal_date[$i],
//     'revival_date' =>$revival_date[$i],
//     'date_of_dafault' =>$date_of_dafault[$i],
//     'legal_notice' =>$legal_notice[$i],
//     'other_document' =>$other_document[$i],
//     'npa_date' =>$npa_date[$i],
//     'amount_as_account' =>$amount_as_account[$i],
//     'interest_bank' =>$interest_bank[$i],
//     'penel_interest_bank' =>$penel_interest_bank[$i],
//     'other_charges_bank' =>$other_charges_bank[$i],

//     'amount_as_date' =>$amount_as_date[$i],
//     'sanction_ammount' =>$sanction_ammount[$i],
//     'mortgage_property' =>$mortgage_property[$i],
//     'hypo_property' =>$hypo_property[$i],
//     'mortgage_schedule' =>$mortgage_schedule[$i],
//     'hypo_schedule' =>$hypo_schedule[$i],


//     'claim_notice_id' => (session()->get('ClaimNoticeID')),
//     'claim_id' => $claimdetails_id,    
//     'created_id'        =>  Auth::user()->id,

// ]); 
// }
// }





if (!empty($movable_possessor)) {
 for ($i=0; $i < count($movable_possessor); $i++) { 

   $family_claim = DB::table('family_claim_movable')
   ->insertGetId([ 
    'movable_nature' => $movable_nature[$i],       
    'movable_possessor' =>$movable_possessor[$i],
    'movable_owner' =>$movable_owner[$i],
    'movable_value' =>$movable_value[$i],
    'claim_notice_id' =>session()->get('ClaimNoticeID'),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// insurance
$policy_no = $request->policy_no;
$nature_of_cover = $request->nature_of_cover;
$date_insurance = $request->date_insurance;
$policy_value = $request->policy_value;
$policy_maturity_date = $request->policy_maturity_date;
$surrender_value = $request->surrender_value;
$claim_nature = $request->claim_nature;
$claim_value_insurance = $request->claim_value_insurance;
$date_of_claim = $request->date_of_claim;
$date_of_notice_insurance = $request->date_of_notice_insurance;
$date_of_breach_insurance = $request->date_of_breach_insurance;
$claim_amount_insurance = $request->claim_amount_insurance;
$claim_amount_int = $request->claim_amount_int;
$claim_amount_withoutint = $request->claim_amount_withoutint;
$document_no = $request->document_no;
$date_document = $request->date_document;
$freight_charges = $request->freight_charges;
$demurrage_charges = $request->demurrage_charges;
$goods_nature = $request->goods_nature;
$value_of_good = $request->value_of_good;
$loss_nature = $request->loss_nature;
// echo count($policy_no);
 // echo count($claim_amount_withoutint); exit;



if (!empty($policy_no)) {
 for ($i=0; $i < count($policy_no); $i++) { 

   $insurance_claim = DB::table('insurance_claim')
   ->insertGetId([        
    'policy_no' => $policy_no[$i],
    'nature_of_cover' =>$nature_of_cover[$i],
    'date_insurance' =>$date_insurance[$i],
    'policy_value' =>$policy_value[$i],
    'policy_maturity_date' =>$policy_maturity_date[$i],
    'surrender_value' =>$surrender_value[$i],
    'claim_nature' =>$claim_nature[$i],
    'claim_value_insurance' =>$claim_value_insurance[$i],
    'date_of_claim' =>$date_of_claim[$i],
    'date_of_notice_insurance' =>$date_of_notice_insurance[$i],
    'date_of_breach_insurance' =>$date_of_breach_insurance[$i],
    'claim_amount_insurance' =>$claim_amount_insurance[$i],
    'claim_amount_int' =>$claim_amount_int[$i],
    'claim_amount_withoutint' =>$claim_amount_withoutint[$i],
    'document_no' =>$document_no[$i],
    'date_document' =>$date_document[$i],
    'freight_charges' =>$freight_charges[$i],
    'demurrage_charges' =>$demurrage_charges[$i],
    'goods_nature' =>$goods_nature[$i],
    'value_of_good' =>$value_of_good[$i],
    'loss_nature' =>$loss_nature[$i],

    'claim_notice_id' => (session()->get('ClaimNoticeID')),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $document_no = $request->document_no;
// $date_document = $request->date_document;
// $freight_charges = $request->freight_charges;
// $demurrage_charges = $request->demurrage_charges;
// $goods_nature = $request->goods_nature;
// $value_of_good = $request->value_of_good;
// $loss_nature = $request->loss_nature;

// if (!empty($document_no)) {
//     for ($i=0; $i < count($document_no); $i++) { 
//         $insurance_claim_part_2 = DB::table('insurance_claim_part_2')
//         ->insertGetId([        
//             'document_no' =>$document_no[$i],
//             'date_document' =>$date_document[$i],
//             'freight_charges' =>$freight_charges[$i],
//             'demurrage_charges' =>$demurrage_charges[$i],
//             'goods_nature' =>$goods_nature[$i],
//             'value_of_good' =>$value_of_good[$i],
//             'loss_nature' =>$loss_nature[$i],
//             'claim_notice_id' => (session()->get('ClaimNoticeID')),
//             'claim_id' => $claimdetails_id,    
//             'created_id'        =>  Auth::user()->id,
//         ]); 
//     }
// }

$nature_of_contract_real = $request->nature_of_contract_real;
$date_of_cintract_real = $request->date_of_cintract_real;
$annual_value_real = $request->annual_value_real;
$natue_of_immovable_real = $request->natue_of_immovable_real;
$name_of_possessor_real = $request->name_of_possessor_real;
$name_of_owner_real = $request->name_of_owner_real;
$description_real = $request->description_real;
$schedule_real = $request->schedule_real;
$market_value_real = $request->market_value_real;
$mortgage_value = $request->mortgage_value;
$date_of_breach_real = $request->date_of_breach_real;
$date_of_notice_real = $request->date_of_notice_real;

if (!empty($nature_of_contract_real)) 
{
    for ($i=0; $i < count($nature_of_contract_real); $i++) { 
       $realestate_claim = DB::table('realestate_claim')
       ->insertGetId([        
        'nature_of_contract_real' => $nature_of_contract_real[$i],
        'date_of_cintract_real' =>$date_of_cintract_real[$i],
        'annual_value_real' =>$annual_value_real[$i],
        'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
        'name_of_possessor_real' =>$name_of_possessor_real[$i],
        'name_of_owner_real' =>$name_of_owner_real[$i],
        'description_real' =>$description_real[$i],
        'schedule_real' =>$schedule_real[$i],
        'market_value_real' =>$market_value_real[$i],
        'mortgage_value' =>$mortgage_value[$i],
        'date_of_breach_real' =>$date_of_breach_real[$i],
        'date_of_notice_real' =>$date_of_notice_real[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_by'  =>  Auth::user()->id,


    ]); 

   }
}
// if (!empty($natue_of_immovable_real)) {
//    for ($i=0; $i < count($natue_of_immovable_real); $i++) { 

//      $realestate_claim = DB::table('realestate_claim')
//      ->insertGetId([        
//         'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
//         'name_of_possessor_real' =>$name_of_possessor_real[$i],
//         'name_of_owner_real' =>$name_of_owner_real[$i],
//         'description_real' =>$description_real[$i],
//         'schedule_real' =>$schedule_real[$i],
//         'market_value_real' =>$market_value_real[$i],
//         'mortgage_value' =>$mortgage_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
//  }
// }

// echo "sample"; exit;



//End



//2 banking_claim_hypo Header



//End

//3 banking_claim_hypo Header

// if (!empty($pledge_nature)) {
//    for ($i=0; $i < count($pledge_nature); $i++) { 

//     $bank_cliam = DB::table('banking_claim_pledge')
//     ->insertGetId([        
//         'pledge_nature' =>$pledge_nature[$i],
//         'pledge_date' =>$pledge_date[$i],
//         'pledge_date_maturity' =>$pledge_date_maturity[$i],
//         'pledge_value' =>$pledge_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 4 banking_claim_personal Header

if (!empty($personnel_guar_name)) {
 for ($i=0; $i < count($personnel_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_personal')
    ->insertGetId([        
        'personnel_guar_name' =>$personnel_guar_name[$i],
        'personnel_dob' =>$personnel_dob[$i],
        'personnel_father' =>$personnel_father[$i],
        'personnel_adddress' =>$personnel_adddress[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

// 5 banking_claim_corporate Header

if (!empty($company_guar_name)) {
 for ($i=0; $i < count($company_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_corporate')
    ->insertGetId([        
        'company_guar_name' =>$company_guar_name[$i],
        'compnay_cid' =>$compnay_cid[$i],
        'company_address' =>$company_address[$i],
        'company_date' =>$company_date[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End


// 6 banking_claim_mort_details Header

// if (!empty($mortgage_mortgagor)) {
//    for ($i=0; $i < count($mortgage_mortgagor); $i++) { 

//     $bank_cliam = DB::table('banking_claim_mort_details')
//     ->insertGetId([        
//            'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
//         'mortgage_company' =>$mortgage_company[$i],
//         'mortgage_property' =>$mortgage_property[$i],
//         'mortgage_schedule' =>$mortgage_schedule[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 7 banking_claim_hypo_details Header




//End


// 8 banking_claim_pledge_details Header




//End

// 8 banking_claim_pro_details Header

if (!empty($pledgor_name)) {
 for ($i=0; $i < count($pledgor_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_pro_details')
    ->insertGetId([        
        'pro_date' =>$pro_date[$i],
        'revival_letter' =>$revival_letter[$i],
        'document_other' =>$document_other[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


// $bank_cliam_update = DB::table('banking_account_detail')
// ->where(['claim_notice_id'=>(session()->get('ClaimNoticeID'))])
// ->update(['claim_id' => $claimdetails_id]);


//End




// if (!empty($laon_ac_bank)) {
//    for ($i=0; $i < count($laon_ac_bank); $i++) { 

//      $bank_cliam = DB::table('bank_cliam')
//      ->insertGetId([        

//         'date_of_default_bank' =>$date_of_default_bank[$i],
//         'date_of_npa_bank' =>$date_of_npa_bank[$i],
//         'date_of_breach_bank' =>$date_of_breach_bank[$i],
//         'date_of_default_amount_bank' =>$date_of_default_amount_bank[$i],
//         'due_date_bank' =>$due_date_bank[$i],
//         'date_demand_bank' =>$date_demand_bank[$i],

//         'rate_interest_bank' =>$rate_interest_bank[$i],
//         'penal_interest_bank' =>$penal_interest_bank[$i],
//         'other_charges_bank' =>$other_charges_bank[$i],
//         'charges_due_bank' =>$charges_due_bank[$i],
//         'total_amount_bank' =>$total_amount_bank[$i],
//         'date_of_app_lication_bank' =>$date_of_app_lication_bank[$i],
//         'date_of_sanction_bank' =>$date_of_sanction_bank[$i],

//         'nature_of_agreement_bank' =>$nature_of_agreement_bank[$i],
//         'laon_ac_bank' =>$laon_ac_bank[$i],


//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
//  }
// }



return response()->json(['success' => 'Data Added successfully.']);
        // }


        //       


}
public function respondantclaim(Request $request, $id = null)
{

 $claimnoticeid =$request->claimnoticeid;



 $claimdetails_id = DB::table('claim_details')
 ->insertGetId([
    'is_respondant'=>1,
    'vesselname'        =>  $request->vesselname,
    'carriername'        =>  $request->carriername,
    'charterparty'        =>  $request->charterparty,
    'pnrno'        =>  $request->pnrno,
    'cargonature'        =>  $request->cargonature,
    'natureofincident'        =>  $request->natureofincident,
    'cargoname'        =>  $request->cargoname,
    'quantity'        =>  $request->quantity,
    'lossdetails'        =>  $request->lossdetails,
    'claimamount'        =>  $request->claimamount,
    'contractdate'        =>  $request->contractdate,
    'date_of_breach'        =>  $request->date_of_breach,
    'date_of_demand'        =>  $request->date_of_demand,
    'bill_of_lading_details_date_no'        =>  $request->bill_of_lading_details_date_no,
    'passenger_ticket_booking_no'        =>  $request->passenger_ticket_booking_no,
    'passenger_ticket_booking_date'        =>  $request->passenger_ticket_booking_date,
    'due_date'        =>  $request->due_date,
    'claimnoticeid'        =>  $claimnoticeid,
    'noticedate'        =>  $request->noticedate,

    'other_charges' =>$request->other_charges,
    'total_due_date' =>$request->total_due_date,

                //form 4
    'details_of_goods' => $request->details_of_goods,
    'details_of_service' => $request->details_of_service,
    'date_of_contract' => $request->date_of_contract,
    'date_of_invoice' => $request->date_of_invoice,
    'claim_amount'        =>  $request->claim_amount,
    'date_of_warranty' => $request->date_of_warranty,
    'default_date_of_cause_of_action' => $request->default_date_of_cause_of_action,
    'date_of_notice' => $request->date_of_notice,         

        //form 5 
    'nature_of_breach' => $request->nature_of_breach,
        // 'date_of_demand' => $request->date_of_demand,
        //form 6 
    'partnership_deed_date' => $request->partnership_deed_date,
    'date_of_reconstitution' => $request->date_of_reconstitution,
    'date_of_dissolution' => $request->date_of_dissolution,
    'date_of_agreement' => $request->date_of_agreement,
    'par_dispute_amount' => $request->par_dispute_amount,
        //form 7 no need to create
        //form8 
    'details_of_documents' => $request->details_of_documents,
        //form9
    'date_of_employment' => $request->date_of_employment,
    'date_of_consultancy_contract' => $request->date_of_consultancy_contract,
        //form 10 no need to create
        //form 11
    'claim_value' => $request->claim_value,
    'date_of_cause_of_action' => $request->date_of_cause_of_action,

        //form 12
    'date_of_notification' => $request->date_of_notification,
    'date_of_tender' => $request->date_of_tender,
        //form 13
    'date_of_registration' => $request->date_of_registration,
    'date_of_licence'  => $request->date_of_licence,
    'earliest_date_of_prior_use' => $request->earliest_date_of_prior_use,
    'date_of_breach_or_infringement' => $request->date_of_breach_or_infringement,
        //form 14
    'policy_details' => $request->policy_details,
    'maturity_date' => $request->maturity_date,
    'lorry_reciept_date' => $request->lorry_reciept_date,
    'warehousing_receipt_date' => $request->warehousing_receipt_date,
        //form 15
    'contract_details' => $request->contract_details,
        //form 17
    'details_of_contract' => $request->details_of_contract,
    'reason_for_claim'=>$request->reason_for_claim,
        //form1
    'claim_interest'=>$request->claim_interest,
    'claimamountwithinterest'=>$request->claimamountwithinterest,
    'total_amount_bank' => $request->total_amount_bank,
        // family
    'nature_of_immovable'=>$request->nature_of_immovable,
    'name_of_possessor'=>$request->name_of_possessor,
    'name_of_property'=>$request->name_of_property,
    'property_description'=>$request->property_description,
    'schedule_boundary'=>$request->schedule_boundary,
    'nature_and_specific'=>$request->nature_and_specific,
    'nature_of_cause_of_action'=>$request->nature_of_cause_of_action,
    'average_annnual'=>$request->average_annnual,
    'owner_movable'=>$request->owner_movable,
    'possessor_movable'=>$request->possessor_movable,

    'created_id'        =>  Auth::user()->id,
    'user_id'        =>  Auth::user()->id
]);



$immovable_nature = $request->immovable_nature;
$movable_nature = $request->movable_nature;
$immovable_possessor = $request->immovable_possessor;
$immovable_owner = $request->immovable_owner;
$immovable_description = $request->immovable_description;
$immovable_schedule = $request->immovable_schedule;
$immovable_market = $request->immovable_market;
$movable_possessor = $request->movable_possessor;
$movable_owner = $request->movable_owner;
$movable_value = $request->movable_value;


if (!empty($immovable_possessor)) {
 for ($i=0; $i < count($immovable_possessor); $i++) { 

   $family_claim = DB::table('family_claim')
   ->insertGetId([ 
    'immovable_nature' => $immovable_nature[$i],       
    'immovable_possessor' => $immovable_possessor[$i],
    'immovable_owner' =>$immovable_owner[$i],
    'immovable_description' =>$immovable_description[$i],
    'immovable_schedule' =>$immovable_schedule[$i],
    'immovable_market' =>$immovable_market[$i],
    'claim_notice_id' =>$request->claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $loan_acc_bank = $request->loan_acc_bank;
// $date_of_application_bank = $request->date_of_application_bank;
// $date_of_sanction_bank = $request->date_of_sanction_bank;
// $nature_of_aggrement_bank = $request->nature_of_aggrement_bank;
// $date_of_default_bank = $request->date_of_default_bank;
// $npa_date_bank = $request->npa_date_bank;
// $date_of_breach_bank = $request->date_of_breach_bank;
// $amount_due_per_account_bank = $request->amount_due_per_account_bank;
// $date_of_demand_bank = $request->date_of_demand_bank;
// $rate_of_interest_bank = $request->rate_of_interest_bank;
// $penel_interest_bank_bank = $request->penel_interest_bank_bank;
// $due_date_bank = $request->due_date_bank;

// $security_type = $request->security_type;
// $mortgage_value_bank = $request->mortgage_value_bank;
// $mortgage_name = $request->mortgage_name;
// $mortgage_date = $request->mortgage_date;
// $hypo_value = $request->hypo_value;
// $hypo_name = $request->hypo_name;
// $hypo_date = $request->hypo_date;
// $hypo_engine = $request->hypo_engine;
// $hypo_chassis = $request->hypo_chassis;
// $guarntee_name = $request->guarntee_name;
// $guarntor_agreement = $request->guarntor_agreement;
// $others_details = $request->others_details;

// $others_date = $request->others_date;
// $renewal_date = $request->renewal_date;
// $revival_date = $request->revival_date;
// $date_of_dafault = $request->date_of_dafault;
// $legal_notice = $request->legal_notice;
// $other_document = $request->other_document;
// $npa_date = $request->npa_date;
// $amount_as_account = $request->amount_as_account;
// $interest_bank = $request->interest_bank;
// $penel_interest_bank = $request->penel_interest_bank;
// $other_charges_bank = $request->other_charges_bank;
// $amount_as_date = $request->amount_as_date;

// $sanction_ammount = $request->sanction_ammount;
// $mortgage_property = $request->mortgage_property;
// $hypo_property = $request->hypo_property;
// $mortgage_schedule = $request->mortgage_schedule;
// $hypo_schedule = $request->hypo_schedule;



// if (!empty($loan_acc_bank)) {
//  for ($i=0; $i < count($loan_acc_bank); $i++) { 

//    $family_claim = DB::table('banking_account_detail')
//    ->insertGetId([        
//     'loan_acc_bank' =>$loan_acc_bank[$i],
//     'date_of_application_bank' =>$date_of_application_bank[$i],
//     'date_of_sanction_bank' =>$date_of_sanction_bank[$i],
//     'nature_of_aggrement_bank' =>$nature_of_aggrement_bank[$i],
//     'date_of_default_bank' =>$date_of_default_bank[$i],
//     'npa_date_bank' =>$npa_date_bank[$i],
//     'date_of_breach_bank' =>$date_of_breach_bank[$i],
//     'amount_due_per_account_bank' =>$amount_due_per_account_bank[$i],
//     'date_of_demand_bank' =>$date_of_demand_bank[$i],
//     'rate_of_interest_bank' =>$rate_of_interest_bank[$i],
//     'penel_interest_bank_bank' =>$penel_interest_bank_bank[$i],
//     'due_date_bank' =>$due_date_bank[$i],

//     'security_type' =>$security_type[$i],
//     'mortgage_value_bank' =>$mortgage_value_bank[$i],
//     'mortgage_name' =>$mortgage_name[$i],

//     'mortgage_date' =>$mortgage_date[$i],
//     'hypo_value' =>$hypo_value[$i],
//     'hypo_name' =>$hypo_name[$i],
//     'hypo_date' =>$hypo_date[$i],
//     'hypo_engine' =>$hypo_engine[$i],
//     'hypo_chassis' =>$hypo_chassis[$i],
//     'guarntee_name' =>$guarntee_name[$i],
//     'guarntor_agreement' =>$guarntor_agreement[$i],

//     'others_details' =>$others_details[$i],
//     'others_date' =>$others_date[$i],
//     'renewal_date' =>$renewal_date[$i],
//     'revival_date' =>$revival_date[$i],
//     'date_of_dafault' =>$date_of_dafault[$i],
//     'legal_notice' =>$legal_notice[$i],
//     'other_document' =>$other_document[$i],
//     'npa_date' =>$npa_date[$i],
//     'amount_as_account' =>$amount_as_account[$i],
//     'interest_bank' =>$interest_bank[$i],
//     'penel_interest_bank' =>$penel_interest_bank[$i],
//     'other_charges_bank' =>$other_charges_bank[$i],

//     'amount_as_date' =>$amount_as_date[$i],
//     'sanction_ammount' =>$sanction_ammount[$i],
//     'mortgage_property' =>$mortgage_property[$i],
//     'hypo_property' =>$hypo_property[$i],
//     'mortgage_schedule' =>$mortgage_schedule[$i],
//     'hypo_schedule' =>$hypo_schedule[$i],


//     'claim_notice_id' => $request->claimnoticeid,
//     'claim_id' => $claimdetails_id,    
//     'created_id'        =>  Auth::user()->id,

// ]); 
// }
// }




if (!empty($movable_possessor)) {
 for ($i=0; $i < count($movable_possessor); $i++) { 

   $family_claim = DB::table('family_claim_movable')
   ->insertGetId([ 
    'movable_nature' => $movable_nature[$i],       
    'movable_possessor' =>$movable_possessor[$i],
    'movable_owner' =>$movable_owner[$i],
    'movable_value' =>$movable_value[$i],
    'claim_notice_id' => $request->claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// insurance
$policy_no = $request->policy_no;
$nature_of_cover = $request->nature_of_cover;
$date_insurance = $request->date_insurance;
$policy_value = $request->policy_value;
$policy_maturity_date = $request->policy_maturity_date;
$surrender_value = $request->surrender_value;
$claim_nature = $request->claim_nature;
$claim_value_insurance = $request->claim_value_insurance;
$date_of_claim = $request->date_of_claim;
$date_of_notice_insurance = $request->date_of_notice_insurance;
$date_of_breach_insurance = $request->date_of_breach_insurance;
$claim_amount_insurance = $request->claim_amount_insurance;
$claim_amount_int = $request->claim_amount_int;
$claim_amount_withoutint = $request->claim_amount_withoutint;
$document_no = $request->document_no;
$date_document = $request->date_document;
$freight_charges = $request->freight_charges;
$demurrage_charges = $request->demurrage_charges;
$goods_nature = $request->goods_nature;
$value_of_good = $request->value_of_good;
$loss_nature = $request->loss_nature;
// echo count($policy_no);
 // echo count($claim_amount_withoutint); exit;



if (!empty($policy_no)) {
 for ($i=0; $i < count($policy_no); $i++) { 

   $insurance_claim = DB::table('insurance_claim')
   ->insertGetId([        
    'policy_no' => $policy_no[$i],
    'nature_of_cover' =>$nature_of_cover[$i],
    'date_insurance' =>$date_insurance[$i],
    'policy_value' =>$policy_value[$i],
    'policy_maturity_date' =>$policy_maturity_date[$i],
    'surrender_value' =>$surrender_value[$i],
    'claim_nature' =>$claim_nature[$i],
    'claim_value_insurance' =>$claim_value_insurance[$i],
    'date_of_claim' =>$date_of_claim[$i],
    'date_of_notice_insurance' =>$date_of_notice_insurance[$i],
    'date_of_breach_insurance' =>$date_of_breach_insurance[$i],
    'claim_amount_insurance' =>$claim_amount_insurance[$i],
    'claim_amount_int' =>$claim_amount_int[$i],
    'claim_amount_withoutint' =>$claim_amount_withoutint[$i],
    'document_no' =>$document_no[$i],
    'date_document' =>$date_document[$i],
    'freight_charges' =>$freight_charges[$i],
    'demurrage_charges' =>$demurrage_charges[$i],
    'goods_nature' =>$goods_nature[$i],
    'value_of_good' =>$value_of_good[$i],
    'loss_nature' =>$loss_nature[$i],

    'claim_notice_id' => $request->claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $document_no = $request->document_no;
// $date_document = $request->date_document;
// $freight_charges = $request->freight_charges;
// $demurrage_charges = $request->demurrage_charges;
// $goods_nature = $request->goods_nature;
// $value_of_good = $request->value_of_good;
// $loss_nature = $request->loss_nature;

// if (!empty($document_no)) {
//     for ($i=0; $i < count($document_no); $i++) { 
//         $insurance_claim_part_2 = DB::table('insurance_claim_part_2')
//         ->insertGetId([        
//             'document_no' =>$document_no[$i],
//             'date_document' =>$date_document[$i],
//             'freight_charges' =>$freight_charges[$i],
//             'demurrage_charges' =>$demurrage_charges[$i],
//             'goods_nature' =>$goods_nature[$i],
//             'value_of_good' =>$value_of_good[$i],
//             'loss_nature' =>$loss_nature[$i],
//             'claim_notice_id' => (session()->get('ClaimNoticeID')),
//             'claim_id' => $claimdetails_id,    
//             'created_id'        =>  Auth::user()->id,
//         ]); 
//     }
// }

$nature_of_contract_real = $request->nature_of_contract_real;
$date_of_cintract_real = $request->date_of_cintract_real;
$annual_value_real = $request->annual_value_real;
$natue_of_immovable_real = $request->natue_of_immovable_real;
$name_of_possessor_real = $request->name_of_possessor_real;
$name_of_owner_real = $request->name_of_owner_real;
$description_real = $request->description_real;
$schedule_real = $request->schedule_real;
$market_value_real = $request->market_value_real;
$mortgage_value = $request->mortgage_value;
$date_of_breach_real = $request->date_of_breach_real;
$date_of_notice_real = $request->date_of_notice_real;

if (!empty($nature_of_contract_real)) 
{
    for ($i=0; $i < count($nature_of_contract_real); $i++) { 
       $realestate_claim = DB::table('realestate_claim')
       ->insertGetId([        
        'nature_of_contract_real' => $nature_of_contract_real[$i],
        'date_of_cintract_real' =>$date_of_cintract_real[$i],
        'annual_value_real' =>$annual_value_real[$i],
        'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
        'name_of_possessor_real' =>$name_of_possessor_real[$i],
        'name_of_owner_real' =>$name_of_owner_real[$i],
        'description_real' =>$description_real[$i],
        'schedule_real' =>$schedule_real[$i],
        'market_value_real' =>$market_value_real[$i],
        'mortgage_value' =>$mortgage_value[$i],
        'date_of_breach_real' =>$date_of_breach_real[$i],
        'date_of_notice_real' =>$date_of_notice_real[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_by'  =>  Auth::user()->id,


    ]); 

   }
}
// if (!empty($natue_of_immovable_real)) {
//    for ($i=0; $i < count($natue_of_immovable_real); $i++) { 

//      $realestate_claim = DB::table('realestate_claim')
//      ->insertGetId([        
//         'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
//         'name_of_possessor_real' =>$name_of_possessor_real[$i],
//         'name_of_owner_real' =>$name_of_owner_real[$i],
//         'description_real' =>$description_real[$i],
//         'schedule_real' =>$schedule_real[$i],
//         'market_value_real' =>$market_value_real[$i],
//         'mortgage_value' =>$mortgage_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
//  }
// }

// echo "sample"; exit;


//1 Mortage Header




//End



//2 banking_claim_hypo Header

if (!empty($description_hypo_bank)) {
 for ($i=0; $i < count($description_hypo_bank); $i++) { 

    $bank_cliam = DB::table('banking_claim_hypo')
    ->insertGetId([        
        'description_hypo_bank' =>$description_hypo_bank[$i],
        'value_hypo_bank' =>$value_hypo_bank[$i],
        'vehicle_hypo_bank' =>$vehicle_hypo_bank[$i],
        'location_hypo' =>$location_hypo[$i],
        'chassis_hypo_bank' =>$chassis_hypo_bank[$i],
        'date_hypo_bank' =>$date_hypo_bank[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

//3 banking_claim_hypo Header

// if (!empty($pledge_nature)) {
//    for ($i=0; $i < count($pledge_nature); $i++) { 

//     $bank_cliam = DB::table('banking_claim_pledge')
//     ->insertGetId([        
//         'pledge_nature' =>$pledge_nature[$i],
//         'pledge_date' =>$pledge_date[$i],
//         'pledge_date_maturity' =>$pledge_date_maturity[$i],
//         'pledge_value' =>$pledge_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 4 banking_claim_personal Header

if (!empty($personnel_guar_name)) {
 for ($i=0; $i < count($personnel_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_personal')
    ->insertGetId([        
        'personnel_guar_name' =>$personnel_guar_name[$i],
        'personnel_dob' =>$personnel_dob[$i],
        'personnel_father' =>$personnel_father[$i],
        'personnel_adddress' =>$personnel_adddress[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

// 5 banking_claim_corporate Header

if (!empty($company_guar_name)) {
 for ($i=0; $i < count($company_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_corporate')
    ->insertGetId([        
        'company_guar_name' =>$company_guar_name[$i],
        'compnay_cid' =>$compnay_cid[$i],
        'company_address' =>$company_address[$i],
        'company_date' =>$company_date[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End


// 6 banking_claim_mort_details Header

// if (!empty($mortgage_mortgagor)) {
//    for ($i=0; $i < count($mortgage_mortgagor); $i++) { 

//     $bank_cliam = DB::table('banking_claim_mort_details')
//     ->insertGetId([        
//            'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
//         'mortgage_company' =>$mortgage_company[$i],
//         'mortgage_property' =>$mortgage_property[$i],
//         'mortgage_schedule' =>$mortgage_schedule[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 7 banking_claim_hypo_details Header



//End


// 8 banking_claim_pledge_details Header

if (!empty($pledgor_name)) {
 for ($i=0; $i < count($pledgor_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_pledge_details')
    ->insertGetId([        
        'pledgor_name' =>$pledgor_name[$i],
        'pledgor_dob' =>$pledgor_dob[$i],
        'pledgor_father' =>$pledgor_father[$i],
        'pledgor_address' =>$pledgor_address[$i],
        'pledgor_nature' =>$pledgor_nature[$i],
        'pledgor_date' =>$pledgor_date[$i],
        'pledge_nature' =>$pledge_nature[$i],
        'pledge_date' =>$pledge_date[$i],
        'pledge_date_maturity' =>$pledge_date_maturity[$i],
        'pledge_value' =>$pledge_value[$i],
        'pledgor_date_maturity' =>$pledgor_date_maturity[$i],
        'pledgor_value' =>$pledgor_value[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

// 8 banking_claim_pro_details Header

if (!empty($pledgor_name)) {
 for ($i=0; $i < count($pledgor_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_pro_details')
    ->insertGetId([        
        'pro_date' =>$pro_date[$i],
        'revival_letter' =>$revival_letter[$i],
        'document_other' =>$document_other[$i],
        'claim_notice_id' => $request->claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End




return response()->json(['success' => 'Data Added successfully.']);
        // }


        //       


}
public function loan_details(Request $request, $id = null)
{
 $claimnoticeid =(session()->get('ClaimNoticeID'));


 $claimdetails_id = DB::table('banking_account_detail')
 ->insertGetId([
    'loan_acc_bank'        =>  $request->loan_acc_bank,
    'date_of_application_bank'        =>  $request->date_of_application_bank,
    'date_of_sanction_bank'        =>  $request->date_of_sanction_bank,
    'sanction_ammount'        =>  $request->sanction_ammount,
    'date_of_dafault'        =>  $request->date_of_dafault,
    'amount_as_account'        =>  $request->amount_as_account,
    'interest_bank'        =>  $request->interest_bank,
    'penel_interest_bank'        =>  $request->penel_interest_bank,
    'npa_date_bank'        =>  $request->npa_date_bank,

    'other_charges_bank'        =>  $request->other_charges_bank,
    'outstanding_amount'        =>  $request->outstanding_amount,
    'amount_as_date'        =>  $request->amount_as_date,
    'claim_notice_id' => $claimnoticeid,
    'created_id'        =>  Auth::user()->id,
    'user_id'        =>  Auth::user()->id
]);



 $security_type = $request->security_type;
 $mortgage_property = $request->mortgage_property;
 $mortgage_schedule = $request->mortgage_schedule;
 $mortgage_value_bank = $request->mortgage_value_bank;
 $mortgage_name = $request->mortgage_name;
 $mortgage_date = $request->mortgage_date;
 $hypo_property = $request->hypo_property;
 $hypo_schedule = $request->hypo_schedule;
 $hypo_value = $request->hypo_value;
 $hypo_name = $request->hypo_name;
 $hypo_date = $request->hypo_date;
 $hypo_engine = $request->hypo_engine;
 $hypo_chassis = $request->hypo_chassis;
 $guarntee_name = $request->guarntee_name;
 $guarntor_agreement = $request->guarntor_agreement;
 $others_details = $request->others_details;
 $others_date = $request->others_date;

 if (!empty($security_type)) {
  $count=  count($security_type);
  for ($i=0; $i < $count; $i++) { 
    //dd($security_type);
   $security_types = DB::table('security_type')
   ->insertGetId([  
       'security_type' =>$security_type[$i],
       'mortgage_property' =>$mortgage_property[$i],
       'mortgage_schedule' =>$mortgage_schedule[$i],
       'mortgage_value_bank' =>$mortgage_value_bank[$i],
       'mortgage_name' =>$mortgage_name[$i],
       'mortgage_date' =>$mortgage_date[$i],
       'hypo_schedule' =>$hypo_schedule[$i],
       'hypo_value' =>$hypo_value[$i],
       'hypo_name' =>$hypo_name[$i],
       'hypo_date' =>$hypo_date[$i],
       'hypo_engine' =>$hypo_engine[$i],
       'hypo_chassis' =>$hypo_chassis[$i],
       'guarntee_name' =>$guarntee_name[$i],
       'guarntor_agreement' =>$guarntor_agreement[$i],
       'others_details' =>$others_details[$i],
       'others_date' =>$others_date[$i],



       'claim_notice_id' => $claimnoticeid,
       'claim_id' => $claimdetails_id,    
       'created_id'        =>  Auth::user()->id,

   ]); 
}
}

$renewal_date = $request->renewal_date;
 // dd($renewal_date);s
if (!empty($renewal_date[0])) {

    $count=  count($renewal_date);
    for ($i=0; $i < $count; $i++) { 

       $renewal_dates = DB::table('renewal_date')
       ->insertGetId([  

        'renewal_date' =>$renewal_date[$i],



        'claim_notice_id' => $claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
   }
}


$revival_date = $request->revival_date;

if (!empty($revival_date[0])) {
 $count=  count($revival_date);
 for ($i=0; $i < $count; $i++) { 

   $revival_dates= DB::table('revival_date')
   ->insertGetId([  

    'revival_date' =>$revival_date[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

$legal_notice = $request->legal_notice;

if (!empty($legal_notice[0])) {
  $count=  count($legal_notice);
  for ($i=0; $i < $count; $i++) {

   $other_document = DB::table('legal_notice')
   ->insertGetId([  

    'legal_notice' =>$legal_notice[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
$other_document = $request->other_document;
if (!empty($other_document[0])) {
 $count=  count($other_document);
 for ($i=0; $i < $count; $i++) {

   $other_documents = DB::table('other_document')
   ->insertGetId([  

    'other_document' =>$other_document[$i],




    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

return response()->json(['success' => 'Data Added successfully.']);


}
public function loan_details_update(Request $request)
    {    
        //$id = $request->claimdetailsid;
        $claimdetailsid = $request->claimdetailsid;
        $claimnoticeid =(session()->get('ClaimNoticeID'));
 $claimdetails_id = DB::table('banking_account_detail')
 ->insertGetId([
    'loan_acc_bank'        =>  $request->loan_acc_bank,
    'date_of_application_bank'        =>  $request->date_of_application_bank,
    'date_of_sanction_bank'        =>  $request->date_of_sanction_bank,
    'sanction_ammount'        =>  $request->sanction_ammount,
    'date_of_dafault'        =>  $request->date_of_dafault,
    'amount_as_account'        =>  $request->amount_as_account,
    'interest_bank'        =>  $request->interest_bank,
    'penel_interest_bank'        =>  $request->penel_interest_bank,
   'npa_date_bank'        =>  $request->npa_date_bank,

    'other_charges_bank'        =>  $request->other_charges_bank,
    'outstanding_amount'        =>  $request->outstanding_amount,
    'amount_as_date'        =>  $request->amount_as_date,
    'claim_notice_id' => $claimnoticeid,
    'created_id'        =>  Auth::user()->id,
    'user_id'        =>  Auth::user()->id
]);



 $security_type = $request->security_type;
 $mortgage_property = $request->mortgage_property;
 $mortgage_schedule = $request->mortgage_schedule;
 $mortgage_value_bank = $request->mortgage_value_bank;
 $mortgage_name = $request->mortgage_name;
 $mortgage_date = $request->mortgage_date;
 $hypo_property = $request->hypo_property;
 $hypo_schedule = $request->hypo_schedule;
 $hypo_value = $request->hypo_value;
 $hypo_name = $request->hypo_name;
 $hypo_date = $request->hypo_date;
 $hypo_engine = $request->hypo_engine;
 $hypo_chassis = $request->hypo_chassis;
 $guarntee_name = $request->guarntee_name;
 $guarntor_agreement = $request->guarntor_agreement;
 $others_details = $request->others_details;
 $others_date = $request->others_date;
  if (!empty($security_type)) {
  $count=  count($security_type);
  for ($i=0; $i < $count; $i++) { 
    //dd($security_type);
   $security_types = DB::table('security_type')
   ->insertGetId([  
       'security_type' =>$security_type[$i],
       'mortgage_property' =>$mortgage_property[$i],
       'mortgage_schedule' =>$mortgage_schedule[$i],
       'mortgage_value_bank' =>$mortgage_value_bank[$i],
       'mortgage_name' =>$mortgage_name[$i],
       'mortgage_date' =>$mortgage_date[$i],
       'hypo_schedule' =>$hypo_schedule[$i],
       'hypo_value' =>$hypo_value[$i],
       'hypo_name' =>$hypo_name[$i],
       'hypo_date' =>$hypo_date[$i],
       'hypo_engine' =>$hypo_engine[$i],
       'hypo_chassis' =>$hypo_chassis[$i],
       'guarntee_name' =>$guarntee_name[$i],
       'guarntor_agreement' =>$guarntor_agreement[$i],
       'others_details' =>$others_details[$i],
       'others_date' =>$others_date[$i],



       'claim_notice_id' => $claimnoticeid,
       'claim_id' => $claimdetails_id,    
       'created_id'        =>  Auth::user()->id,

   ]); 
}
}

$renewal_date = $request->renewal_date;
if (!empty($renewal_date[0])) {
    $count=  count($renewal_date);
    for ($i=0; $i < $count; $i++) { 

       $renewal_dates = DB::table('renewal_date')
       ->insertGetId([  

        'renewal_date' =>$renewal_date[$i],



        'claim_notice_id' => $claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
   }
}


$revival_date = $request->revival_date;

if (!empty($revival_date[0])) {
 $count=  count($revival_date);
 for ($i=0; $i < $count; $i++) { 

   $revival_dates = DB::table('revival_date')
   ->insertGetId([  

    'revival_date' =>$revival_date[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

$legal_notice = $request->legal_notice;

if (!empty($legal_notice[0])) {
  $count=  count($legal_notice);
  for ($i=0; $i < $count; $i++) {

   $other_document = DB::table('legal_notice')
   ->insertGetId([  

    'legal_notice' =>$legal_notice[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
$other_document = $request->other_document;
if (!empty($other_document[0])) {
 $count=  count($other_document);
 for ($i=0; $i < $count; $i++) {

   $other_documents = DB::table('other_document')
   ->insertGetId([  

    'other_document' =>$other_document[$i],




    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
 
 $bank_cliam_update = DB::table('banking_account_detail')
     ->where(['claim_notice_id'=>(session()->get('ClaimNoticeID'))])
     ->update(['claim_id' => $claimdetailsid]); 
return response()->json(['success' => 'Data Added successfully.']);


}
public function loanbank_details_update(Request $request){
        // return $request;
  $bank_loan_id = $request->loan_id_forupdate;
  //return $claimdetailsid;
        //echo($claimdetailsid);exit;
        $claimdetails_id = $request->claimdetails_id;
        $claimnoticeid =(session()->get('ClaimNoticeID'));

        $table = DB::table('banking_account_detail')
   ->where('id' , $bank_loan_id)
   ->update(['loan_acc_bank'        =>  $request->loan_acc_bank,
    'date_of_application_bank'        =>  $request->date_of_application_bank,
    'date_of_sanction_bank'        =>  $request->date_of_sanction_bank,
    'sanction_ammount'        =>  $request->sanction_ammount,
    'date_of_dafault'        =>  $request->date_of_dafault,
    'amount_as_account'        =>  $request->amount_as_account,
    'interest_bank'        =>  $request->interest_bank,
    'penel_interest_bank'        =>  $request->penel_interest_bank,
   'npa_date_bank'        =>  $request->npa_date_bank,

    'other_charges_bank'        =>  $request->other_charges_bank,
    'outstanding_amount'        =>  $request->outstanding_amount,
    'amount_as_date'        =>  $request->amount_as_date,
    'claim_notice_id' => $claimnoticeid,
    'created_id'        =>  Auth::user()->id,
    'user_id'        =>  Auth::user()->id]);
        
   //      $form_data = array(
   //         'loan_acc_bank'        =>  $request->loan_acc_bank,
   //  'date_of_application_bank'        =>  $request->date_of_application_bank,
   //  'date_of_sanction_bank'        =>  $request->date_of_sanction_bank,
   //  'sanction_ammount'        =>  $request->sanction_ammount,
   //  'date_of_dafault'        =>  $request->date_of_dafault,
   //  'amount_as_account'        =>  $request->amount_as_account,
   //  'interest_bank'        =>  $request->interest_bank,
   //  'penel_interest_bank'        =>  $request->penel_interest_bank,
   // 'npa_date_bank'        =>  $request->npa_date_bank,

   //  'other_charges_bank'        =>  $request->other_charges_bank,
   //  'outstanding_amount'        =>  $request->outstanding_amount,
   //  'amount_as_date'        =>  $request->amount_as_date,
   //  'claim_notice_id' => $claimnoticeid,
   //  'created_id'        =>  Auth::user()->id,
   //  'user_id'        =>  Auth::user()->id
   //     );

//LoanBank::whereId($bank_loan_id)->update($form_data);
//return "Success";



$renewal_date = $request->renewal_date;
if (!empty($renewal_date)) {
    DB::delete('delete from renewal_date where claim_id = ?',[$bank_loan_id]);
    $count=  count($renewal_date);
    for ($i=0; $i < $count; $i++) { 

       $renewal_dates = DB::table('renewal_date')
       ->insertGetId([  
        'renewal_date' =>$renewal_date[$i],
        'claim_notice_id' => $claimnoticeid,
        'claim_id' => $bank_loan_id,    
        'created_id'        =>  Auth::user()->id,
    ]); 
     //    $renewal_dates = DB::table('renewal_date')
     // ->where(['claim_notice_id'=> $claimnoticeid,])
     // ->update(['claim_id' => $claimdetails_id]);
   }
}




 
 $mortgage_property_edit = $request->mortgage_property_edit;
 $mortgage_schedule_edit = $request->mortgage_schedule_edit;
 $mortgage_value_bank_edit = $request->mortgage_value_bank_edit;
 $mortgage_name_add = $request->mortgage_name_add;
 $mortgage_date_add = $request->mortgage_date_add;
 $hypo_property_add = $request->hypo_property_add;
 $hypo_schedule_add = $request->hypo_schedule_add;
 $hypo_value_add = $request->hypo_value_add;
 $hypo_name_add = $request->hypo_name_add;
 $hypo_date_add = $request->hypo_date_add;
 $hypo_engine_add = $request->hypo_engine_add;
 $hypo_chassis_add = $request->hypo_chassis_add;
 $guarntee_name_edit = $request->guarntee_name_edit;
 $guarntor_agreement_edit = $request->guarntor_agreement_edit;
 $others_details_edit = $request->others_details_edit;
 $others_date_edit = $request->others_date_edit;
// return $request->mortgage_name_add;
 // return $request->others_date;
$security_type_edit = $request->security_type_edit;
  if (!empty($security_type_edit)) {
    DB::delete('delete from security_type where claim_id = ?',[$bank_loan_id]);
  $count_edit=  count($security_type_edit);
 
echo count($mortgage_property_edit);
echo count($mortgage_schedule_edit);
echo count($mortgage_value_bank_edit);
 echo count($mortgage_name_add);
 echo count($mortgage_date_add);
 echo count($hypo_schedule_add);
 echo count($hypo_property_add);
  echo count($hypo_value_add);
  echo count($hypo_name_add);
  echo count($hypo_date_add);
 echo count($hypo_engine_add);
 echo count($hypo_chassis_add);
 echo  count($guarntee_name_edit);
 echo count($guarntor_agreement_edit);
  echo count($others_details_edit);
  echo count($others_date_edit);


// exit;


  
 // return  $mortgage_property[0].$mortgage_schedule[0].$mortgage_value_bank[0].$mortgage_date[0].$mortgage_date[0]."second".$mortgage_property[1].$mortgage_schedule[1].$mortgage_value_bank[1].$mortgage_date[1].$mortgage_date[1];
// echo json_encode($hypo_property_add[2]);exit; 
  for ($i=0; $i < $count_edit; $i++) { 
    
   
    
$security_typess = DB::table('security_type')
       ->insertGetId([  

       'security_type' =>$security_type_edit[$i],


        
       'mortgage_property' =>$mortgage_property_edit[$i],
       'mortgage_schedule' =>$mortgage_schedule_edit[$i],
       'mortgage_value_bank' =>$mortgage_value_bank_edit[$i],
       'mortgage_name' =>$mortgage_name_add[$i],
       'mortgage_date' =>$mortgage_date_add[$i],
       'hypo_property' =>$hypo_property_add[$i],
       'hypo_schedule' =>$hypo_schedule_add[$i],
       'hypo_value' =>$hypo_value_add[$i],
       'hypo_name' =>$hypo_name_add[$i],
       'hypo_date' =>$hypo_date_add[$i],
       'hypo_engine' =>$hypo_engine_add[$i],
       'hypo_chassis' =>$hypo_chassis_add[$i],
       'guarntee_name' =>$guarntee_name_edit[$i],
       'guarntor_agreement' =>$guarntor_agreement_edit[$i],
       'others_details' =>$others_details_edit[$i],
       'others_date' =>$others_date_edit[$i],
       'claim_notice_id' => $claimnoticeid,
       'claim_id' => $bank_loan_id,    
       'created_id'        =>  Auth::user()->id,

   ]); 
  

  
   //  $security_typess = DB::table('security_type')
  
   //     ->insertGetId([  

   //     'security_type' =>$security_type_edit[$i],
      

   //      'hypo_property' =>isset($hypo_property_add[$i])?($hypo_property_add[$i]):'',
   //     'hypo_schedule' =>isset($hypo_schedule_add[$i])?($hypo_schedule_add[$i]):'',
   //     'hypo_value' =>isset($hypo_value_add[$i])?($hypo_value_add[$i]):'',
   //     'hypo_name' =>isset($hypo_name_add[$i])?($hypo_name_add[$i]):'',
   //     'hypo_date' =>isset($hypo_date_add[$i])?($hypo_date_add[$i]):'',
   //     'hypo_engine' =>isset($hypo_engine_add_add[$i])?($hypo_engine_add_add[$i]):'',
   //     'hypo_chassis' =>isset($hypo_chassis_add[$i])?($hypo_chassis_add[$i]):'',
       



   //     'claim_notice_id' => $claimnoticeid,
   //     'claim_id' => $bank_loan_id,    
   //     'created_id'        =>  Auth::user()->id,

   // ]); 
   // }
   // elseif($security_type_edit[$i]=='guarntee')  {
   //  $security_typess = DB::table('security_type')
  
   //     ->insertGetId([  

   //     'security_type' =>$security_type_edit[$i],

   //      'guarntee_name' =>isset($guarntee_name_add[$i])?($guarntee_name_add_add[$i]):'',
   //     'guarntor_agreement' =>isset($guarntor_agreement_add[$i])?($guarntor_agreement_add[$i]):'',
      



   //     'claim_notice_id' => $claimnoticeid,
   //     'claim_id' => $bank_loan_id,    
   //     'created_id'        =>  Auth::user()->id,

   // ]); 
   // }
   // elseif($security_type_edit[$i]=='other')  {
   //  $security_typess = DB::table('security_type')
  
   //     ->insertGetId([  

   //     'security_type' =>$security_type_edit[$i],

       
   //     'others_details' =>isset($others_details_add[$i])?($others_details_add[$i]):'',
   //     'others_date' =>isset($others_date_add[$i])?($others_date_add[$i]):'',



   //     'claim_notice_id' => $claimnoticeid,
   //     'claim_id' => $bank_loan_id,    
   //     'created_id'        =>  Auth::user()->id,

   // ]); 
   // }
   // $security_typess = DB::table('security_type')
  
   //     ->insertGetId([  

   //     'security_type' =>$security_type_edit[$i],

   //     'mortgage_property' =>$mortgage_property[$i],
   //     'mortgage_schedule' =>$mortgage_schedule[$i],
   //     'mortgage_value_bank' =>$mortgage_value_bank[$i],
   //     'mortgage_name' =>$mortgage_name[$i],
   //     'mortgage_date' =>$mortgage_date[$i],
   //     'hypo_schedule' =>$hypo_schedule[$i],
   //     'hypo_value' =>$hypo_value[$i],
   //     'hypo_name' =>$hypo_name[$i],
   //     'hypo_date' =>$hypo_date[$i],
   //     'hypo_engine' =>$hypo_engine[$i],
   //     'hypo_chassis' =>$hypo_chassis[$i],
   //     'guarntee_name' =>$guarntee_name[$i],
   //     'guarntor_agreement' =>$guarntor_agreement[$i],
   //     'others_details' =>$others_details[$i],
   //     'others_date' =>$others_date[$i],



   //     'claim_notice_id' => $claimnoticeid,
   //     'claim_id' => $bank_loan_id,    
   //     'created_id'        =>  Auth::user()->id,

   // ]); 
   
}
}
 



$revival_date = $request->revival_date;

if (!empty($revival_date)) {
    DB::delete('delete from revival_date where claim_id = ?',[$bank_loan_id]);

 $count=  count($revival_date);
 for ($i=0; $i < $count; $i++) { 
    $revival_dates = DB::table('revival_date')
       ->insertGetId([  
        'revival_date' =>$revival_date[$i],
        'claim_notice_id' => $claimnoticeid,
        'claim_id' => $bank_loan_id,    
        'created_id'        =>  Auth::user()->id,
    ]); 

   
   
}
}

    $legal_noticess = $request->legal_notice;

if (!empty($legal_noticess)) {
  $count=  count($legal_noticess);
  DB::delete('delete from legal_notice where claim_id = ?',[$bank_loan_id]);
  
  for ($i=0; $i < $count; $i++) {
    

   $legal_notices = DB::table('legal_notice')
   ->insertGetId([  

    // 'legal_notice' =>$legal_noticess[$i],
     'legal_notice' =>isset($legal_noticess[$i])?($legal_noticess[$i]):'',



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $bank_loan_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
$other_document = $request->other_document;
if (!empty($other_document)) {
  DB::delete('delete from other_document where claim_id = ?',[$bank_loan_id]);

 $count=  count($other_document);
 for ($i=0; $i < $count; $i++) {

   $other_documents = DB::table('other_document')
   ->insertGetId([  

    'other_document' =>$other_document[$i],




    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $bank_loan_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
 
 


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $claimdetails = DB::select("select * from claim_details where claimnoticeid =".$id);


        $dispute_categories = DB::table('dispute_categories')->get();
        $dispute_subcategories = DB::table('dispute_subcategories')->get();


        return view('modals.editClaimantDetailsModal', compact('claimdetails','dispute_categories','dispute_subcategories', $claimdetails));
    }


    public function updateClaimDetails(Request $request)
    {    

        $id = $request->claimdetailsid;
        $claimdetails_id = $request->claimdetailsid;
        $claimnoticeid =(session()->get('ClaimNoticeID'));
        
        $form_data = array(
           'vesselname'        =>  $request->vesselname,
           'carriername'        =>  $request->carriername,
           'charterparty'        =>  $request->charterparty,
           'pnrno'        =>  $request->pnrno,
           'cargonature'        =>  $request->cargonature,
           'natureofincident'        =>  $request->natureofincident,
           'cargoname'        =>  $request->cargoname,
           'quantity'        =>  $request->quantity,
           'lossdetails'        =>  $request->lossdetails,
           'claimamount'        =>  $request->claimamount,
           'contractdate'        =>  $request->contractdate,
           'bill_of_lading_details_date_no'        =>  $request->bill_of_lading_details_date_no,
           'passenger_ticket_booking_no'        =>  $request->passenger_ticket_booking_no,
           'passenger_ticket_booking_date'        =>  $request->passenger_ticket_booking_date,
           'due_date'        =>  $request->due_date,
           'claimnoticeid'        =>  $claimnoticeid,
           'noticedate'        =>  $request->noticedate,
           'date_of_breach'        =>  $request->date_of_breach,
           'date_of_demand'        =>  $request->date_of_demand,
        // //Form 3:
         // 'loan_acc' => $request->loan_acc,
         // 'date_of_application' => $request->date_of_application,
         // 'date_of_sanction' => $request->date_of_sanction,
         // 'nature_of_aggrement' => $request->nature_of_aggrement,


         // 'date_of_default'        =>  $request->date_of_default,
         // 'npa_date_bank'        =>  $request->npa_date_bank,

         // 'amount_due_per_account'        =>  $request->amount_due_per_account,
         // 'date_of_demand'        =>  $request->date_of_demand,

         // 'rate_of_interest' =>$request->rate_of_interest,
         // 'penel_interest_bank' =>$request->penel_interest_bank,
           'other_charges' =>$request->other_charges,
           'total_due_date' =>$request->total_due_date,

                //form 4
           'details_of_goods' => $request->details_of_goods,
           'details_of_service' => $request->details_of_service,
           'date_of_contract' => $request->date_of_contract,
           'date_of_invoice' => $request->date_of_invoice,
           'claim_amount'        =>  $request->claim_amount,
           'date_of_warranty' => $request->date_of_warranty,
           'default_date_of_cause_of_action' => $request->default_date_of_cause_of_action,
           'date_of_notice' => $request->date_of_notice,         

        //form 5 
           'nature_of_breach' => $request->nature_of_breach,
         // 'date_of_demand' => $request->date_of_demand,
        //form 6 
           'partnership_deed_date' => $request->partnership_deed_date,
           'date_of_reconstitution' => $request->date_of_reconstitution,
           'date_of_dissolution' => $request->date_of_dissolution,
           'date_of_agreement' => $request->date_of_agreement,
           'par_dispute_amount' => $request->par_dispute_amount,
        //form 7 no need to create
        //form8 
           'details_of_documents' => $request->details_of_documents,
        //form9
           'date_of_employment' => $request->date_of_employment,
           'date_of_consultancy_contract' => $request->date_of_consultancy_contract,
        //form 10 no need to create
        //form 11
           'claim_value' => $request->claim_value,
           'date_of_cause_of_action' => $request->date_of_cause_of_action,
           'total_amount_bank' => $request->total_amount_bank,

        //form 12
           'date_of_notification' => $request->date_of_notification,
           'date_of_tender' => $request->date_of_tender,
        //form 13
           'date_of_registration' => $request->date_of_registration,
           'date_of_licence'  => $request->date_of_licence,
           'earliest_date_of_prior_use' => $request->earliest_date_of_prior_use,
           'date_of_breach_or_infringement' => $request->date_of_breach_or_infringement,
        //form 14
           'policy_details' => $request->policy_details,
           'maturity_date' => $request->maturity_date,
           'lorry_reciept_date' => $request->lorry_reciept_date,
           'warehousing_receipt_date' => $request->warehousing_receipt_date,
        //form 15
           'contract_details' => $request->contract_details,
        //form 17
           'details_of_contract' => $request->details_of_contract,
           'reason_for_claim'=>$request->reason_for_claim,
        //form1
           'claim_interest'=>$request->claim_interest,
           'claimamountwithinterest'=>$request->claimamountwithinterest,
        // family
           'nature_of_immovable'=>$request->nature_of_immovable,
           'name_of_possessor'=>$request->name_of_possessor,
           'name_of_property'=>$request->name_of_property,
           'property_description'=>$request->property_description,
           'schedule_boundary'=>$request->schedule_boundary,
           'nature_and_specific'=>$request->nature_and_specific,
           'nature_of_cause_of_action'=>$request->nature_of_cause_of_action,
           'average_annnual'=>$request->average_annnual,
           'owner_movable'=>$request->owner_movable,
           'possessor_movable'=>$request->possessor_movable,
           'created_id'        =>  Auth::user()->id,
           'user_id'        =>  Auth::user()->id
       );

ClaimDetails::whereId($id)->update($form_data);





$immovable_nature = $request->immovable_nature;
$movable_nature = $request->movable_nature;
$immovable_possessor = $request->immovable_possessor;
$immovable_owner = $request->immovable_owner;
$immovable_description = $request->immovable_description;
$immovable_schedule = $request->immovable_schedule;
$immovable_market = $request->immovable_market;
$movable_possessor = $request->movable_possessor;
$movable_owner = $request->movable_owner;
$movable_value = $request->movable_value;


if (!empty($immovable_possessor)) {
 for ($i=0; $i < count($immovable_possessor); $i++) { 

   $family_claim = DB::table('family_claim')
   ->insertGetId([ 
    'immovable_nature' => $immovable_nature[$i],       
    'immovable_possessor' => $immovable_possessor[$i],
    'immovable_owner' =>$immovable_owner[$i],
    'immovable_description' =>$immovable_description[$i],
    'immovable_schedule' =>$immovable_schedule[$i],
    'immovable_market' =>$immovable_market[$i],
    'claim_notice_id' => session()->get('ClaimNoticeID'),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $loan_acc_bank = $request->loan_acc_bank;
// $date_of_application_bank = $request->date_of_application_bank;
// $date_of_sanction_bank = $request->date_of_sanction_bank;
// $nature_of_aggrement_bank = $request->nature_of_aggrement_bank;
// $date_of_default_bank = $request->date_of_default_bank;
// $npa_date_bank_bank = $request->npa_date_bank_bank;
// $date_of_breach_bank = $request->date_of_breach_bank;
// $amount_due_per_account_bank = $request->amount_due_per_account_bank;
// $date_of_demand_bank = $request->date_of_demand_bank;
// $rate_of_interest_bank = $request->rate_of_interest_bank;
// $penel_interest_bank_bank = $request->penel_interest_bank_bank;
// $due_date_bank = $request->due_date_bank;

// $security_type = $request->security_type;
// $mortgage_value_bank = $request->mortgage_value_bank;
// $mortgage_name = $request->mortgage_name;
// $mortgage_date = $request->mortgage_date;
// $hypo_value = $request->hypo_value;
// $hypo_name = $request->hypo_name;
// $hypo_date = $request->hypo_date;
// $hypo_engine = $request->hypo_engine;
// $hypo_chassis = $request->hypo_chassis;
// $guarntee_name = $request->guarntee_name;
// $guarntor_agreement = $request->guarntor_agreement;
// $others_details = $request->others_details;

// $others_date = $request->others_date;
// $renewal_date = $request->renewal_date;
// $revival_date = $request->revival_date;
// $date_of_dafault = $request->date_of_dafault;
// $legal_notice = $request->legal_notice;
// $other_document = $request->other_document;
// $npa_date_bank = $request->npa_date_bank;
// $amount_as_account = $request->amount_as_account;
// $interest_bank = $request->interest_bank;
// $penel_interest_bank = $request->penel_interest_bank;
// $other_charges_bank = $request->other_charges_bank;
// $amount_as_date = $request->amount_as_date;

// $sanction_ammount = $request->sanction_ammount;
// $mortgage_property = $request->mortgage_property;
// $hypo_property = $request->hypo_property;
// $mortgage_schedule = $request->mortgage_schedule;
// $hypo_schedule = $request->hypo_schedule;

// if (!empty($loan_acc_bank)) {
//  for ($i=0; $i < count($loan_acc_bank); $i++) { 

//    $family_claim = DB::table('banking_account_detail')
//    ->insertGetId([        
//     'loan_acc_bank' =>$loan_acc_bank[$i],
//     'date_of_application_bank' =>$date_of_application_bank[$i],
//     'date_of_sanction_bank' =>$date_of_sanction_bank[$i],
//     'nature_of_aggrement_bank' =>$nature_of_aggrement_bank[$i],
//     'date_of_default_bank' =>$date_of_default_bank[$i],
//     'npa_date_bank_bank' =>$npa_date_bank_bank[$i],
//     'date_of_breach_bank' =>$date_of_breach_bank[$i],
//     'amount_due_per_account_bank' =>$amount_due_per_account_bank[$i],
//     'date_of_demand_bank' =>$date_of_demand_bank[$i],
//     'rate_of_interest_bank' =>$rate_of_interest_bank[$i],
//     'penel_interest_bank_bank' =>$penel_interest_bank_bank[$i],
//     'due_date_bank' =>$due_date_bank[$i],

//     'security_type' =>$security_type[$i],
//     'mortgage_value_bank' =>$mortgage_value_bank[$i],
//     'mortgage_name' =>$mortgage_name[$i],

//     'mortgage_date' =>$mortgage_date[$i],
//     'hypo_value' =>$hypo_value[$i],
//     'hypo_name' =>$hypo_name[$i],
//     'hypo_date' =>$hypo_date[$i],
//     'hypo_engine' =>$hypo_engine[$i],
//     'hypo_chassis' =>$hypo_chassis[$i],
//     'guarntee_name' =>$guarntee_name[$i],
//     'guarntor_agreement' =>$guarntor_agreement[$i],

//     'others_details' =>$others_details[$i],
//     'others_date' =>$others_date[$i],
//     'renewal_date' =>$renewal_date[$i],
//     'revival_date' =>$revival_date[$i],
//     'date_of_dafault' =>$date_of_dafault[$i],
//     'legal_notice' =>$legal_notice[$i],
//     'other_document' =>$other_document[$i],
//     'npa_date_bank' =>$npa_date_bank[$i],
//     'amount_as_account' =>$amount_as_account[$i],
//     'interest_bank' =>$interest_bank[$i],
//     'penel_interest_bank' =>$penel_interest_bank[$i],
//     'other_charges_bank' =>$other_charges_bank[$i],

//     'amount_as_date' =>$amount_as_date[$i],
//     'sanction_ammount' =>$sanction_ammount[$i],
//     'mortgage_property' =>$mortgage_property[$i],
//     'hypo_property' =>$hypo_property[$i],
//     'mortgage_schedule' =>$mortgage_schedule[$i],
//     'hypo_schedule' =>$hypo_schedule[$i],


//     'claim_notice_id' => (session()->get('ClaimNoticeID')),
//     'claim_id' => $claimdetails_id,    
//     'created_id'        =>  Auth::user()->id,

// ]); 
// }
// }




if (!empty($movable_possessor)) {
 for ($i=0; $i < count($movable_possessor); $i++) { 

   $family_claim = DB::table('family_claim_movable')
   ->insertGetId([ 
    'movable_nature' => $movable_nature[$i],       
    'movable_possessor' =>$movable_possessor[$i],
    'movable_owner' =>$movable_owner[$i],
    'movable_value' =>$movable_value[$i],
    'claim_notice_id' =>session()->get('ClaimNoticeID'),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// insurance
$policy_no = $request->policy_no;
$nature_of_cover = $request->nature_of_cover;
$date_insurance = $request->date_insurance;
$policy_value = $request->policy_value;
$policy_maturity_date = $request->policy_maturity_date;
$surrender_value = $request->surrender_value;
$claim_nature = $request->claim_nature;
$claim_value_insurance = $request->claim_value_insurance;
$date_of_claim = $request->date_of_claim;
$date_of_notice_insurance = $request->date_of_notice_insurance;
$date_of_breach_insurance = $request->date_of_breach_insurance;
$claim_amount_insurance = $request->claim_amount_insurance;
$claim_amount_int = $request->claim_amount_int;
$claim_amount_withoutint = $request->claim_amount_withoutint;
$document_no = $request->document_no;
$date_document = $request->date_document;
$freight_charges = $request->freight_charges;
$demurrage_charges = $request->demurrage_charges;
$goods_nature = $request->goods_nature;
$value_of_good = $request->value_of_good;
$loss_nature = $request->loss_nature;
// echo count($policy_no);
 // echo count($claim_amount_withoutint); exit;



if (!empty($policy_no)) {
 for ($i=0; $i < count($policy_no); $i++) { 

   $insurance_claim = DB::table('insurance_claim')
   ->insertGetId([        
    'policy_no' => $policy_no[$i],
    'nature_of_cover' =>$nature_of_cover[$i],
    'date_insurance' =>$date_insurance[$i],
    'policy_value' =>$policy_value[$i],
    'policy_maturity_date' =>$policy_maturity_date[$i],
    'surrender_value' =>$surrender_value[$i],
    'claim_nature' =>$claim_nature[$i],
    'claim_value_insurance' =>$claim_value_insurance[$i],
    'date_of_claim' =>$date_of_claim[$i],
    'date_of_notice_insurance' =>$date_of_notice_insurance[$i],
    'date_of_breach_insurance' =>$date_of_breach_insurance[$i],
    'claim_amount_insurance' =>$claim_amount_insurance[$i],
    'claim_amount_int' =>$claim_amount_int[$i],
    'claim_amount_withoutint' =>$claim_amount_withoutint[$i],
    'document_no' =>$document_no[$i],
    'date_document' =>$date_document[$i],
    'freight_charges' =>$freight_charges[$i],
    'demurrage_charges' =>$demurrage_charges[$i],
    'goods_nature' =>$goods_nature[$i],
    'value_of_good' =>$value_of_good[$i],
    'loss_nature' =>$loss_nature[$i],

    'claim_notice_id' => (session()->get('ClaimNoticeID')),
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

// $document_no = $request->document_no;
// $date_document = $request->date_document;
// $freight_charges = $request->freight_charges;
// $demurrage_charges = $request->demurrage_charges;
// $goods_nature = $request->goods_nature;
// $value_of_good = $request->value_of_good;
// $loss_nature = $request->loss_nature;

// if (!empty($document_no)) {
//     for ($i=0; $i < count($document_no); $i++) { 
//         $insurance_claim_part_2 = DB::table('insurance_claim_part_2')
//         ->insertGetId([        
//             'document_no' =>$document_no[$i],
//             'date_document' =>$date_document[$i],
//             'freight_charges' =>$freight_charges[$i],
//             'demurrage_charges' =>$demurrage_charges[$i],
//             'goods_nature' =>$goods_nature[$i],
//             'value_of_good' =>$value_of_good[$i],
//             'loss_nature' =>$loss_nature[$i],
//             'claim_notice_id' => (session()->get('ClaimNoticeID')),
//             'claim_id' => $claimdetails_id,    
//             'created_id'        =>  Auth::user()->id,
//         ]); 
//     }
// }

$nature_of_contract_real = $request->nature_of_contract_real;
$date_of_cintract_real = $request->date_of_cintract_real;
$annual_value_real = $request->annual_value_real;
$natue_of_immovable_real = $request->natue_of_immovable_real;
$name_of_possessor_real = $request->name_of_possessor_real;
$name_of_owner_real = $request->name_of_owner_real;
$description_real = $request->description_real;
$schedule_real = $request->schedule_real;
$market_value_real = $request->market_value_real;
$mortgage_value = $request->mortgage_value;
$date_of_breach_real = $request->date_of_breach_real;
$date_of_notice_real = $request->date_of_notice_real;

if (!empty($nature_of_contract_real)) 
{
    for ($i=0; $i < count($nature_of_contract_real); $i++) { 
       $realestate_claim = DB::table('realestate_claim')
       ->insertGetId([        
        'nature_of_contract_real' => $nature_of_contract_real[$i],
        'date_of_cintract_real' =>$date_of_cintract_real[$i],
        'annual_value_real' =>$annual_value_real[$i],
        'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
        'name_of_possessor_real' =>$name_of_possessor_real[$i],
        'name_of_owner_real' =>$name_of_owner_real[$i],
        'description_real' =>$description_real[$i],
        'schedule_real' =>$schedule_real[$i],
        'market_value_real' =>$market_value_real[$i],
        'mortgage_value' =>$mortgage_value[$i],
        'date_of_breach_real' =>$date_of_breach_real[$i],
        'date_of_notice_real' =>$date_of_notice_real[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_by'  =>  Auth::user()->id,


    ]); 

   }
}
// if (!empty($natue_of_immovable_real)) {
//    for ($i=0; $i < count($natue_of_immovable_real); $i++) { 

//      $realestate_claim = DB::table('realestate_claim')
//      ->insertGetId([        
//         'natue_of_immovable_real' =>$natue_of_immovable_real[$i],
//         'name_of_possessor_real' =>$name_of_possessor_real[$i],
//         'name_of_owner_real' =>$name_of_owner_real[$i],
//         'description_real' =>$description_real[$i],
//         'schedule_real' =>$schedule_real[$i],
//         'market_value_real' =>$market_value_real[$i],
//         'mortgage_value' =>$mortgage_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
//  }
// }

// echo "sample"; exit;


//End



//2 banking_claim_hypo Header

if (!empty($description_hypo_bank)) {
 for ($i=0; $i < count($description_hypo_bank); $i++) { 

    $bank_cliam = DB::table('banking_claim_hypo')
    ->insertGetId([        
        'description_hypo_bank' =>$description_hypo_bank[$i],
        'value_hypo_bank' =>$value_hypo_bank[$i],
        'vehicle_hypo_bank' =>$vehicle_hypo_bank[$i],
        'location_hypo' =>$location_hypo[$i],
        'chassis_hypo_bank' =>$chassis_hypo_bank[$i],
        'date_hypo_bank' =>$date_hypo_bank[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

//3 banking_claim_hypo Header

// if (!empty($pledge_nature)) {
//    for ($i=0; $i < count($pledge_nature); $i++) { 

//     $bank_cliam = DB::table('banking_claim_pledge')
//     ->insertGetId([        
//         'pledge_nature' =>$pledge_nature[$i],
//         'pledge_date' =>$pledge_date[$i],
//         'pledge_date_maturity' =>$pledge_date_maturity[$i],
//         'pledge_value' =>$pledge_value[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 4 banking_claim_personal Header

if (!empty($personnel_guar_name)) {
 for ($i=0; $i < count($personnel_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_personal')
    ->insertGetId([        
        'personnel_guar_name' =>$personnel_guar_name[$i],
        'personnel_dob' =>$personnel_dob[$i],
        'personnel_father' =>$personnel_father[$i],
        'personnel_adddress' =>$personnel_adddress[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

// 5 banking_claim_corporate Header

if (!empty($company_guar_name)) {
 for ($i=0; $i < count($company_guar_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_corporate')
    ->insertGetId([        
        'company_guar_name' =>$company_guar_name[$i],
        'compnay_cid' =>$compnay_cid[$i],
        'company_address' =>$company_address[$i],
        'company_date' =>$company_date[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End


// 6 banking_claim_mort_details Header

// if (!empty($mortgage_mortgagor)) {
//    for ($i=0; $i < count($mortgage_mortgagor); $i++) { 

//     $bank_cliam = DB::table('banking_claim_mort_details')
//     ->insertGetId([        
//            'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
//         'mortgage_company' =>$mortgage_company[$i],
//         'mortgage_property' =>$mortgage_property[$i],
//         'mortgage_schedule' =>$mortgage_schedule[$i],
//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
// }
// }


//End


// 7 banking_claim_hypo_details Header



//End


// 8 banking_claim_pledge_details Header

if (!empty($pledgor_name)) {
 for ($i=0; $i < count($pledgor_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_pledge_details')
    ->insertGetId([        
        'pledgor_name' =>$pledgor_name[$i],
        'pledgor_dob' =>$pledgor_dob[$i],
        'pledgor_father' =>$pledgor_father[$i],
        'pledgor_address' =>$pledgor_address[$i],
        'pledgor_nature' =>$pledgor_nature[$i],
        'pledgor_date' =>$pledgor_date[$i],
        'pledgor_date_maturity' =>$pledgor_date_maturity[$i],
        'pledge_nature' =>$pledge_nature[$i],
        'pledge_date' =>$pledge_date[$i],
        'pledge_date_maturity' =>$pledge_date_maturity[$i],
        'pledge_value' =>$pledge_value[$i],
        
        'pledgor_value' =>$pledgor_value[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End

// 8 banking_claim_pro_details Header

if (!empty($pledgor_name)) {
 for ($i=0; $i < count($pledgor_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_pro_details')
    ->insertGetId([        
        'pro_date' =>$pro_date[$i],
        'revival_letter' =>$revival_letter[$i],
        'document_other' =>$document_other[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


//End




// if (!empty($laon_ac_bank)) {
//    for ($i=0; $i < count($laon_ac_bank); $i++) { 

//      $bank_cliam = DB::table('bank_cliam')
//      ->insertGetId([        

//         'date_of_default_bank' =>$date_of_default_bank[$i],
//         'date_of_npa_bank' =>$date_of_npa_bank[$i],
//         'date_of_breach_bank' =>$date_of_breach_bank[$i],
//         'date_of_default_amount_bank' =>$date_of_default_amount_bank[$i],
//         'due_date_bank' =>$due_date_bank[$i],
//         'date_demand_bank' =>$date_demand_bank[$i],

//         'rate_interest_bank' =>$rate_interest_bank[$i],
//         'penal_interest_bank' =>$penal_interest_bank[$i],
//         'other_charges_bank' =>$other_charges_bank[$i],
//         'charges_due_bank' =>$charges_due_bank[$i],
//         'total_amount_bank' =>$total_amount_bank[$i],
//         'date_of_app_lication_bank' =>$date_of_app_lication_bank[$i],
//         'date_of_sanction_bank' =>$date_of_sanction_bank[$i],

//         'nature_of_agreement_bank' =>$nature_of_agreement_bank[$i],
//         'laon_ac_bank' =>$laon_ac_bank[$i],


//         'claim_notice_id' => (session()->get('ClaimNoticeID')),
//         'claim_id' => $claimdetails_id,    
//         'created_id'        =>  Auth::user()->id,

//     ]); 
//  }
// }



return response()->json(['success' => 'ClaimDetails Updated successfully.']);
}




public function gettotal_outstandingamount(Request $request, $id = null)

{
    
    $outstanding_amount = DB::select("SELECT sum(outstanding_amount) AS total_amount FROM banking_account_detail WHERE is_deleted='N' and claim_notice_id = ".(session()->get('ClaimNoticeID')));

    $loan_details = DB::select("SELECT *,date_format(date_of_application_bank,'%d-%m-%Y') AS date_of_application_bank,date_format(date_of_sanction_bank,'%d-%m-%Y') AS date_of_sanction_bank  FROM banking_account_detail WHERE is_deleted='N' and claim_notice_id = ".(session()->get('ClaimNoticeID')));

    $rows = 
    [
        'outstanding_amount' => $outstanding_amount,
        'loan_details' => $loan_details,

    ];
    return response()->json($rows);
}
public function gettotal_outstandingamount_counter($id)
{
    // dd("SELECT sum(outstanding_amount) AS total_amount FROM banking_account_detail WHERE claim_notice_id = $id");
    $outstanding_amount = DB::select("SELECT sum(outstanding_amount) AS total_amount FROM banking_account_detail WHERE is_respondant='1' and claim_notice_id = ".$id." and created_id=".Auth::user()->id."");

    $loan_details = DB::select("SELECT *,date_format(date_of_application_bank,'%d-%m-%Y') AS date_of_application_bank,date_format(date_of_sanction_bank,'%d-%m-%Y') AS date_of_sanction_bank FROM banking_account_detail WHERE is_respondant='1' and claim_notice_id = ".$id." and created_id=".Auth::user()->id."");

    $rows = 
    [
        'outstanding_amount' => $outstanding_amount,
        'loan_details' => $loan_details,

    ];
    return response()->json($rows);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($claimnoticeid)
    {
        // echo $id;exit;
       $claimdetails = ClaimDetails::where('claimnoticeid', $claimnoticeid)->first();
       // dd($claimdetails);
       $claimdetails->delete();
       $reliefrequest = ReliefRequest::where('claimnoticeid', $claimnoticeid)->first();
       DB::delete('delete from banking_account_detail where claim_notice_id = ?',[$claimnoticeid]);
       if ($reliefrequest != null)
       {
       $reliefrequest->delete();
   }
       return redirect()->route('claimnotice.create')
       ->with('success','Claim & Relief Details Deleted Successfully.');
   }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savebankdetails(Request $request, $id = null)
    {


     $claimnoticeid =(session()->get('ClaimNoticeID'));
     $claimdetails_id = DB::table('claim_details')
     ->insertGetId([
        'claimnoticeid'        =>  $claimnoticeid,
        'total_amount_bank' =>$request->total_amount_bank,
        'created_id'        =>  Auth::user()->id,
        'user_id'        =>  Auth::user()->id
    ]);


     $bank_cliam_update = DB::table('banking_account_detail')
     ->where(['claim_notice_id'=>(session()->get('ClaimNoticeID'))])
     ->update(['claim_id' => $claimdetails_id]);

     

     return response()->json(['success' => 'Data Added successfully.']);

 }
  public function updatebankdetails(Request $request, $id = null)
    {


     $claimnoticeid =(session()->get('ClaimNoticeID'));
    //  $claimdetails_id = DB::table('claim_details')
    //  ->insertGetId([
    //     'claimnoticeid'        =>  $claimnoticeid,
    //     'total_amount_bank' =>$request->total_amount_bank,
    //     'created_id'        =>  Auth::user()->id,
    //     'user_id'        =>  Auth::user()->id
    // ]);


     $bank_cliam_update = DB::table('claim_details')
     ->where(['claimnoticeid'=>(session()->get('ClaimNoticeID'))])
     ->update(['total_amount_bank' => $request->total_amount_bank]);

     

     return response()->json(['success' => 'Data Added successfully.']);

 }
 
 public function loan_details_counter(Request $request, $id = null)
{
 // $claimnoticeid =(session()->get('ClaimNoticeID'));

 $claimnoticeid =$request->claimnoticeid;
 $claimdetails_id = DB::table('banking_account_detail')
 ->insertGetId([
    'is_respondant'=>1,
    'loan_acc_bank'        =>  $request->loan_acc_bank,
    'date_of_application_bank'        =>  $request->date_of_application_bank,
    'date_of_sanction_bank'        =>  $request->date_of_sanction_bank,
    'sanction_ammount'        =>  $request->sanction_ammount,
    'date_of_dafault'        =>  $request->date_of_dafault,
    'amount_as_account'        =>  $request->amount_as_account,
    'interest_bank'        =>  $request->interest_bank,
    'penel_interest_bank'        =>  $request->penel_interest_bank,
    'npa_date_bank'        =>  $request->npa_date_bank,

    'other_charges_bank'        =>  $request->other_charges_bank,
    'outstanding_amount'        =>  $request->outstanding_amount,
    'amount_as_date'        =>  $request->amount_as_date,
    'claim_notice_id' => $claimnoticeid,
    'created_id'        =>  Auth::user()->id,
    'user_id'        =>  Auth::user()->id
]);



 $security_type = $request->security_type;
 $mortgage_property = $request->mortgage_property;
 $mortgage_schedule = $request->mortgage_schedule;
 $mortgage_value_bank = $request->mortgage_value_bank;
 $mortgage_name = $request->mortgage_name;
 $mortgage_date = $request->mortgage_date;
 $hypo_property = $request->hypo_property;
 $hypo_schedule = $request->hypo_schedule;
 $hypo_value = $request->hypo_value;
 $hypo_name = $request->hypo_name;
 $hypo_date = $request->hypo_date;
 $hypo_engine = $request->hypo_engine;
 $hypo_chassis = $request->hypo_chassis;
 $guarntee_name = $request->guarntee_name;
 $guarntor_agreement = $request->guarntor_agreement;
 $others_details = $request->others_details;
 $others_date = $request->others_date;

 if (!empty($security_type)) {
  $count=  count($security_type);
  for ($i=0; $i < $count; $i++) { 
    //dd($security_type);
   $security_types = DB::table('security_type')
   ->insertGetId([ 
        'is_respondant'=>1, 
       'security_type' =>$security_type[$i],
       'mortgage_property' =>$mortgage_property[$i],
       'mortgage_schedule' =>$mortgage_schedule[$i],
       'mortgage_value_bank' =>$mortgage_value_bank[$i],
       'mortgage_name' =>$mortgage_name[$i],
       'mortgage_date' =>$mortgage_date[$i],
       'hypo_schedule' =>$hypo_schedule[$i],
       'hypo_value' =>$hypo_value[$i],
       'hypo_name' =>$hypo_name[$i],
       'hypo_date' =>$hypo_date[$i],
       'hypo_engine' =>$hypo_engine[$i],
       'hypo_chassis' =>$hypo_chassis[$i],
       'guarntee_name' =>$guarntee_name[$i],
       'guarntor_agreement' =>$guarntor_agreement[$i],
       'others_details' =>$others_details[$i],
       'others_date' =>$others_date[$i],



       'claim_notice_id' => $claimnoticeid,
       'claim_id' => $claimdetails_id,    
       'created_id'        =>  Auth::user()->id,

   ]); 
}
}

$renewal_date = $request->renewal_date;
if (!empty($renewal_date[0])) {
    $count=  count($renewal_date);
    for ($i=0; $i < $count; $i++) { 

       $renewal_dates = DB::table('renewal_date')
       ->insertGetId([  
        'is_respondant'=>1,
        'renewal_date' =>$renewal_date[$i],



        'claim_notice_id' => $claimnoticeid,
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
   }
}


$revival_date = $request->revival_date;

if (!empty($revival_date[0])) {
 $count=  count($revival_date);
 for ($i=0; $i < $count; $i++) { 

   $revival_dates= DB::table('revival_date')
   ->insertGetId([  
    'is_respondant'=>1,
    'revival_date' =>$revival_date[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

$legal_notice = $request->legal_notice;

if (!empty($legal_notice[0])) {
  $count=  count($legal_notice);
  for ($i=0; $i < $count; $i++) {

   $other_document = DB::table('legal_notice')
   ->insertGetId([  
    'is_respondant'=>1,
    'legal_notice' =>$legal_notice[$i],



    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}
$other_document = $request->other_document;
if (!empty($other_document[0])) {
 $count=  count($other_document);
 for ($i=0; $i < $count; $i++) {

   $other_documents = DB::table('other_document')
   ->insertGetId([  
    'is_respondant'=>1,
    'other_document' =>$other_document[$i],




    'claim_notice_id' => $claimnoticeid,
    'claim_id' => $claimdetails_id,    
    'created_id'        =>  Auth::user()->id,

]); 
}
}

return response()->json(['success' => 'Data Added successfully.']);


}
 public function savebankdetails_counter(Request $request, $id = null)
    {
//dd$request->claim_id); 

     $claimnoticeid =$request->claim_id;
     $claimdetails_id = DB::table('claim_details')
     ->insertGetId([
        'is_respondant'=>1,
        'claimnoticeid'        =>  $claimnoticeid,
        'total_amount_bank' =>$request->total_amount_bank,
        'created_id'        =>  Auth::user()->id,
        'user_id'        =>  Auth::user()->id
    ]);


     $bank_cliam_update = DB::table('banking_account_detail')
     ->where(['claim_notice_id'=> $claimnoticeid,'is_respondant'=>'1','user_id'=>Auth::user()->id])
     ->update(['claim_id' => $claimdetails_id]); 

     

     return response()->json(['success' => 'Data Added successfully.']);

 }
 public function delete_bankloan($id)
 {
    $table = DB::table('banking_account_detail')
   ->where('id' , $id)
   ->update(['is_deleted'        =>  'Y',
    'deleted_at'        =>  NOW(),
    'updated_id'        =>  Auth::user()->id
    
]);
   return response()->json(['success' => 'Data Deleted successfully.']);
 }
}
