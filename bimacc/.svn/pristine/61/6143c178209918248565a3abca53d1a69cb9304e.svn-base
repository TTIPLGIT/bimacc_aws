<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Role;
use App\models\User;
use App\models\ClaimDetails;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanType extends Model
{
    use SoftDeletes;
    protected $table = 'loan_type';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'loan_type_code',
    	'loan_type_name',
    	'loan_description',
    	'created_id',
    ];

     public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function claimdetails()
    {
        return $this->hasMany(ClaimDetails::class);

    }
}
