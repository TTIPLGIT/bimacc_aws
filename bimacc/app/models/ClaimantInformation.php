<?php

namespace App\models;
use App\models\Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ClaimantInformation extends Model
{
	use SoftDeletes;

	 protected $dates = ['deleted_at'];
   	protected $fillable = [
        'name',
        'address',
        'country',
        'state',
        'city',
        'zipcode',
        'daytimetelephone',
        'email',
        'claimant_type',
        'official_designation',
        'organization_name',
        'organization_details',
        'dept_name',
        'govt_name',
        'firstname',
        'middlename',
        'lastname' ,
        'company_name',
        'aadhar_num',
        'others',
        'user_id',
        'created_id',
        'currency',
        'modified_id','claimnoticeid'
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
