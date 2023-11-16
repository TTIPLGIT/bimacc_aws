<?php

namespace App\models;

use App\models\Role;
use App\models\User;
use App\models\ClaimDetails;
use App\models\ClaimNotice;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class ArbitratorConfiguration extends Model
{
	use SoftDeletes;
    protected $table = 'claimant_arbitrator_configuration';
    protected $dates = ['deleted_at'];
    protected $fillable = [    	
     'claiment_id',    	
     'arbitrator_id',
     'user_id',
     'created_id',     
     'modified_id',    	
     'claimnoticeid',
     'remarks'           
   ];
	
    public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function roles()
  {
    return $this->belongsTo(Role::class);
  }

  public function hasRole($role)
    {
        return $this->role == $role;

    }
}
