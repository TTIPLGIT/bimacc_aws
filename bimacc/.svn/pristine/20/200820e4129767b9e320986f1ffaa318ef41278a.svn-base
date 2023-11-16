<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class hearing_configuration extends Model
{
    use SoftDeletes;
    protected $table = 'hearing_configuration';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'id',
    	'user_id',
    	'claim_id',
    	'user_status',
      'hearing_status',
      'display_order',
      'hearing_number',
      'created_id',
      'updated_id',
    ];
}
