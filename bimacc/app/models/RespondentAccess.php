<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class RespondentAccess extends Model
{
    protected $fillable = [
    	'claimnoticeno',
    	'claimnoticestatus',
    	'userid',
    	'category_name',
    	'subcategory_name',
    	'claimantname',
    	'address',
    	'country',
        'city',
        'daytimetelephone',
        'email'
    ];
}