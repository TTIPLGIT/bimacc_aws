<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SecurityTypes extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];	 
    protected $fillable = [
        'security_type_name', 
        'security_type_description',
        'security_type_code',
    ]; 
}
