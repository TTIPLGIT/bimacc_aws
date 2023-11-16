<?php

namespace App\models;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\ArbitrationMaster;
use App\models\Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArbitrationMaster extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable = [    	
   'firstname',    	
   'lastname',
   'username',
   'email',
   'password',
   'phone',    	
   'city',
   'state',
   'country',
   'zipcode',
   'address',
   'usertype',
   'dispute_categories_id',
   'dispute_subcategories_id',
   'user_id',
   'role_id', 
   'alt_phone',
   'arbitrator_code',
   'miiddlename',
   'qualification',
   'language_prof',
   'age',
   'dob', 
   'experience',
   'training',
   'no_of_arbitration',
   'no_of_arbitration_rep',
   'present_prof',
   'prior_position',
   'membership',
   'litigation',
   'domain',
   'conf_interest',
   'prof_experience',
   

 ];
 public function dispute_subcategories()
 {
  return $this->belongsTo(DisputeSubcategory::class);
}

public function dispute_categories()
{
  return $this->belongsTo(DisputeCategory::class);
}

public function user()
{
  return $this->belongsTo(User::class);
}
public function roles()
{
  return $this->belongsTo(Role::class);
}
}
