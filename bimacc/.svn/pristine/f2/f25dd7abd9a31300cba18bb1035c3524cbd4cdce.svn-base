<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ReliefRequest;
use DB;
use Auth;
use Role;
use App\models\User;
use Session;

class ReliefRequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'recovery_of_money' => 'required',
        //     'simple_compound' => 'required',            
        //     'penal_interest' => 'required',                        
        //     'punitive_damages_liq' => 'required', 
        //     'specific_perfomances' => 'required', 
        //     'recident_backwages' => 'required', 
        //     'CANCELLATION_OF_ALOTTMENT_OF_SHARES' => 'required', 
        //     'SETOFF_SAND_COUNTERCLAIM' => 'required', 
        //     'PARTITION_AND_DISTRIBUTION_OF_ASSETS' => 'required', 

        // ]);

        // $penal_interest = str_replace('%', '', $request->penal_interest);

        // $ReliefRequests = new ReliefRequest();
        // $ReliefRequests->recovery_of_money  = $request->recovery_of_money;
        // $ReliefRequests->simple_compound = $request->simple_compound;
        // $ReliefRequests->pun_loquid_unliquid = $request->pun_loquid_unliquid;
        // $ReliefRequests->penal_interest = $penal_interest;
        // $ReliefRequests->punitive_damages_liq = $request->punitive_damages_liq;
        // $ReliefRequests->specific_perfomances = $request->specific_perfomances;
        // $ReliefRequests->recident_backwages = $request->recident_backwages;
        // $ReliefRequests->CANCELLATION_OF_ALOTTMENT_OF_SHARES = $request->CANCELLATION_OF_ALOTTMENT_OF_SHARES;   
        // $ReliefRequests->SETOFF_SAND_COUNTERCLAIM = $request->SETOFF_SAND_COUNTERCLAIM;
        // $ReliefRequests->PARTITION_AND_DISTRIBUTION_OF_ASSETS = $request->PARTITION_AND_DISTRIBUTION_OF_ASSETS;
        // $ReliefRequests->DECLARATION = $request->DECLARATION;
        // $ReliefRequests->ANY_OTHER_RELIEF_AS_SPECIFIED = $request->ANY_OTHER_RELIEF_AS_SPECIFIED;  
        // $ReliefRequests->created_id = Auth::user()->id;        
        // $ReliefRequests->user_id = Auth::user()->id;
        // $ReliefRequests->claimnoticeid = (session()->get('ClaimNoticeID'));



        $form_data = array(
            'freightrefundamount' => $request->freightrefundamount,
            'freightrefundamountinterest' => $request->freightrefundamountinterest,
            'claim_for_delivery_of_cargo'        =>  $request->claim_for_delivery_of_cargo,
            'cargo_nature'        =>  $request->cargo_nature,
            'nature_and_details_of_cargo'        =>  $request->nature_and_details_of_cargo,
            'claim_for_payment_of_freight_amount'        =>  $request->claim_for_payment_of_freight_amount,
            'freight_amount_interest'        =>  $request->freight_amount_interest,
            'damage_amount'        =>  $request->damage_amount,
            'damage_amount_interest'        =>  $request->damage_amount_interest,
            'remarks'        =>  $request->remarks,
            'estimated_value_of_contract'        =>  $request->estimated_value_of_contract,
            // //form 3
            'debt_recovery' => $request->debt_recovery,
            'rate_of_interest' => $request->rate_of_interest,
            'sale_of_security' => $request->sale_of_security,
            'amount_of_debt' => $request->amount_of_debt,
            'damages_rs' => $request->damages_rs,
            'rate_of_penal_interest' =>$request->rate_of_penal_interest,
            // //form 4
            'nature_of_goods' => $request->nature_of_goods,
            'quantity_of_goods' => $request->quantity_of_goods,
            'replacement_of_goods' => $request->replacement_of_goods,
            'refund_of_price' => $request->refund_of_price,
            'price_of_goods' => $request->price_of_goods,
            'price_of_goods_interest' => $request->price_of_goods_interest,
            'damages' => $request->damages,
            // //form5
            'claim_for_contract_price' => $request->claim_for_contract_price,
            'claim_for_contract_price_interest' => $request->claim_for_contract_price_interest,
            'escalation_of_costs' => $request->escalation_of_costs,
            'claim_for_refund' => $request->claim_for_refund,
            'refund_withinterest' => $request->refund_withinterest,
            //'refund_withoutinterest' => $request->refund_withoutinterest,
            'claim_for_damages' => $request->claim_for_damages,
            'to_vc_sight_estimated_value_of_contract' => $request->to_vc_sight_estimated_value_of_contract,
            'specific_performance_of_contract' => $request->specific_performance_of_contract,
            'specific_estimated_value_of_contract' => $request->specific_estimated_value_of_contract,
            'tocancel_estimated_value_of_contract' => $request->tocancel_estimated_value_of_contract,
            'amount_guaranteed' => $request->amount_guaranteed,
            // //form6
            'dissolution_of_firm' => $request->dissolution_of_firm,
            'reconstitution_of_firm' => $request->reconstitution_of_firm,
            'cancellation_of_expulsion_of_partner' => $request->cancellation_of_expulsion_of_partner,
            'cancellation_of_induction_of_partner' => $request->cancellation_of_induction_of_partner,
            'rendition_of_accounts' => $request->rendition_of_accounts,
            'valuation_of_firm_and_or_goodwill' => $request->valuation_of_firm_and_or_goodwill,
            'return_of_assets_value' => $request->return_of_assets_value,
            'return_of_assets_value_interest' => $request->return_of_assets_value_interest,
            //'return_of_assets_value_withoutinterest' => $request->return_of_assets_value_withoutinterest,
            'claim_for_capital_share' => $request->claim_for_capital_share,
            'claim_for_capital_share_interest' => $request->claim_for_capital_share_interest,
            //'claim_for_capital_share_withoutinterest' => $request->claim_for_capital_share_withoutinterest,
            'claim_for_share_of_profits' => $request->claim_for_share_of_profits,
            'claim_for_share_of_profits_interest' => $request->claim_for_share_of_profits_interest,
            //'claim_for_share_of_profits_withoutinterest' => $request->claim_for_share_of_profits_withoutinterest,
            // //form 7
            'for_allotment_of_shares_stock' => $request->for_allotment_of_shares_stock,
            'for_cancellation_of_allotments' => $request->for_cancellation_of_allotments,
            'compel_promoters_to_purchase_ofinvestors_shares' => $request->compel_promoters_to_purchase_ofinvestors_shares,
            'compel_or_cancel_push_or_put_options' => $request->compel_or_cancel_push_or_put_options,
            'for_company_to_buy_back_of_shares' => $request->for_company_to_buy_back_of_shares,
            'demand_valuation_of_shares' => $request->demand_valuation_of_shares,
            'demand_redemption_of_preference_shares_or_debentures' => $request->demand_redemption_of_preference_shares_or_debentures,
            'chairman_and_key_employees' => $request->chairman_and_key_employees,
            'general_meetings' => $request->general_meetings,
            'for_enforcement_of_preferential_rights' => $request->for_enforcement_of_preferential_rights,
            'demand_to_move_resolutions' => $request->demand_to_move_resolutions,
            'agreement_value' => $request->agreement_value,
            'aggregate_value_of_debentures' => $request->aggregate_value_of_debentures,
            // //form8
            'claim_subs_contrib_amount' => $request->claim_subs_contrib_amount,
            'claim_subs_contrib_amount_interest' => $request->claim_subs_contrib_amount_interest,
            //'claim_subs_contrib_amount_withoutinterest' => $request->claim_subs_contrib_amount_withoutinterest,
            'claim_refund_deposit_amount' => $request->claim_refund_deposit_amount,
            'claim_refund_deposit_amount_interest' => $request->claim_refund_deposit_amount_interest,
            //'claim_refund_deposit_amount_withoutinterest' => $request->claim_refund_deposit_amount_withoutinterest,
            'claim_for_admission_and_removal_of_members' => $request->claim_for_admission_and_removal_of_members,
            'claim_to_remove_or_reinstate_office_bearers' => $request->claim_to_remove_or_reinstate_office_bearers,
            'claim_for_holding_or_postponement_of_elections' => $request->claim_for_holding_or_postponement_of_elections,
            'claim_to_appoint_auditors_or_investigators' => $request->claim_to_appoint_auditors_or_investigators,
            'claim_to_appoint_auditors' => $request->claim_to_appoint_auditors,
            'claim_to_render_accounts' => $request->claim_to_render_accounts,
            'claim_against_members_for_damages_and_nuisance' => $request->claim_against_members_for_damages_and_nuisance,
            'claim_to_carryout_repairs_or_renovation' => $request->claim_to_carryout_repairs_or_renovation,
            // //form 9
            'claim_reinstatement' => $request->claim_reinstatement,
            'claim_for_salary_and_benefits' => $request->claim_for_salary_and_benefits,
            'value_of_stock_options' => $request->value_of_stock_options,
            'emd_amount' => $request->emd_amount,
            'estimated_value_of_data' => $request->estimated_value_of_data,
            // //form 10 
            'eid_claim_for_contract_price' => $request->eid_claim_for_contract_price,
            'eid_claim_for_contract_price_interest' => $request->eid_claim_for_contract_price_interest,
            //'eid_claim_for_contract_price_withoutinterest' => $request->eid_claim_for_contract_price_withoutinterest,
            'eid_claim_for_refund' => $request->eid_claim_for_refund,
            'eid_claim_for_refund_interest' => $request->eid_claim_for_refund_interest,
            //'eid_claim_for_refund_withoutinterest' => $request->eid_claim_for_refund_withoutinterest,
            'claim_for_escalation_of_costs' => $request->claim_for_escalation_of_costs,            
            'to_terminate_contract' => $request->to_terminate_contract,
            'to_vacate_contractual_site' => $request->to_vacate_contractual_site,         
            'to_claim_for_specific_performance_to_purchase_power' => $request->to_claim_for_specific_performance_to_purchase_power,
            'to_return_materials' => $request->to_return_materials,
            // //form 11
            'nature_of_property' => $request->nature_of_property,
            'extent' => $request->extent,
            'nop_value' => $request->nop_value,
            'rendition_and_distribution_of_mense_profits' => $request->rendition_and_distribution_of_mense_profits, 
            //form 12
            'claimforontractprice' => $request->claimforontractprice,
            'claimforcontractpriceinerest' => $request->claimforcontractpriceinerest,
            'to_cancel_performance_guarantees' => $request->to_cancel_performance_guarantees,
            //form 13
            'demand_for_licence_fee' => $request->demand_for_licence_fee,
            'demand_for_licence_fee_interest' => $request->demand_for_licence_fee_interest,
            'demand_to_stop_infringement' => $request->demand_to_stop_infringement,
            'demand_damages_for_infringement' => $request->demand_damages_for_infringement,
            'damages_for_breach_of_contract' => $request->damages_for_breach_of_contract,
            'demand_to_surrender_infringed_materials' => $request->demand_to_surrender_infringed_materials,
            //form 14
            'claim_for_refund_of_fare_or_freight' => $request->claim_for_refund_of_fare_or_freight,
            'claim_for_refund_of_fare_or_freight_interest' => $request->claim_for_refund_of_fare_or_freight_interest,
            'claim_for_payment_of_freight' => $request->claim_for_payment_of_freight,
            'claim_for_payment_of_freight_interest' => $request->claim_for_payment_of_freight_interest,
            'claim_for_payment_of_damages' => $request->claim_for_payment_of_damages,
            'claim_for_payment_of_damages_interest' => $request->claim_for_payment_of_damages_interest,
            'claim_for_demurrages' => $request->claim_for_demurrages,
            'claim_for_demurrages_interest' => $request->claim_for_demurrages_interest,
            'demanding_policy_claim_amount' => $request->demanding_policy_claim_amount,
            'demanding_surrender_value_amount' => $request->demanding_surrender_value_amount,
            'challenging_cancellation_of_policy' => $request->challenging_cancellation_of_policy,
            'subrogation_value' => $request->subrogation_value,            
            'claim_for_specific_performance' => $request->claim_for_specific_performance,
            // //form 15
            'money_claim_amount' => $request->money_claim_amount,
            'money_claim_amount_interest' => $request->money_claim_amount_interest,
            'rendition_of_accounts_contract_value' => $request->rendition_of_accounts_contract_value,
            'contract_value' => $request->contract_value,
            'cancellation_of_agreement' => $request->cancellation_of_agreement,
            //form 17
            'claim_for_consideration_amount' => $request->claim_for_consideration_amount,
            'claim_for_arrears_of_rent_maintenance_amount' => $request->claim_for_arrears_of_rent_maintenance_amount,
            'enforcement_of_mortgage_debt_amount' => $request->enforcement_of_mortgage_debt_amount,
            'claim_for_contractual_built_up_or_land_share_area' => $request->claim_for_contractual_built_up_or_land_share_area,
            'claim_for_contractual_built_up_or_land_share_value' => $request->claim_for_contractual_built_up_or_land_share_value,
            'division_of_property_area' => $request->division_of_property_area,
            'division_of_property_value' => $request->division_of_property_value,
            'redemption_of_mortgage_market_value_of_property' => $request->redemption_of_mortgage_market_value_of_property,
            'termination_of_lease_mortgage_joint_development_agreement' => $request->termination_of_lease_mortgage_joint_development_agreement,
            'sp_project_value' => $request->sp_project_value,
            'interest_amount' => $request->interest_amount,
            'damage_with_interest'=> $request->damage_with_interest,
            'benefit_withinterest'=> $request->benefit_withinterest,
            'benefit_withoutinterest'=> $request->benefit_withoutinterest,
            'termination'=> $request->termination,
            'average_value'=> $request->average_value,
            'average_value_interest'=> $request->average_value_interest,
            'average_value_withoutinterest'=> $request->average_value_withoutinterest,
            'restraint'=> $request->restraint,
            'claim_for_escalation_of_costs_interest'=> $request->claim_for_escalation_of_costs_interest,
            'claim_for_escalation_of_costs_withoutinterest'=> $request->claim_for_escalation_of_costs_withoutinterest,
            'claim_for_damages_interest'=> $request->claim_for_damages_interest,
            'to_invoke_guarntee'=> $request->to_invoke_guarntee,
            'return_material'=> $request->return_material,
            'substitute_contractor'=> $request->substitute_contractor,
            'value_claims'=> $request->value_claims,
            'value_claims_interest'=> $request->value_claims_interest,
            'value_claims_withoutinterest'=> $request->value_claims_withoutinterest,
                // insurance
            'demanding_policy_claim_amount_withoutinterest'=> $request->demanding_policy_claim_amount_withoutinterest,
            'demanding_policy_claim_amount_interest'=> $request->demanding_policy_claim_amount_interest,
            'demanding_surrender_value_amount_withoutinterest'=> $request->demanding_surrender_value_amount_withoutinterest,
            'demanding_surrender_value_amount_interest'=> $request->demanding_surrender_value_amount_interest,
            'challenging_cancellation_of_policy_interest'=> $request->challenging_cancellation_of_policy_interest,
            'challenging_cancellation_of_policy_withoutinterest'=> $request->challenging_cancellation_of_policy_withoutinterest,
            'subrogation_value_interest'=> $request->subrogation_value_interest,
            'subrogation_value_withoutinterest'=> $request->subrogation_value_withoutinterest,
            'value_performance'=> $request->value_performance,
                // technology
            'demand_to_stop_infringement_select'=> $request->demand_to_stop_infringement_select,
            'cancellation_license'=> $request->cancellation_license,
            'cancellation_license_value'=> $request->cancellation_license_value,
            'damages_for_breach_of_contract_interest'=> $request->damages_for_breach_of_contract_interest,
            'damages_for_breach_of_contract_withoutinterest'=> $request->damages_for_breach_of_contract_withoutinterest,
            'demand_for_licence_fee_withoutinterest'=> $request->demand_for_licence_fee_withoutinterest,
                 // real estate
            'claim_for_consideration_amount_interest'=> $request->claim_for_consideration_amount_interest,
            'claim_for_consideration_amount_withoutinterest'=> $request->claim_for_consideration_amount_withoutinterest,
            'claim_for_arrears_of_rent_maintenance_amount_interest'=> $request->claim_for_arrears_of_rent_maintenance_amount_interest,
            'claim_for_arrears_of_rent_maintenance_withoutinterest'=> $request->claim_for_arrears_of_rent_maintenance_withoutinterest,
            'enforcement_of_mortgage_debt_amount_int'=> $request->enforcement_of_mortgage_debt_amount_int,
            'enforcement_of_mortgage_debt_amount_withoutint'=> $request->enforcement_of_mortgage_debt_amount_withoutint,
            'claim_for_contractual_built_up_or_land_share_area_select'=> $request->claim_for_contractual_built_up_or_land_share_area_select,
            'redemption_of_mortgage'=> $request->redemption_of_mortgage,
            'possession_property'=> $request->possession_property,
            'possession_property_market_value'=> $request->possession_property_market_value,
            'termination_of_lease_mortgage_select'=> $request->termination_of_lease_mortgage_select,
            'damage_amount_interest_without'=> $request->damage_amount_interest_without,
            'Specific_perf'=> $request->Specific_perf,
            'division_of_property_unit'=> $request->division_of_property_unit,
                // Aviation
            'termination_of_contract'=> $request->termination_of_contract,
            'estimated_value_of_property'=> $request->estimated_value_of_property,
            'payment_consideration'=> $request->payment_consideration,
            'payment_consideration_withoutinterest'=> $request->payment_consideration_withoutinterest,
            'payment_consideration_interest'=> $request->payment_consideration_interest,
            'fightrefundamountamountinterestwithinterest'=> $request->fightrefundamountamountinterestwithinterest,
            'frightamountwithpoutinterest'=> $request->frightamountwithpoutinterest,
            'damageamountinterestwithinterest'=> $request->damageamountinterestwithinterest,
            'claim_for_demurrages_withoutinterest'=> $request->claim_for_demurrages_withoutinterest,
            'return_of_property'=> $request->return_of_property,
            'value_performance_int'=> $request->value_performance_int,
            'value_performance_withoutint'=> $request->value_performance_withoutint,
// media
            'claim_restrain'=> $request->claim_restrain,
            'claim_for_withoutinterest'=> $request->claim_for_withoutinterest,
            'claim_for_royalty'=> $request->claim_for_royalty,
            'claim_for_royalty_interest'=> $request->claim_for_royalty_interest,
            'claim_for_royalty_withoutinterest'=> $request->claim_for_royalty_withoutinterest,
            'money_claim_amount_withoutinterest'=> $request->money_claim_amount_withoutinterest,
            'cancellation_of_agreement_value'=> $request->cancellation_of_agreement_value,
            'rendition_and_distribution_of_mense_profits_int'=> $request->rendition_and_distribution_of_mense_profits_int,
            'rendition_and_distribution_of_mense_profits_withoutint'=> $request->rendition_and_distribution_of_mense_profits_withoutint,
            'to_vacate_contractual_site_value'=> $request->to_vacate_contractual_site_value,
            'to_terminate_contract_value'=> $request->to_terminate_contract_value,
            'return_material_value'=> $request->return_material_value,
            'redo_service'=> $request->redo_service,
            'value_infringing'=> $request->value_infringing,
            'value_infringing_withoutinterest'=> $request->value_infringing_withoutinterest,
            'estimated_value_of_material'=> $request->estimated_value_of_material,
            'claimforcontractpriceinerestwithoutinterest'=> $request->claimforcontractpriceinerestwithoutinterest,
            'aggregate_salary'=> $request->aggregate_salary,
            // community

            'claim_for_admission_and_removal_of_members_check'=> $request->claim_for_admission_and_removal_of_members_check,
             'claim_to_remove_or_reinstate_office_bearers_check'=> $request->claim_to_remove_or_reinstate_office_bearers_check,
              'claim_for_holding_or_postponement_of_elections_check'=> $request->claim_for_holding_or_postponement_of_elections_check,
               'claim_to_appoint_auditors_or_investigators_check'=> $request->claim_to_appoint_auditors_or_investigators_check,
                'claim_to_appoint_auditors_check'=> $request->claim_to_appoint_auditors_check,
                 'claim_to_render_accounts_check'=> $request->claim_to_render_accounts_check,
                  'claim_against_members_for_damages_and_nuisance_check'=> $request->aggregate_salary,
                   'claim_to_carryout_repairs_or_renovation_check'=> $request->claim_to_carryout_repairs_or_renovation_check,
            




            'created_id'        =>  Auth::user()->id,
            'user_id'        =>  Auth::user()->id,
            'claimnoticeid' =>(session()->get('ClaimNoticeID')),
        );

