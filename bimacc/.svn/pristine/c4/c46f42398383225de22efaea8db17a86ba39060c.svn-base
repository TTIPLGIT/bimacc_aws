<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\models\ClaimDetails;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\LoanType;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClaimDetails extends Model
{
	use SoftDeletes;
	protected $table = 'claim_details';
	protected $guarded = ['id'];   
	protected $dates =['deleted_at'];
	protected $fillable = [
		'account_name',
		'type_account',
		'name_of_the_branch',    	
		'date_of_account_opened',
		'name_of_the_registered_representative',
		'user_id',
        'loan_type_id',
        'dispute_categories_id',
        'dispute_subcategories_id',
        'loanaccountno',
        'rate_penalinterest',
        'sequirity',
        'commercial_monthly',
        'dateofrevival',
        'created_id',
        'claimnoticeid',        
        'modified_id',  
        'subcategoryid',
        'vesselname',
        'cargoname',  
        'quantity',  
        'lossdetails',
        'claimamount',
        'contractdate',
        'bill_of_lading_details_date_no',
        'passenger_ticket_booking_no',
        'passenger_ticket_booking_date',
        'due_date',
        'noticedate',
        'carriername',
        'charterparty',
        'pnrno',
        'cargonature',
        'natureofincident',
        'loan_acc',
        'date_of_application',
        'sanction',
        'mortgage',
        'hypothecation',
        'pledge',
        'pro_note',
        'revival_letter',
        'date_of_demand',
        'date_of_default',
        'npa_date',
        'date_of_breach',
        'loan_agreement',
        'details_of_goods',
        'details_of_service',
        'date_of_contract',
        'date_of_invoice',
        'date_of_warranty',
        'default_date_of_cause_of_action',
        'date_of_notice', 
        'claim_amount',
        'nature_of_breach',
        'date_of_demand',
        'partnership_deed_date',
        'date_of_reconstitution',
        'date_of_dissolution',
        'date_of_agreement',
        'par_dispute_amount',
        'details_of_documents',
        'date_of_employment',
        'date_of_consultancy_contract',
        'claim_value',
        'date_of_cause_of_action', 
        'date_of_notification',
        'date_of_tender',
        'date_of_registration',
        'date_of_licence',
        'earliest_date_of_prior_use',
        'date_of_breach_or_infringement',
        'policy_details',
        'maturity_date',
        'lorry_reciept_date',
        'warehousing_receipt_date',
        'contract_details',
        'details_of_contract',
        'reason_for_claim',
        'claimamountwithinterest',
        'claim_interest',
        'date_of_warranty_end',
        'name_of_possessor',
        'name_of_property',
        'property_description',
        'schedule_boundary',
        'nature_and_specific',
        'nature_of_cause_of_action',
        'average_annnual',
        'owner_movable',
        'possessor_movable',
        'nature_of_immovable'
    ];

    public function dispute_categories()
    {
        return $this->belongsTo(DisputeCategory::class, 'dispute_categories_id');
    }
    public function dispute_subcategories()
    {
        return $this->belongsTo(DisputeSubcategory::class, 'dispute_subcategories_id');
    }

    public function loan_type()
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    public function arbitratorconfiguration()
    {
     return $this->belongsTo(ArbitratorConfiguration::class);
 }
 
}
