<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ClaimDetails;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
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
    //     'npa_date'        =>  $request->npa_date,
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
        'claimamount'        =>  $request->claimamount,
        'contractdate'        =>  $request->contractdate,
        'bill_of_lading_details_date_no'        =>  $request->bill_of_lading_details_date_no,
        'passenger_ticket_booking_no'        =>  $request->passenger_ticket_booking_no,
        'passenger_ticket_booking_date'        =>  $request->passenger_ticket_booking_date,
        'due_date'        =>  $request->due_date,
        'claimnoticeid'        =>  $claimnoticeid,
        'noticedate'        =>  $request->noticedate,
        // //Form 3:
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
        // 'npa_date'        =>  $request->npa_date,
        // 'date_of_breach'        =>  $request->date_of_breach,
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
         // 'penel_interest' =>$request->penel_interest,
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
        'immovable_possessor' => $immovable_possessor[$i],
        'immovable_owner' =>$immovable_owner[$i],
        'immovable_description' =>$immovable_description[$i],
        'immovable_schedule' =>$immovable_schedule[$i],
        'immovable_market' =>$immovable_market[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}
 
$loan_acc_bank = $request->loan_acc_bank;
$date_of_application_bank = $request->date_of_application_bank;
$date_of_sanction_bank = $request->date_of_sanction_bank;
$nature_of_aggrement_bank = $request->nature_of_aggrement_bank;
$date_of_default_bank = $request->date_of_default_bank;
$npa_date_bank = $request->npa_date_bank;
$date_of_breach_bank = $request->date_of_breach_bank;
$amount_due_per_account_bank = $request->amount_due_per_account_bank;
$date_of_demand_bank = $request->date_of_demand_bank;
$rate_of_interest_bank = $request->rate_of_interest_bank;
$penel_interest_bank = $request->penel_interest_bank;
$due_date_bank = $request->due_date_bank;
if (!empty($loan_acc_bank)) {
   for ($i=0; $i < count($loan_acc_bank); $i++) { 

     $family_claim = DB::table('banking_account_detail')
     ->insertGetId([        
        'loan_acc_bank' =>$loan_acc_bank[$i],
        'date_of_application_bank' =>$date_of_application_bank[$i],
        'date_of_sanction_bank' =>$date_of_sanction_bank[$i],
        'nature_of_aggrement_bank' =>$nature_of_aggrement_bank[$i],
        'date_of_default_bank' =>$date_of_default_bank[$i],
        'npa_date_bank' =>$npa_date_bank[$i],
        'date_of_breach_bank' =>$date_of_breach_bank[$i],
        'amount_due_per_account_bank' =>$amount_due_per_account_bank[$i],
        'date_of_demand_bank' =>$date_of_demand_bank[$i],
        'rate_of_interest_bank' =>$rate_of_interest_bank[$i],
        'penel_interest_bank' =>$penel_interest_bank[$i],
        'due_date_bank' =>$due_date_bank[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}




if (!empty($movable_possessor)) {
   for ($i=0; $i < count($movable_possessor); $i++) { 

     $family_claim = DB::table('family_claim_movable')
     ->insertGetId([        
        'movable_possessor' =>$movable_possessor[$i],
        'movable_owner' =>$movable_owner[$i],
        'movable_value' =>$movable_value[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
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
$description_mort_bank = $request->description_mort_bank;
$value_mort_bank = $request->value_mort_bank;
$schedule_mort_bank = $request->schedule_mort_bank;
$date_mort_bank = $request->date_mort_bank;
$description_hypo_bank = $request->description_hypo_bank;
$value_hypo_bank = $request->value_hypo_bank;
$vehicle_hypo_bank = $request->vehicle_hypo_bank;
$location_hypo = $request->location_hypo;
$chassis_hypo_bank = $request->chassis_hypo_bank;
$date_hypo_bank = $request->date_hypo_bank;
$pledge_nature = $request->pledge_nature;
$pledge_date = $request->pledge_date;
$pledge_date_maturity = $request->pledge_date_maturity;
$pledge_value = $request->pledge_value;
$personnel_guar_name = $request->personnel_guar_name;
$personnel_dob = $request->personnel_dob;
$personnel_father = $request->personnel_father;
$personnel_adddress = $request->personnel_adddress;
$company_guar_name = $request->company_guar_name;
$compnay_cid = $request->compnay_cid;
$company_address = $request->company_address;
$company_date = $request->company_date;
$mortgage_mortgagor = $request->mortgage_mortgagor;
$mortgage_company = $request->mortgage_company;
$mortgage_property = $request->mortgage_property;
$mortgage_schedule = $request->mortgage_schedule;
$hypo_name = $request->hypo_name;
$hypo_dob = $request->hypo_dob;
$hypo_father = $request->hypo_father;
$hypo_address = $request->hypo_address;
$hypo_description = $request->hypo_description;
$value_hypo_bank = $request->value_hypo_bank;


$hypo_location = $request->hypo_location;
$hypo_vehicle = $request->hypo_vehicle;
$hypo_chassis = $request->hypo_chassis;
$hypo_date_hypo = $request->hypo_date_hypo;
$pledgor_name = $request->pledgor_name;
$pledgor_dob = $request->pledgor_dob;
$pledgor_father = $request->pledgor_father;
$pledgor_address = $request->pledgor_address;
$pledgor_nature = $request->pledgor_nature;

$pledgor_date = $request->pledgor_date;
$pledgor_date_maturity = $request->pledgor_date_maturity;
$pledgor_value = $request->pledgor_value;
$pro_date = $request->pro_date;
$revival_letter = $request->revival_letter;
$document_other = $request->document_other;
$date_of_default_bank = $request->date_of_default_bank;
$date_of_npa_bank = $request->date_of_npa_bank;
$date_of_breach_bank = $request->date_of_breach_bank;
$date_of_default_amount_bank = $request->date_of_default_amount_bank;
$due_date_bank = $request->due_date_bank;
$date_demand_bank = $request->date_demand_bank;
$rate_interest_bank = $request->rate_interest_bank;
$penal_interest_bank = $request->penal_interest_bank;
$other_charges_bank = $request->other_charges_bank;
$charges_due_bank = $request->charges_due_bank;
$total_amount_bank = $request->total_amount_bank;
$date_of_app_lication_bank = $request->date_of_app_lication_bank;
$date_of_sanction_bank = $request->date_of_sanction_bank;
$nature_of_agreement_bank = $request->nature_of_agreement_bank;
$laon_ac_bank = $request->laon_ac_bank;

//1 Mortage Header

if (!empty($description_mort_bank)) {
   for ($i=0; $i < count($description_mort_bank); $i++) { 

    $bank_cliam = DB::table('banking_claim_mort')
    ->insertGetId([        
        'description_mort_bank' => $description_mort_bank[$i],
        'value_mort_bank' =>$value_mort_bank[$i],
        'schedule_mort_bank' =>$schedule_mort_bank[$i],
        'date_mort_bank' =>$date_mort_bank[$i],
         'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
        'mortgage_company' =>$mortgage_company[$i],
        'mortgage_property' =>$mortgage_property[$i],
        'mortgage_schedule' =>$mortgage_schedule[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


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

if (!empty($hypo_name)) {
   for ($i=0; $i < count($hypo_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_hypo_details')
    ->insertGetId([        
        'hypo_name' =>$hypo_name[$i],
        'hypo_dob' =>$hypo_dob[$i],
        'hypo_father' =>$hypo_father[$i],
        'hypo_address' =>$hypo_address[$i],
        'hypo_description' =>$hypo_description[$i],
        'hypo_location' =>$hypo_location[$i],
        'hypo_vehicle' =>$hypo_vehicle[$i],
        'hypo_chassis' =>$hypo_chassis[$i],
        'hypo_date_hypo' =>$hypo_date_hypo[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


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



return response()->json(['success' => 'Data Added Successfully.']);
        // }


        //       


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
        // //Form 3:
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
         // 'penel_interest' =>$request->penel_interest,
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

$claimdetails_id = $id;


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
        'immovable_possessor' => $immovable_possessor[$i],
        'immovable_owner' =>$immovable_owner[$i],
        'immovable_description' =>$immovable_description[$i],
        'immovable_schedule' =>$immovable_schedule[$i],
        'immovable_market' =>$immovable_market[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}
$loan_acc_bank = $request->loan_acc_bank;
$date_of_application_bank = $request->date_of_application_bank;
$date_of_sanction_bank = $request->date_of_sanction_bank;
$nature_of_aggrement_bank = $request->nature_of_aggrement_bank;
$date_of_default_bank = $request->date_of_default_bank;
$npa_date_bank = $request->npa_date_bank;
$date_of_breach_bank = $request->date_of_breach_bank;
$amount_due_per_account_bank = $request->amount_due_per_account_bank;
$date_of_demand_bank = $request->date_of_demand_bank;
$rate_of_interest_bank = $request->rate_of_interest_bank;
$penel_interest_bank = $request->penel_interest_bank;
$due_date_bank = $request->due_date_bank;
if (!empty($loan_acc_bank)) {
   for ($i=0; $i < count($loan_acc_bank); $i++) { 

     $family_claim = DB::table('banking_account_detail')
     ->insertGetId([        
        'loan_acc_bank' =>$loan_acc_bank[$i],
        'date_of_application_bank' =>$date_of_application_bank[$i],
        'date_of_sanction_bank' =>$date_of_sanction_bank[$i],
        'nature_of_aggrement_bank' =>$nature_of_aggrement_bank[$i],
        'date_of_default_bank' =>$date_of_default_bank[$i],
        'npa_date_bank' =>$npa_date_bank[$i],
        'date_of_breach_bank' =>$date_of_breach_bank[$i],
        'amount_due_per_account_bank' =>$amount_due_per_account_bank[$i],
        'date_of_demand_bank' =>$date_of_demand_bank[$i],
        'rate_of_interest_bank' =>$rate_of_interest_bank[$i],
        'penel_interest_bank' =>$penel_interest_bank[$i],
        'due_date_bank' =>$due_date_bank[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}



if (!empty($movable_possessor)) {
   for ($i=0; $i < count($movable_possessor); $i++) { 

     $family_claim = DB::table('family_claim_movable')
     ->insertGetId([        
        'movable_possessor' =>$movable_possessor[$i],
        'movable_owner' =>$movable_owner[$i],
        'movable_value' =>$movable_value[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
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
$description_mort_bank = $request->description_mort_bank;
$value_mort_bank = $request->value_mort_bank;
$schedule_mort_bank = $request->schedule_mort_bank;
$date_mort_bank = $request->date_mort_bank;
$description_hypo_bank = $request->description_hypo_bank;
$value_hypo_bank = $request->value_hypo_bank;
$vehicle_hypo_bank = $request->vehicle_hypo_bank;
$location_hypo = $request->location_hypo;
$chassis_hypo_bank = $request->chassis_hypo_bank;
$date_hypo_bank = $request->date_hypo_bank;
$pledge_nature = $request->pledge_nature;
$pledge_date = $request->pledge_date;
$pledge_date_maturity = $request->pledge_date_maturity;
$pledge_value = $request->pledge_value;
$personnel_guar_name = $request->personnel_guar_name;
$personnel_dob = $request->personnel_dob;
$personnel_father = $request->personnel_father;
$personnel_adddress = $request->personnel_adddress;
$company_guar_name = $request->company_guar_name;
$compnay_cid = $request->compnay_cid;
$company_address = $request->company_address;
$company_date = $request->company_date;
$mortgage_mortgagor = $request->mortgage_mortgagor;
$mortgage_company = $request->mortgage_company;
$mortgage_property = $request->mortgage_property;
$mortgage_schedule = $request->mortgage_schedule;
$hypo_name = $request->hypo_name;
$hypo_dob = $request->hypo_dob;
$hypo_father = $request->hypo_father;
$hypo_address = $request->hypo_address;
$hypo_description = $request->hypo_description;
$value_hypo_bank = $request->value_hypo_bank;


$hypo_location = $request->hypo_location;
$hypo_vehicle = $request->hypo_vehicle;
$hypo_chassis = $request->hypo_chassis;
$hypo_date_hypo = $request->hypo_date_hypo;
$pledgor_name = $request->pledgor_name;
$pledgor_dob = $request->pledgor_dob;
$pledgor_father = $request->pledgor_father;
$pledgor_address = $request->pledgor_address;
$pledgor_nature = $request->pledgor_nature;

$pledgor_date = $request->pledgor_date;
$pledgor_date_maturity = $request->pledgor_date_maturity;
$pledgor_value = $request->pledgor_value;
$pro_date = $request->pro_date;
$revival_letter = $request->revival_letter;
$document_other = $request->document_other;
$date_of_default_bank = $request->date_of_default_bank;
$date_of_npa_bank = $request->date_of_npa_bank;
$date_of_breach_bank = $request->date_of_breach_bank;
$date_of_default_amount_bank = $request->date_of_default_amount_bank;
$due_date_bank = $request->due_date_bank;
$date_demand_bank = $request->date_demand_bank;
$rate_interest_bank = $request->rate_interest_bank;
$penal_interest_bank = $request->penal_interest_bank;
$other_charges_bank = $request->other_charges_bank;
$charges_due_bank = $request->charges_due_bank;
$total_amount_bank = $request->total_amount_bank;
$date_of_app_lication_bank = $request->date_of_app_lication_bank;
$date_of_sanction_bank = $request->date_of_sanction_bank;
$nature_of_agreement_bank = $request->nature_of_agreement_bank;
$laon_ac_bank = $request->laon_ac_bank;

// if (!empty($laon_ac_bank)) {
//    for ($i=0; $i < count($laon_ac_bank); $i++) { 

//      $bank_cliam = DB::table('bank_cliam')
//      ->insertGetId([        
//         'description_mort_bank' => $description_mort_bank[$i],
//         'value_mort_bank' =>$value_mort_bank[$i],
//         'schedule_mort_bank' =>$schedule_mort_bank[$i],
//         'date_mort_bank' =>$date_mort_bank[$i],
//         'description_hypo_bank' =>$description_hypo_bank[$i],
//         'value_hypo_bank' =>$value_hypo_bank[$i],
//         'vehicle_hypo_bank' =>$vehicle_hypo_bank[$i],
//         'location_hypo' =>$location_hypo[$i],
//         'chassis_hypo_bank' =>$chassis_hypo_bank[$i],
//         'date_hypo_bank' =>$date_hypo_bank[$i],
//         'pledge_nature' =>$pledge_nature[$i],
//         'pledge_date' =>$pledge_date[$i],
//         'pledge_date_maturity' =>$pledge_date_maturity[$i],
//         'pledge_value' =>$pledge_value[$i],
//         'personnel_guar_name' =>$personnel_guar_name[$i],
//         'personnel_dob' =>$personnel_dob[$i],
//         'personnel_father' =>$personnel_father[$i],
//         'personnel_adddress' =>$personnel_adddress[$i],
//         'company_guar_name' =>$company_guar_name[$i],
//         'compnay_cid' =>$compnay_cid[$i],
//         'company_address' =>$company_address[$i],
//         'company_date' =>$company_date[$i],
//         'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
//         'mortgage_company' =>$mortgage_company[$i],
//         'mortgage_property' =>$mortgage_property[$i],
//         'mortgage_schedule' =>$mortgage_schedule[$i],
//         'hypo_name' =>$hypo_name[$i],
//         'hypo_dob' =>$hypo_dob[$i],
//         'hypo_father' =>$hypo_father[$i],
//         'hypo_address' =>$hypo_address[$i],
//         'hypo_description' =>$hypo_description[$i],
//         'hypo_location' =>$hypo_location[$i],
//         'hypo_vehicle' =>$hypo_vehicle[$i],
//         'hypo_chassis' =>$hypo_chassis[$i],
//         'hypo_date_hypo' =>$hypo_date_hypo[$i],
//         'pledgor_name' =>$pledgor_name[$i],
//         'pledgor_dob' =>$pledgor_dob[$i],
//         'pledgor_father' =>$pledgor_father[$i],
//         'pledgor_address' =>$pledgor_address[$i],
//         'pledgor_nature' =>$pledgor_nature[$i],
//         'pledgor_date' =>$pledgor_date[$i],
//         'pledgor_date_maturity' =>$pledgor_date_maturity[$i],
//         'pledgor_value' =>$pledgor_value[$i],
//         'pro_date' =>$pro_date[$i],
//         'revival_letter' =>$revival_letter[$i],
//         'document_other' =>$document_other[$i],

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


//1 Mortage Header

if (!empty($description_mort_bank)) {
   for ($i=0; $i < count($description_mort_bank); $i++) { 

    $bank_cliam = DB::table('banking_claim_mort')
    ->insertGetId([        
        'description_mort_bank' => $description_mort_bank[$i],
        'value_mort_bank' =>$value_mort_bank[$i],
        'schedule_mort_bank' =>$schedule_mort_bank[$i],
        'date_mort_bank' =>$date_mort_bank[$i],
         'mortgage_mortgagor' =>$mortgage_mortgagor[$i],
        'mortgage_company' =>$mortgage_company[$i],
        'mortgage_property' =>$mortgage_property[$i],
        'mortgage_schedule' =>$mortgage_schedule[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


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

if (!empty($hypo_name)) {
   for ($i=0; $i < count($hypo_name); $i++) { 

    $bank_cliam = DB::table('banking_claim_hypo_details')
    ->insertGetId([        
        'hypo_name' =>$hypo_name[$i],
        'hypo_dob' =>$hypo_dob[$i],
        'hypo_father' =>$hypo_father[$i],
        'hypo_address' =>$hypo_address[$i],
        'hypo_description' =>$hypo_description[$i],
        'value_hypo_bank' =>$value_hypo_bank[$i],

         'value_hypo_bank' =>$value_hypo_bank[$i],
        'hypo_location' =>$hypo_location[$i],
        'hypo_vehicle' =>$hypo_vehicle[$i],
        'hypo_chassis' =>$hypo_chassis[$i],
        'hypo_date_hypo' =>$hypo_date_hypo[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'claim_id' => $claimdetails_id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
}
}


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
        'pledgor_value' =>$pledgor_value[$i],
        'pledge_nature' =>$pledge_nature[$i],
        'pledge_date' =>$pledge_date[$i],
        'pledge_date_maturity' =>$pledge_date_maturity[$i],
        'pledge_value' =>$pledge_value[$i],
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



return response()->json(['success' => 'ClaimDetails Updated Successfully.']);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $claimdetails = ClaimDetails::find($id);
     $claimdetails->delete();
     return redirect()->route('claimnotice.create')
     ->with('success','Claimant Details Deleted Successfully.');
 }
}