$ReliefRequest = ReliefRequest::create($form_data);
$contranceprice = $request->contract_price;
$claimforrefund = $request->claim_for_refund_lines;
$mortgagedproperty = $request->mortgaged_property;

//echo json_encode($mortgagedproperty); exit;


if (!empty($contranceprice)) {
   for ($i=0; $i < count($contranceprice); $i++) { 

     $contract_relief = DB::table('contract_relief')
     ->insertGetId([        
        'contract_price' => $contranceprice[$i],
        'claim_for_refund_lines' =>$claimforrefund[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $ReliefRequest->id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}

if (!empty($mortgagedproperty)) {
    for ($j=0; $j < count($mortgagedproperty); $j++) { 

     $banking_relief = DB::table('banking_relief')
     ->insertGetId([        
        'mortgaged_property' => $mortgagedproperty[$j],

        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $ReliefRequest->id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}

      // echo json_encode($ReliefRequest);exit;




return response()->json(['success' => 'Relief Request Successfully.']);
}



public function updatereliefrequest(Request $request)
{


        //echo $request->reliefrequestid; exit;
    $reliefrequestid = $request->reliefrequestid;

        //return count($request->contract_price); exit;

        //$reliefrequestid = $request->reliefrequestid;
    if ($reliefrequestid != "") 
    {

        $form_data = array(
           'freightrefundamount' => $request->freightrefundamount,
           'freightrefundamountinterest' => $request->freightrefundamountinterest,
           'claim_for_delivery_of_cargo'        =>  $request->claim_for_delivery_of_cargo,
           'cargo_nature'        =>  $request->cargo_nature,
           'nature_and_details_of_cargo'        =>  $request->nature_and_details_of_cargo,
           'claim_for_payment_of_freight_amount'        =>  $request->claim_for_payment_of_freight_amount,
           'freight_amount_interest'        =>  $request->freight_amount_interest,
           'damage_amount'        =>  $request->damage_amount,
           'damage_amount_interest'        =>  $request->damage_amount_interest,
           'remarks'        =>  $request->remarks,
           'estimated_value_of_contract'        =>  $request->estimated_value_of_contract,
            // //form 3
           'debt_recovery' => $request->debt_recovery,
           'rate_of_interest' => $request->rate_of_interest,
           'sale_of_security' => $request->sale_of_security,
           'amount_of_debt' => $request->amount_of_debt,
           'damages_rs' => $request->damages_rs,
           'rate_of_penal_interest' =>$request->rate_of_penal_interest,
            // //form 4
           'nature_of_goods' => $request->nature_of_goods,
           'quantity_of_goods' => $request->quantity_of_goods,
           'replacement_of_goods' => $request->replacement_of_goods,
           'refund_of_price' => $request->refund_of_price,
           'price_of_goods' => $request->price_of_goods,
           'price_of_goods_interest' => $request->price_of_goods_interest,
           'damages' => $request->damages,
            // //form5
           'claim_for_contract_price' => $request->claim_for_contract_price,
           'claim_for_contract_price_interest' => $request->claim_for_contract_price_interest,
           'escalation_of_costs' => $request->escalation_of_costs,
           'claim_for_refund' => $request->claim_for_refund,
           'refund_withinterest' => $request->refund_withinterest,
            //'refund_withoutinterest' => $request->refund_withoutinterest,
           'claim_for_damages' => $request->claim_for_damages,
           'to_vc_sight_estimated_value_of_contract' => $request->to_vc_sight_estimated_value_of_contract,
           'specific_performance_of_contract' => $request->specific_performance_of_contract,
           'specific_estimated_value_of_contract' => $request->specific_estimated_value_of_contract,
           'tocancel_estimated_value_of_contract' => $request->tocancel_estimated_value_of_contract,
           'amount_guaranteed' => $request->amount_guaranteed,
            // //form6
           'dissolution_of_firm' => $request->dissolution_of_firm,
           'reconstitution_of_firm' => $request->reconstitution_of_firm,
           'cancellation_of_expulsion_of_partner' => $request->cancellation_of_expulsion_of_partner,
           'cancellation_of_induction_of_partner' => $request->cancellation_of_induction_of_partner,
           'rendition_of_accounts' => $request->rendition_of_accounts,
           'valuation_of_firm_and_or_goodwill' => $request->valuation_of_firm_and_or_goodwill,
           'return_of_assets_value' => $request->return_of_assets_value,
           'return_of_assets_value_interest' => $request->return_of_assets_value_interest,
            //'return_of_assets_value_withoutinterest' => $request->return_of_assets_value_withoutinterest,
           'claim_for_capital_share' => $request->claim_for_capital_share,
           'claim_for_capital_share_interest' => $request->claim_for_capital_share_interest,
            //'claim_for_capital_share_withoutinterest' => $request->claim_for_capital_share_withoutinterest,
           'claim_for_share_of_profits' => $request->claim_for_share_of_profits,
           'claim_for_share_of_profits_interest' => $request->claim_for_share_of_profits_interest,
            //'claim_for_share_of_profits_withoutinterest' => $request->claim_for_share_of_profits_withoutinterest,
            // //form 7
           'for_allotment_of_shares_stock' => $request->for_allotment_of_shares_stock,
           'for_cancellation_of_allotments' => $request->for_cancellation_of_allotments,
           'compel_promoters_to_purchase_ofinvestors_shares' => $request->compel_promoters_to_purchase_ofinvestors_shares,
           'compel_or_cancel_push_or_put_options' => $request->compel_or_cancel_push_or_put_options,
           'for_company_to_buy_back_of_shares' => $request->for_company_to_buy_back_of_shares,
           'demand_valuation_of_shares' => $request->demand_valuation_of_shares,
           'demand_redemption_of_preference_shares_or_debentures' => $request->demand_redemption_of_preference_shares_or_debentures,
           'chairman_and_key_employees' => $request->chairman_and_key_employees,
           'general_meetings' => $request->general_meetings,
           'for_enforcement_of_preferential_rights' => $request->for_enforcement_of_preferential_rights,
           'demand_to_move_resolutions' => $request->demand_to_move_resolutions,
           'agreement_value' => $request->agreement_value,
           'aggregate_value_of_debentures' => $request->aggregate_value_of_debentures,
            // //form8
           'claim_subs_contrib_amount' => $request->claim_subs_contrib_amount,
           'claim_subs_contrib_amount_interest' => $request->claim_subs_contrib_amount_interest,
            //'claim_subs_contrib_amount_withoutinterest' => $request->claim_subs_contrib_amount_withoutinterest,
           'claim_refund_deposit_amount' => $request->claim_refund_deposit_amount,
           'claim_refund_deposit_amount_interest' => $request->claim_refund_deposit_amount_interest,
            //'claim_refund_deposit_amount_withoutinterest' => $request->claim_refund_deposit_amount_withoutinterest,
           'claim_for_admission_and_removal_of_members' => $request->claim_for_admission_and_removal_of_members,
           'claim_to_remove_or_reinstate_office_bearers' => $request->claim_to_remove_or_reinstate_office_bearers,
           'claim_for_holding_or_postponement_of_elections' => $request->claim_for_holding_or_postponement_of_elections,
           'claim_to_appoint_auditors_or_investigators' => $request->claim_to_appoint_auditors_or_investigators,
           'claim_to_appoint_auditors' => $request->claim_to_appoint_auditors,
           'claim_to_render_accounts' => $request->claim_to_render_accounts,
           'claim_against_members_for_damages_and_nuisance' => $request->claim_against_members_for_damages_and_nuisance,
           'claim_to_carryout_repairs_or_renovation' => $request->claim_to_carryout_repairs_or_renovation,
            // //form 9
           'claim_reinstatement' => $request->claim_reinstatement,
           'claim_for_salary_and_benefits' => $request->claim_for_salary_and_benefits,
           'value_of_stock_options' => $request->value_of_stock_options,
           'emd_amount' => $request->emd_amount,
           'estimated_value_of_data' => $request->estimated_value_of_data,
            // //form 10 
           'eid_claim_for_contract_price' => $request->eid_claim_for_contract_price,
           'eid_claim_for_contract_price_interest' => $request->eid_claim_for_contract_price_interest,
            //'eid_claim_for_contract_price_withoutinterest' => $request->eid_claim_for_contract_price_withoutinterest,
           'eid_claim_for_refund' => $request->eid_claim_for_refund,
           'eid_claim_for_refund_interest' => $request->eid_claim_for_refund_interest,
            //'eid_claim_for_refund_withoutinterest' => $request->eid_claim_for_refund_withoutinterest,
           'claim_for_escalation_of_costs' => $request->claim_for_escalation_of_costs,            
           'to_terminate_contract' => $request->to_terminate_contract,
           'to_vacate_contractual_site' => $request->to_vacate_contractual_site,         
           'to_claim_for_specific_performance_to_purchase_power' => $request->to_claim_for_specific_performance_to_purchase_power,
           'to_return_materials' => $request->to_return_materials,
            // //form 11
           'nature_of_property' => $request->nature_of_property,
           'extent' => $request->extent,
           'nop_value' => $request->nop_value,
           'rendition_and_distribution_of_mense_profits' => $request->rendition_and_distribution_of_mense_profits, 
            //form 12
           'claimforontractprice' => $request->claimforontractprice,
           'claimforcontractpriceinerest' => $request->claimforcontractpriceinerest,
           'to_cancel_performance_guarantees' => $request->to_cancel_performance_guarantees,
            //form 13
           'demand_for_licence_fee' => $request->demand_for_licence_fee,
           'demand_for_licence_fee_interest' => $request->demand_for_licence_fee_interest,
           'demand_to_stop_infringement' => $request->demand_to_stop_infringement,
           'demand_damages_for_infringement' => $request->demand_damages_for_infringement,
           'damages_for_breach_of_contract' => $request->damages_for_breach_of_contract,
           'demand_to_surrender_infringed_materials' => $request->demand_to_surrender_infringed_materials,
            //form 14
           'claim_for_refund_of_fare_or_freight' => $request->claim_for_refund_of_fare_or_freight,
           'claim_for_refund_of_fare_or_freight_interest' => $request->claim_for_refund_of_fare_or_freight_interest,
           'claim_for_payment_of_freight' => $request->claim_for_payment_of_freight,
           'claim_for_payment_of_freight_interest' => $request->claim_for_payment_of_freight_interest,
           'claim_for_payment_of_damages' => $request->claim_for_payment_of_damages,
           'claim_for_payment_of_damages_interest' => $request->claim_for_payment_of_damages_interest,
           'claim_for_demurrages' => $request->claim_for_demurrages,
           'claim_for_demurrages_interest' => $request->claim_for_demurrages_interest,
           'demanding_policy_claim_amount' => $request->demanding_policy_claim_amount,
           'demanding_surrender_value_amount' => $request->demanding_surrender_value_amount,
           'challenging_cancellation_of_policy' => $request->challenging_cancellation_of_policy,
           'subrogation_value' => $request->subrogation_value,            
           'claim_for_specific_performance' => $request->claim_for_specific_performance,
            // //form 15
           'money_claim_amount' => $request->money_claim_amount,
           'money_claim_amount_interest' => $request->money_claim_amount_interest,
           'rendition_of_accounts_contract_value' => $request->rendition_of_accounts_contract_value,
           'contract_value' => $request->contract_value,
           'cancellation_of_agreement' => $request->cancellation_of_agreement,
            //form 17
           'claim_for_consideration_amount' => $request->claim_for_consideration_amount,
           'claim_for_arrears_of_rent_maintenance_amount' => $request->claim_for_arrears_of_rent_maintenance_amount,
           'enforcement_of_mortgage_debt_amount' => $request->enforcement_of_mortgage_debt_amount,
           'claim_for_contractual_built_up_or_land_share_area' => $request->claim_for_contractual_built_up_or_land_share_area,
           'claim_for_contractual_built_up_or_land_share_value' => $request->claim_for_contractual_built_up_or_land_share_value,
           'division_of_property_area' => $request->division_of_property_area,
           'division_of_property_value' => $request->division_of_property_value,
           'redemption_of_mortgage_market_value_of_property' => $request->redemption_of_mortgage_market_value_of_property,
           'termination_of_lease_mortgage_joint_development_agreement' => $request->termination_of_lease_mortgage_joint_development_agreement,
           'sp_project_value' => $request->sp_project_value,
           'interest_amount' => $request->interest_amount,
           'damage_with_interest'=> $request->damage_with_interest,
           'benefit_withinterest'=> $request->benefit_withinterest,
           'benefit_withoutinterest'=> $request->benefit_withoutinterest,
           'termination'=> $request->termination,
           'average_value'=> $request->average_value,
           'average_value_interest'=> $request->average_value_interest,
           'average_value_withoutinterest'=> $request->average_value_withoutinterest,
           'restraint'=> $request->restraint,
           'claim_for_escalation_of_costs_interest'=> $request->claim_for_escalation_of_costs_interest,
           'claim_for_escalation_of_costs_withoutinterest'=> $request->claim_for_escalation_of_costs_withoutinterest,
           'claim_for_damages_interest'=> $request->claim_for_damages_interest,
           'to_invoke_guarntee'=> $request->to_invoke_guarntee,
           'return_material'=> $request->return_material,
           'substitute_contractor'=> $request->substitute_contractor,
           'value_claims'=> $request->value_claims,
           'value_claims_interest'=> $request->value_claims_interest,
           'value_claims_withoutinterest'=> $request->value_claims_withoutinterest,
                // insurance
           'demanding_policy_claim_amount_withoutinterest'=> $request->demanding_policy_claim_amount_withoutinterest,
           'demanding_policy_claim_amount_interest'=> $request->demanding_policy_claim_amount_interest,
           'demanding_surrender_value_amount_withoutinterest'=> $request->demanding_surrender_value_amount_withoutinterest,
           'demanding_surrender_value_amount_interest'=> $request->demanding_surrender_value_amount_interest,
           'challenging_cancellation_of_policy_interest'=> $request->challenging_cancellation_of_policy_interest,
           'challenging_cancellation_of_policy_withoutinterest'=> $request->challenging_cancellation_of_policy_withoutinterest,
           'subrogation_value_interest'=> $request->subrogation_value_interest,
           'subrogation_value_withoutinterest'=> $request->subrogation_value_withoutinterest,
           'value_performance'=> $request->value_performance,
                // technology
           'demand_to_stop_infringement_select'=> $request->demand_to_stop_infringement_select,
           'cancellation_license'=> $request->cancellation_license,
           'cancellation_license_value'=> $request->cancellation_license_value,
           'damages_for_breach_of_contract_interest'=> $request->damages_for_breach_of_contract_interest,
           'damages_for_breach_of_contract_withoutinterest'=> $request->damages_for_breach_of_contract_withoutinterest,
           'demand_for_licence_fee_withoutinterest'=> $request->demand_for_licence_fee_withoutinterest,
                 // real estate
           'claim_for_consideration_amount_interest'=> $request->claim_for_consideration_amount_interest,
           'claim_for_consideration_amount_withoutinterest'=> $request->claim_for_consideration_amount_withoutinterest,
           'claim_for_arrears_of_rent_maintenance_amount_interest'=> $request->claim_for_arrears_of_rent_maintenance_amount_interest,
           'claim_for_arrears_of_rent_maintenance_withoutinterest'=> $request->claim_for_arrears_of_rent_maintenance_withoutinterest,
           'enforcement_of_mortgage_debt_amount_int'=> $request->enforcement_of_mortgage_debt_amount_int,
           'enforcement_of_mortgage_debt_amount_withoutint'=> $request->enforcement_of_mortgage_debt_amount_withoutint,
           'claim_for_contractual_built_up_or_land_share_area_select'=> $request->claim_for_contractual_built_up_or_land_share_area_select,
           'redemption_of_mortgage'=> $request->redemption_of_mortgage,
           'possession_property'=> $request->possession_property,
           'possession_property_market_value'=> $request->possession_property_market_value,
           'termination_of_lease_mortgage_select'=> $request->termination_of_lease_mortgage_select,
           'damage_amount_interest_without'=> $request->damage_amount_interest_without,
           'Specific_perf'=> $request->Specific_perf,
           'division_of_property_unit'=> $request->division_of_property_unit,
                // Aviation
           'termination_of_contract'=> $request->termination_of_contract,
           'estimated_value_of_property'=> $request->estimated_value_of_property,
           'payment_consideration'=> $request->payment_consideration,
           'payment_consideration_withoutinterest'=> $request->payment_consideration_withoutinterest,
           'payment_consideration_interest'=> $request->payment_consideration_interest,
           'fightrefundamountamountinterestwithinterest'=> $request->fightrefundamountamountinterestwithinterest,
           'frightamountwithpoutinterest'=> $request->frightamountwithpoutinterest,
           'damageamountinterestwithinterest'=> $request->damageamountinterestwithinterest,
           'claim_for_demurrages_withoutinterest'=> $request->claim_for_demurrages_withoutinterest,
           'return_of_property'=> $request->return_of_property,
           'value_performance_int'=> $request->value_performance_int,
           'value_performance_withoutint'=> $request->value_performance_withoutint,
// media
           'claim_restrain'=> $request->claim_restrain,
           'claim_for_withoutinterest'=> $request->claim_for_withoutinterest,
           'claim_for_royalty'=> $request->claim_for_royalty,
           'claim_for_royalty_interest'=> $request->claim_for_royalty_interest,
           'claim_for_royalty_withoutinterest'=> $request->claim_for_royalty_withoutinterest,
           'money_claim_amount_withoutinterest'=> $request->money_claim_amount_withoutinterest,
           'cancellation_of_agreement_value'=> $request->cancellation_of_agreement_value,
           'rendition_and_distribution_of_mense_profits_int'=> $request->rendition_and_distribution_of_mense_profits_int,
           'rendition_and_distribution_of_mense_profits_withoutint'=> $request->rendition_and_distribution_of_mense_profits_withoutint,
           'to_vacate_contractual_site_value'=> $request->to_vacate_contractual_site_value,
           'to_terminate_contract_value'=> $request->to_terminate_contract_value,
           'return_material_value'=> $request->return_material_value,
           'redo_service'=> $request->redo_service,
           'value_infringing'=> $request->value_infringing,
            'value_infringing_withoutinterest'=> $request->value_infringing_withoutinterest,
            'estimated_value_of_material'=> $request->estimated_value_of_material,
             'claimforcontractpriceinerestwithoutinterest'=> $request->claimforcontractpriceinerestwithoutinterest,
             'aggregate_salary'=> $request->aggregate_salary,
              // community

            'claim_for_admission_and_removal_of_members_check'=> $request->claim_for_admission_and_removal_of_members_check,
             'claim_to_remove_or_reinstate_office_bearers_check'=> $request->claim_to_remove_or_reinstate_office_bearers_check,
              'claim_for_holding_or_postponement_of_elections_check'=> $request->claim_for_holding_or_postponement_of_elections_check,
               'claim_to_appoint_auditors_or_investigators_check'=> $request->claim_to_appoint_auditors_or_investigators_check,
                'claim_to_appoint_auditors_check'=> $request->claim_to_appoint_auditors_check,
                 'claim_to_render_accounts_check'=> $request->claim_to_render_accounts_check,
                  'claim_against_members_for_damages_and_nuisance_check'=> $request->aggregate_salary,
                   'claim_to_carryout_repairs_or_renovation_check'=> $request->claim_to_carryout_repairs_or_renovation_check,

       );


ReliefRequest::whereId($reliefrequestid)->update($form_data);

$contranceprice = $request->contract_price;
$claimforrefund = $request->claim_for_refund_lines;
$mortgagedproperty = $request->mortgaged_property;

//echo json_encode($mortgagedproperty); exit;


if (!empty($contranceprice)) {
   for ($i=0; $i < count($contranceprice); $i++) { 

     $contract_relief = DB::table('contract_relief')
     ->insertGetId([        
        'contract_price' => $contranceprice[$i],
        'claim_for_refund_lines' =>$claimforrefund[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $reliefrequestid,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}

if (!empty($mortgagedproperty)) {
    for ($j=0; $j < count($mortgagedproperty); $j++) { 

     $banking_relief = DB::table('banking_relief')
     ->insertGetId([        
        'mortgaged_property' => $mortgagedproperty[$j],

        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $reliefrequestid,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}
}
else
{
    $form_data = array(
        'freightrefundamount' => $request->freightrefundamount,
        'freightrefundamountinterest' => $request->freightrefundamountinterest,
        'claim_for_delivery_of_cargo'        =>  $request->claim_for_delivery_of_cargo,
        'cargo_nature'        =>  $request->cargo_nature,
        'nature_and_details_of_cargo'        =>  $request->nature_and_details_of_cargo,
        'claim_for_payment_of_freight_amount'        =>  $request->claim_for_payment_of_freight_amount,
        'freight_amount_interest'        =>  $request->freight_amount_interest,
        'damage_amount'        =>  $request->damage_amount,
        'damage_amount_interest'        =>  $request->damage_amount_interest,
        'remarks'        =>  $request->remarks,
        'estimated_value_of_contract'        =>  $request->estimated_value_of_contract,
            // //form 3
        'debt_recovery' => $request->debt_recovery,
        'rate_of_interest' => $request->rate_of_interest,
        'sale_of_security' => $request->sale_of_security,
        'amount_of_debt' => $request->amount_of_debt,
        'damages_rs' => $request->damages_rs,
        'rate_of_penal_interest' =>$request->rate_of_penal_interest,
            // //form 4
        'nature_of_goods' => $request->nature_of_goods,
        'quantity_of_goods' => $request->quantity_of_goods,
        'replacement_of_goods' => $request->replacement_of_goods,
        'refund_of_price' => $request->refund_of_price,
        'price_of_goods' => $request->price_of_goods,
        'price_of_goods_interest' => $request->price_of_goods_interest,
        'damages' => $request->damages,
            // //form5
        'claim_for_contract_price' => $request->claim_for_contract_price,
        'claim_for_contract_price_interest' => $request->claim_for_contract_price_interest,
        'escalation_of_costs' => $request->escalation_of_costs,
        'claim_for_refund' => $request->claim_for_refund,
        'refund_withinterest' => $request->refund_withinterest,
            //'refund_withoutinterest' => $request->refund_withoutinterest,
        'claim_for_damages' => $request->claim_for_damages,
        'to_vc_sight_estimated_value_of_contract' => $request->to_vc_sight_estimated_value_of_contract,
        'specific_performance_of_contract' => $request->specific_performance_of_contract,
        'specific_estimated_value_of_contract' => $request->specific_estimated_value_of_contract,
        'tocancel_estimated_value_of_contract' => $request->tocancel_estimated_value_of_contract,
        'amount_guaranteed' => $request->amount_guaranteed,
            // //form6
        'dissolution_of_firm' => $request->dissolution_of_firm,
        'reconstitution_of_firm' => $request->reconstitution_of_firm,
        'cancellation_of_expulsion_of_partner' => $request->cancellation_of_expulsion_of_partner,
        'cancellation_of_induction_of_partner' => $request->cancellation_of_induction_of_partner,
        'rendition_of_accounts' => $request->rendition_of_accounts,
        'valuation_of_firm_and_or_goodwill' => $request->valuation_of_firm_and_or_goodwill,
        'return_of_assets_value' => $request->return_of_assets_value,
        'return_of_assets_value_interest' => $request->return_of_assets_value_interest,
            //'return_of_assets_value_withoutinterest' => $request->return_of_assets_value_withoutinterest,
        'claim_for_capital_share' => $request->claim_for_capital_share,
        'claim_for_capital_share_interest' => $request->claim_for_capital_share_interest,
            //'claim_for_capital_share_withoutinterest' => $request->claim_for_capital_share_withoutinterest,
        'claim_for_share_of_profits' => $request->claim_for_share_of_profits,
        'claim_for_share_of_profits_interest' => $request->claim_for_share_of_profits_interest,
            //'claim_for_share_of_profits_withoutinterest' => $request->claim_for_share_of_profits_withoutinterest,
            // //form 7
        'for_allotment_of_shares_stock' => $request->for_allotment_of_shares_stock,
        'for_cancellation_of_allotments' => $request->for_cancellation_of_allotments,
        'compel_promoters_to_purchase_ofinvestors_shares' => $request->compel_promoters_to_purchase_ofinvestors_shares,
        'compel_or_cancel_push_or_put_options' => $request->compel_or_cancel_push_or_put_options,
        'for_company_to_buy_back_of_shares' => $request->for_company_to_buy_back_of_shares,
        'demand_valuation_of_shares' => $request->demand_valuation_of_shares,
        'demand_redemption_of_preference_shares_or_debentures' => $request->demand_redemption_of_preference_shares_or_debentures,
        'chairman_and_key_employees' => $request->chairman_and_key_employees,
        'general_meetings' => $request->general_meetings,
        'for_enforcement_of_preferential_rights' => $request->for_enforcement_of_preferential_rights,
        'demand_to_move_resolutions' => $request->demand_to_move_resolutions,
        'agreement_value' => $request->agreement_value,
        'aggregate_value_of_debentures' => $request->aggregate_value_of_debentures,
            // //form8
        'claim_subs_contrib_amount' => $request->claim_subs_contrib_amount,
        'claim_subs_contrib_amount_interest' => $request->claim_subs_contrib_amount_interest,
            //'claim_subs_contrib_amount_withoutinterest' => $request->claim_subs_contrib_amount_withoutinterest,
        'claim_refund_deposit_amount' => $request->claim_refund_deposit_amount,
        'claim_refund_deposit_amount_interest' => $request->claim_refund_deposit_amount_interest,
            //'claim_refund_deposit_amount_withoutinterest' => $request->claim_refund_deposit_amount_withoutinterest,
        'claim_for_admission_and_removal_of_members' => $request->claim_for_admission_and_removal_of_members,
        'claim_to_remove_or_reinstate_office_bearers' => $request->claim_to_remove_or_reinstate_office_bearers,
        'claim_for_holding_or_postponement_of_elections' => $request->claim_for_holding_or_postponement_of_elections,
        'claim_to_appoint_auditors_or_investigators' => $request->claim_to_appoint_auditors_or_investigators,
        'claim_to_appoint_auditors' => $request->claim_to_appoint_auditors,
        'claim_to_render_accounts' => $request->claim_to_render_accounts,
        'claim_against_members_for_damages_and_nuisance' => $request->claim_against_members_for_damages_and_nuisance,
        'claim_to_carryout_repairs_or_renovation' => $request->claim_to_carryout_repairs_or_renovation,
            // //form 9
        'claim_reinstatement' => $request->claim_reinstatement,
        'claim_for_salary_and_benefits' => $request->claim_for_salary_and_benefits,
        'value_of_stock_options' => $request->value_of_stock_options,
        'emd_amount' => $request->emd_amount,
        'estimated_value_of_data' => $request->estimated_value_of_data,
            // //form 10 
        'eid_claim_for_contract_price' => $request->eid_claim_for_contract_price,
        'eid_claim_for_contract_price_interest' => $request->eid_claim_for_contract_price_interest,
            //'eid_claim_for_contract_price_withoutinterest' => $request->eid_claim_for_contract_price_withoutinterest,
        'eid_claim_for_refund' => $request->eid_claim_for_refund,
        'eid_claim_for_refund_interest' => $request->eid_claim_for_refund_interest,
            //'eid_claim_for_refund_withoutinterest' => $request->eid_claim_for_refund_withoutinterest,
        'claim_for_escalation_of_costs' => $request->claim_for_escalation_of_costs,            
        'to_terminate_contract' => $request->to_terminate_contract,
        'to_vacate_contractual_site' => $request->to_vacate_contractual_site,         
        'to_claim_for_specific_performance_to_purchase_power' => $request->to_claim_for_specific_performance_to_purchase_power,
        'to_return_materials' => $request->to_return_materials,
            // //form 11
        'nature_of_property' => $request->nature_of_property,
        'extent' => $request->extent,
        'nop_value' => $request->nop_value,
        'rendition_and_distribution_of_mense_profits' => $request->rendition_and_distribution_of_mense_profits, 
            //form 12
        'claimforontractprice' => $request->claimforontractprice,
        'claimforcontractpriceinerest' => $request->claimforcontractpriceinerest,
        'to_cancel_performance_guarantees' => $request->to_cancel_performance_guarantees,
            //form 13
        'demand_for_licence_fee' => $request->demand_for_licence_fee,
        'demand_for_licence_fee_interest' => $request->demand_for_licence_fee_interest,
        'demand_to_stop_infringement' => $request->demand_to_stop_infringement,
        'demand_damages_for_infringement' => $request->demand_damages_for_infringement,
        'damages_for_breach_of_contract' => $request->damages_for_breach_of_contract,
        'demand_to_surrender_infringed_materials' => $request->demand_to_surrender_infringed_materials,
            //form 14
        'claim_for_refund_of_fare_or_freight' => $request->claim_for_refund_of_fare_or_freight,
        'claim_for_refund_of_fare_or_freight_interest' => $request->claim_for_refund_of_fare_or_freight_interest,
        'claim_for_payment_of_freight' => $request->claim_for_payment_of_freight,
        'claim_for_payment_of_freight_interest' => $request->claim_for_payment_of_freight_interest,
        'claim_for_payment_of_damages' => $request->claim_for_payment_of_damages,
        'claim_for_payment_of_damages_interest' => $request->claim_for_payment_of_damages_interest,
        'claim_for_demurrages' => $request->claim_for_demurrages,
        'claim_for_demurrages_interest' => $request->claim_for_demurrages_interest,
        'demanding_policy_claim_amount' => $request->demanding_policy_claim_amount,
        'demanding_surrender_value_amount' => $request->demanding_surrender_value_amount,
        'challenging_cancellation_of_policy' => $request->challenging_cancellation_of_policy,
        'subrogation_value' => $request->subrogation_value,            
        'claim_for_specific_performance' => $request->claim_for_specific_performance,
            // //form 15
        'money_claim_amount' => $request->money_claim_amount,
        'money_claim_amount_interest' => $request->money_claim_amount_interest,
        'rendition_of_accounts_contract_value' => $request->rendition_of_accounts_contract_value,
        'contract_value' => $request->contract_value,
        'cancellation_of_agreement' => $request->cancellation_of_agreement,
            //form 17
        'claim_for_consideration_amount' => $request->claim_for_consideration_amount,
        'claim_for_arrears_of_rent_maintenance_amount' => $request->claim_for_arrears_of_rent_maintenance_amount,
        'enforcement_of_mortgage_debt_amount' => $request->enforcement_of_mortgage_debt_amount,
        'claim_for_contractual_built_up_or_land_share_area' => $request->claim_for_contractual_built_up_or_land_share_area,
        'claim_for_contractual_built_up_or_land_share_value' => $request->claim_for_contractual_built_up_or_land_share_value,
        'division_of_property_area' => $request->division_of_property_area,
        'division_of_property_value' => $request->division_of_property_value,
        'redemption_of_mortgage_market_value_of_property' => $request->redemption_of_mortgage_market_value_of_property,
        'termination_of_lease_mortgage_joint_development_agreement' => $request->termination_of_lease_mortgage_joint_development_agreement,
        'sp_project_value' => $request->sp_project_value,
        'interest_amount' => $request->interest_amount,
        'damage_with_interest'=> $request->damage_with_interest,
        'benefit_withinterest'=> $request->benefit_withinterest,
        'benefit_withoutinterest'=> $request->benefit_withoutinterest,
        'termination'=> $request->termination,
        'average_value'=> $request->average_value,
        'average_value_interest'=> $request->average_value_interest,
        'average_value_withoutinterest'=> $request->average_value_withoutinterest,
        'restraint'=> $request->restraint,
        'claim_for_escalation_of_costs_interest'=> $request->claim_for_escalation_of_costs_interest,
        'claim_for_escalation_of_costs_withoutinterest'=> $request->claim_for_escalation_of_costs_withoutinterest,
        'claim_for_damages_interest'=> $request->claim_for_damages_interest,
        'to_invoke_guarntee'=> $request->to_invoke_guarntee,
        'return_material'=> $request->return_material,
        'substitute_contractor'=> $request->substitute_contractor,
        'value_claims'=> $request->value_claims,
        'value_claims_interest'=> $request->value_claims_interest,
        'value_claims_withoutinterest'=> $request->value_claims_withoutinterest,
                // insurance
        'demanding_policy_claim_amount_withoutinterest'=> $request->demanding_policy_claim_amount_withoutinterest,
        'demanding_policy_claim_amount_interest'=> $request->demanding_policy_claim_amount_interest,
        'demanding_surrender_value_amount_withoutinterest'=> $request->demanding_surrender_value_amount_withoutinterest,
        'demanding_surrender_value_amount_interest'=> $request->demanding_surrender_value_amount_interest,
        'challenging_cancellation_of_policy_interest'=> $request->challenging_cancellation_of_policy_interest,
        'challenging_cancellation_of_policy_withoutinterest'=> $request->challenging_cancellation_of_policy_withoutinterest,
        'subrogation_value_interest'=> $request->subrogation_value_interest,
        'subrogation_value_withoutinterest'=> $request->subrogation_value_withoutinterest,
        'value_performance'=> $request->value_performance,
                // technology
        'demand_to_stop_infringement_select'=> $request->demand_to_stop_infringement_select,
        'cancellation_license'=> $request->cancellation_license,
        'cancellation_license_value'=> $request->cancellation_license_value,
        'damages_for_breach_of_contract_interest'=> $request->damages_for_breach_of_contract_interest,
        'damages_for_breach_of_contract_withoutinterest'=> $request->damages_for_breach_of_contract_withoutinterest,
        'demand_for_licence_fee_withoutinterest'=> $request->demand_for_licence_fee_withoutinterest,
                 // real estate
        'claim_for_consideration_amount_interest'=> $request->claim_for_consideration_amount_interest,
        'claim_for_consideration_amount_withoutinterest'=> $request->claim_for_consideration_amount_withoutinterest,
        'claim_for_arrears_of_rent_maintenance_amount_interest'=> $request->claim_for_arrears_of_rent_maintenance_amount_interest,
        'claim_for_arrears_of_rent_maintenance_withoutinterest'=> $request->claim_for_arrears_of_rent_maintenance_withoutinterest,
        'enforcement_of_mortgage_debt_amount_int'=> $request->enforcement_of_mortgage_debt_amount_int,
        'enforcement_of_mortgage_debt_amount_withoutint'=> $request->enforcement_of_mortgage_debt_amount_withoutint,
        'claim_for_contractual_built_up_or_land_share_area_select'=> $request->claim_for_contractual_built_up_or_land_share_area_select,
        'redemption_of_mortgage'=> $request->redemption_of_mortgage,
        'possession_property'=> $request->possession_property,
        'possession_property_market_value'=> $request->possession_property_market_value,
        'termination_of_lease_mortgage_select'=> $request->termination_of_lease_mortgage_select,
        'damage_amount_interest_without'=> $request->damage_amount_interest_without,
        'Specific_perf'=> $request->Specific_perf,
        'division_of_property_unit'=> $request->division_of_property_unit,
                // Aviation
        'termination_of_contract'=> $request->termination_of_contract,
        'estimated_value_of_property'=> $request->estimated_value_of_property,
        'payment_consideration'=> $request->payment_consideration,
        'payment_consideration_withoutinterest'=> $request->payment_consideration_withoutinterest,
        'payment_consideration_interest'=> $request->payment_consideration_interest,
        'fightrefundamountamountinterestwithinterest'=> $request->fightrefundamountamountinterestwithinterest,
        'frightamountwithpoutinterest'=> $request->frightamountwithpoutinterest,
        'damageamountinterestwithinterest'=> $request->damageamountinterestwithinterest,
        'claim_for_demurrages_withoutinterest'=> $request->claim_for_demurrages_withoutinterest,
        'return_of_property'=> $request->return_of_property,
        'value_performance_int'=> $request->value_performance_int,
        'value_performance_withoutint'=> $request->value_performance_withoutint,
// media
        'claim_restrain'=> $request->claim_restrain,
        'claim_for_withoutinterest'=> $request->claim_for_withoutinterest,
        'claim_for_royalty'=> $request->claim_for_royalty,
        'claim_for_royalty_interest'=> $request->claim_for_royalty_interest,
        'claim_for_royalty_withoutinterest'=> $request->claim_for_royalty_withoutinterest,
        'money_claim_amount_withoutinterest'=> $request->money_claim_amount_withoutinterest,
        'cancellation_of_agreement_value'=> $request->cancellation_of_agreement_value,
        'rendition_and_distribution_of_mense_profits_int'=> $request->rendition_and_distribution_of_mense_profits_int,
        'rendition_and_distribution_of_mense_profits_withoutint'=> $request->rendition_and_distribution_of_mense_profits_withoutint,
        'to_vacate_contractual_site_value'=> $request->to_vacate_contractual_site_value,
        'to_terminate_contract_value'=> $request->to_terminate_contract_value,
        'return_material_value'=> $request->return_material_value,
        'redo_service'=> $request->redo_service,
        'value_infringing'=> $request->value_infringing,
            'value_infringing_withoutinterest'=> $request->value_infringing_withoutinterest,
            'estimated_value_of_material'=> $request->estimated_value_of_material,
             'claimforcontractpriceinerestwithoutinterest'=> $request->claimforcontractpriceinerestwithoutinterest,
             'aggregate_salary'=> $request->aggregate_salary,
              // community

            'claim_for_admission_and_removal_of_members_check'=> $request->claim_for_admission_and_removal_of_members_check,
             'claim_to_remove_or_reinstate_office_bearers_check'=> $request->claim_to_remove_or_reinstate_office_bearers_check,
              'claim_for_holding_or_postponement_of_elections_check'=> $request->claim_for_holding_or_postponement_of_elections_check,
               'claim_to_appoint_auditors_or_investigators_check'=> $request->claim_to_appoint_auditors_or_investigators_check,
                'claim_to_appoint_auditors_check'=> $request->claim_to_appoint_auditors_check,
                 'claim_to_render_accounts_check'=> $request->claim_to_render_accounts_check,
                  'claim_against_members_for_damages_and_nuisance_check'=> $request->aggregate_salary,
                   'claim_to_carryout_repairs_or_renovation_check'=> $request->claim_to_carryout_repairs_or_renovation_check,


        'created_id'        =>  Auth::user()->id,
        'user_id'        =>  Auth::user()->id,
        'claimnoticeid' =>(session()->get('ClaimNoticeID')),
    );

$ReliefRequest = ReliefRequest::create($form_data);
$contranceprice = $request->contract_price;
$claimforrefund = $request->claim_for_refund_lines;
$mortgagedproperty = $request->mortgaged_property;

//echo json_encode($mortgagedproperty); exit;


if (!empty($contranceprice)) {
   for ($i=0; $i < count($contranceprice); $i++) { 

     $contract_relief = DB::table('contract_relief')
     ->insertGetId([        
        'contract_price' => $contranceprice[$i],
        'claim_for_refund_lines' =>$claimforrefund[$i],
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $ReliefRequest->id,    
        'created_id'        =>  Auth::user()->id,
    ]); 
 }
}

if (!empty($mortgagedproperty)) {
    for ($j=0; $j < count($mortgagedproperty); $j++) { 

     $banking_relief = DB::table('banking_relief')
     ->insertGetId([        
        'mortgaged_property' => $mortgagedproperty[$j],
        
        'claim_notice_id' => (session()->get('ClaimNoticeID')),
        'relief_id' => $ReliefRequest->id,    
        'created_id'        =>  Auth::user()->id,

    ]); 
 }
}
}


      // echo json_encode($ReliefRequest);exit;


return response()->json(['success' => 'Data Updated successfully.']);


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    //     $ReliefRequest = ReliefRequest::find($id);
    //     if(!is_null($ReliefRequest)){

    //         $ReliefRequest->delete();

    //     }

    //     return redirect()->route('claimnotice.create')
    //     ->with('success','Relief Request deleted successfully.');        
        
    // }
}
