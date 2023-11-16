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


class LoanBank extends Model
{
	use SoftDeletes;
	protected $table = 'claim_details';
	protected $guarded = ['id', '_token'];   
	protected $dates =['deleted_at'];
	protected $fillable = [
		'loan_acc_bank',
		'date_of_application_bank',
		'date_of_sanction_bank',    	
		'sanction_ammount',
		'date_of_dafault',
		'amount_as_account',
        'interest_bank',
        'penel_interest_bank',
        'npa_date_bank',
        'other_charges_bank',
        'outstanding_amount',
        'amount_as_date',
        'claim_notice_id',
        'created_id',
        'user_id',
        
    ];

    
 
}
