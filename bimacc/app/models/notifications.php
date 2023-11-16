<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\models\notifications;

class notifications extends Model 
{

  protected $table = 'notifications';

  protected $fillable =  
  [ 'id',
  'type',
  'latest',
  'name',
  'notifiable_type',
  'notifiable_id',
  'data','read_at','created_at','updated_at',
];
}
