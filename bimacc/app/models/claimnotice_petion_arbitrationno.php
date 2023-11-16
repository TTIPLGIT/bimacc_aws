<?php

namespace App\models;
use App\models\claimnotice_petion_arbitrationno;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class claimnotice_petion_arbitrationno extends Model
{
	  use SoftDeletes;
    protected $table = 'claimnotice_petion_arbitrationno';
	  protected $dates = ['deleted_at'];
   	protected $fillable = ['created_id','claimnoticeid', 'arbitration_petionno'];

}
