<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\models\SystemFees;

class ClaimantRespondantType extends Model
{
    use SoftDeletes;
    protected $table = 'claimant_respondant_type';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'type',
    	'claimant_respondant_type_name',
    	'claimant_respondant_type_description',
      'claimant_respondant_type_Code',
    	'created_id',
    ];
    
     public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function systemfees()
  {
    return $this->hasMany(SystemFees::class);
  }


}
