<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\models\RespondantInformation;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class RespondantInformation extends Model
{
	use SoftDeletes;
	protected $table = 'respondantdetails';
	protected $guarded = ['id', '_token'];   
	protected $dates =['deleted_at'];
	protected $fillable = [
		'name',
		'address',
		'country',    	
		'state',
		'city',
		'zipcode',
		'organization_name',
		'organization_details',
		'auth_name',
		'auth_designation',
		'firstname',
		'middlename',
		'lastname',
		'official_designation',
		'age',
		'aadhar_num',
		'daytimetelephone',
		'email',
		'respondant_type',
		'proprietar_name',
		'company_name',
		'user_id',
		'created_id',        
		'modified_id',       
	];


	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function roles()
	{
		return $this->belongsTo(Role::class);
	}
    //
}
