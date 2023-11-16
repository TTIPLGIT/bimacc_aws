<?php

namespace App\models;

use App\models\Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RegistrationFees extends Model
{
    use SoftDeletes;
    protected $table = 'registration_fees';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'registration_fees',
    	'fees_description',
        'claim_amount_from',
        'claim_amount_to',
        'currency',
    	'valid_from',
    	'valid_to',
    	'created_id',
        
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
