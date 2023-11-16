<?php

namespace App\models;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;  
use App\models\Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArbitratorAllocationFees extends Model
{
    use SoftDeletes;
    protected $table = 'arbitrator_allocation_fees';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'arbitrator_fees',
        'total_fees',
        'currency',
    	'claim_amount_form',
    	'claim_amount_to',
    	'adminstration_fees',
    	'fees_description',
        'arbitartion_percentage'
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
