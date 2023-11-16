<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\models\ReliefRequest;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class ReliefRequest extends Model
{
	use SoftDeletes; 
	protected $table = 'relief_request';
	protected $guarded = ['id', '_token'];   
	protected $dates =['deleted_at'];
	protected $fillable = [
		// 'recovery_of_money',
		// 'simple_compound',
		//'pun_loquid_unliquid',
		//'penal_interest',    	
		// 'punitive_damages_liq',
		//'specific_perfomances',
		// 'recident_backwages',
		// 'CANCELLATION_OF_ALOTTMENT_OF_SHARES',
		// 'SETOFF_SAND_COUNTERCLAIM',
		// 'PARTITION_AND_DISTRIBUTION_OF_ASSETS',
		// 'DECLARATION',
		// 'ANY_OTHER_RELIEF_AS_SPECIFIED',
		'user_id',
		'claimnoticeid',
		'created_id',        
		'modified_id',
		'claim_for_delivery_of_cargo',
		'cargo_nature',		
		'claim_for_payment_of_freight_amount',
		'freight_amount_interest',
		'damage_amount',
		'damage_amount_interest',
		'remarks',
		'estimated_value_of_contract',
		'freightrefundamount',
		'frightrefundamountinerest',
		'debt_recovery',
		'rate_of_interest',
		//'sale_of_security',
		'amount_of_debt',
		'damages_rs',
		'rate_of_penal_interest',
		'nature_of_goods',
		'quantity_of_goods',
		'replacement_of_goods',
		'refund_of_price',
		'price_of_goods',
		'price_of_goods_interest',
		'damages',
		'claim_for_contract_price',
		'claim_for_contract_price_interest',
		//'claim_for_contract_price_withoutinterest',
		'escalation_of_costs',
		'claim_for_refund',
		'refund_withinterest',
		'refund_withoutinterest',
		'claim_for_damages',
		//'to_vc_sight_estimated_value_of_contract',
		'specific_performance_of_contract',
		'specific_estimated_value_of_contract',
		'tocancel_estimated_value_of_contract',
		'amount_guaranteed',
		'dissolution_of_firm',
		'claim_for_refund_of_fare_or_freight_withoutinterest',
		'claim_for_payment_of_freight_withoutinterest',
		'claim_for_payment_of_damages_withoutinterest',
		//'reconstitution_of_firm',
		//'cancellation_of_expulsion_of_partner',
		//'cancellation_of_induction_of_partner',
		'rendition_of_accounts',
		//'valuation_of_firm_and_or_goodwill',
		//'return_of_assets_value',
		//'return_of_assets_value_interest',
		//'return_of_assets_value_withoutinterest',
		//'claim_for_capital_share',
		//'claim_for_capital_share_interest',
		//'claim_for_capital_share_withoutinterest',
		// 'claim_for_share_of_profits',
		// 'claim_for_share_of_profits_interest',
		// 'claim_for_share_of_profits_withoutinterest',
		'for_allotment_of_shares_stock',
		'for_cancellation_of_allotments',
		'compel_promoters_to_purchase_ofinvestors_shares',
		'compel_or_cancel_push_or_put_options',
		'for_company_to_buy_back_of_shares',
		'demand_valuation_of_shares',
		'demand_redemption_of_preference_shares_or_debentures',
		'chairman_and_key_employees',
		'general_meetings',
		'for_enforcement_of_preferential_rights',
		'demand_to_move_resolutions',
		'agreement_value',
		'aggregate_value_of_debentures',
		'claim_subs_contrib_amount',
		'claim_subs_contrib_amount_interest',
		'claim_subs_contrib_amount_withoutinterest',
		'claim_refund_deposit_amount',
		'claim_refund_deposit_amount_interest',
		'claim_refund_deposit_amount_withoutinterest',
		'claim_for_admission_and_removal_of_members',
		'claim_to_remove_or_reinstate_office_bearers',
		'claim_for_holding_or_postponement_of_elections',
		'claim_to_appoint_auditors_or_investigators',
		'claim_to_appoint_auditors',
		'claim_to_render_accounts',
		'claim_against_members_for_damages_and_nuisance',
		'claim_to_carryout_repairs_or_renovation',
		'claim_reinstatement',
		'claim_for_salary_and_benefits',
		'value_of_stock_options',
		'emd_amount',
		'estimated_value_of_data',
		'eid_claim_for_contract_price',
		'eid_claim_for_contract_price_interest',
		'eid_claim_for_contract_price_withoutinterest',
		'eid_claim_for_refund',
		'eid_claim_for_refund_interest',
		'eid_claim_for_refund_withoutinterest',
		'claim_for_escalation_of_costs',		
		'to_terminate_contract',
		'to_vacate_contractual_site',
		'to_return_materials',		
		'to_claim_for_specific_performance_to_purchase_power',
		'nature_of_property',
		'extent',
		'rendition_and_distribution_of_mense_profits',
		'rendition_and_distribution_of_mense_profits_int',
		'rendition_and_distribution_of_mense_profits_withoutint',
		'nop_value',
		'claimforontractprice',
		'claimforcontractpriceinerest',
		'to_cancel_performance_guarantees',
		'demand_for_licence_fee',
		'demand_for_licence_fee_interest',
		'demand_to_stop_infringement',
		'demand_damages_for_infringement',
		'damages_for_breach_of_contract',
		'demand_to_surrender_infringed_materials',
		'claim_for_refund_of_fare_or_freight',
		'claim_for_refund_of_fare_or_freight_interest',
		'claim_for_payment_of_freight',
		'claim_for_payment_of_freight_interest',
		'claim_for_payment_of_damages',
		'claim_for_payment_of_damages_interest',
		'claim_for_demurrages',
		'claim_for_demurrages_interest',
		'demanding_policy_claim_amount',
		'demanding_surrender_value_amount',
		'challenging_cancellation_of_policy',
		'subrogation_value',
		'nature_and_details_of_cargo',
		'claim_for_specific_performance',
		'money_claim_amount',
		'money_claim_amount_interest',
		'rendition_of_accounts_contract_value',
		'contract_value',
		'cancellation_of_agreement',
		'claim_for_consideration_amount',
		'claim_for_arrears_of_rent_maintenance_amount',
		'enforcement_of_mortgage_debt_amount',
		'claim_for_contractual_built_up_or_land_share_area',		
		'claim_for_contractual_built_up_or_land_share_value',
		'division_of_property_area',
		'division_of_property_value',
		'redemption_of_mortgage_market_value_of_property',
		'termination_of_lease_mortgage_joint_development_agreement',
		'sp_project_value',
		'interest_amount',
		'damage_with_interest',
		'benefit_withinterest',
		'benefit_withoutinterest',
		'termination',
		'average_value',
		'average_value_interest',
		'average_value_withoutinterest',
		'restraint',
		'claim_for_escalation_of_costs_withoutinterest',
		'claim_for_escalation_of_costs_interest',
		'claim_for_damages_withoutinterest',
		'claim_for_damages_interest',
		'to_invoke_guarntee',
		//'return_material',
		'substitute_contractor',
		'value_claims',
		'value_claims_interest',
		'value_claims_withoutinterest',
		'demanding_policy_claim_amount_withoutinterest',
		'demanding_policy_claim_amount_interest',
		'demanding_surrender_value_amount_withoutinterest',
		'demanding_surrender_value_amount_interest',
		//'challenging_cancellation_of_policy_interest',
		//'challenging_cancellation_of_policy_withoutinterest',
		'subrogation_value_interest',
		'subrogation_value_withoutinterest',
		'value_performance',
		'demand_to_stop_infringement_select',
		'cancellation_license',
		'cancellation_license_value',
		'demand_for_licence_fee_withoutinterest',
		'damages_for_breach_of_contract_interest',
		'damages_for_breach_of_contract_withoutinterest',
		'claim_for_consideration_amount_interest',
		'claim_for_consideration_amount_withoutinterest',
		'claim_for_arrears_of_rent_maintenance_amount_interest',
		'claim_for_arrears_of_rent_maintenance_withoutinterest',
		'enforcement_of_mortgage_debt_amount_int',
		'enforcement_of_mortgage_debt_amount_withoutint',
		'claim_for_contractual_built_up_or_land_share_area_select',
		'redemption_of_mortgage',
		'possession_property',
		'possession_property_market_value',
		'termination_of_lease_mortgage_select',
		'damage_amount_interest_without',
		'Specific_perf',
		'division_of_property_unit',
		'termination_of_contract',
		'estimated_value_of_property',
		'payment_consideration',
		'payment_consideration_withoutinterest',
		'payment_consideration_interest',
		'fightrefundamountamountinterestwithinterest',
		'frightamountwithpoutinterest',
		'damageamountinterestwithinterest',
		'claim_for_demurrages_withoutinterest',
		'return_of_property',
		'value_performance_int',
		'value_performance_withoutint',
		'claim_for_withoutinterest',
		'claim_for_royalty',
		'claim_for_royalty_interest',
		'claim_for_royalty_withoutinterest',
		'claim_restrain',
		'money_claim_amount_withoutinterest',
		'cancellation_of_agreement_value',
		'to_vacate_contractual_site_value',
		'to_terminate_contract_value',
		'return_material_value',
		'redo_service',
		'value_infringing_withoutinterest',
		'value_infringing',
		'estimated_value_of_material',
		'claimforcontractpriceinerestwithoutinterest',
		'aggregate_salary',
		'claim_for_admission_and_removal_of_members_check',
		'claim_to_remove_or_reinstate_office_bearers_check',
		'claim_for_holding_or_postponement_of_elections_check',
		'claim_to_appoint_auditors_or_investigators_check',
		'claim_to_appoint_auditors_check',
		'claim_to_render_accounts_check',
		'claim_against_members_for_damages_and_nuisance_check',
		'claim_to_carryout_repairs_or_renovation_check',
		'is_respondant'
		

	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function roles()
	{
		return $this->belongsTo(Role::class);
	}

	
	
}
