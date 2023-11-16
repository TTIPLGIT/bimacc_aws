<?php

namespace App\models;
use App\models\User;
use App\models\ClaimantRegister;
use App\models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewClaimantNotification;

class ClaimantRegister extends Model
{
  use Notifiable;
  
 protected $table = 'claimantregister';
 protected $guarded = ['id', '_token'];   


 protected $fillable = [
   'organization_name',
   //'organization_details',
   'govt_name',
   'dept_name',
   'firstname',    	
   'lastname',
   'username',
   'email',
   'password',
   'phone',
   'alt_phone',
   'city',
   'state', 
   'country',
   'zipcode',
   'address',
   'usertype',
   'claimant_type',
   //'official_designation',
   'user_id',
   'role_id',        
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
