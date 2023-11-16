<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FAQ_module extends Model
{
    protected $table = 'module_name';

    protected $fillable =  
    [ 'module_name','user_id','module_id','created_at','updated_at','deleted_at','flag'];
}
