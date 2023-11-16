<?php

namespace App\models;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class ClaimentType extends Model
{
    use SoftDeletes;
    protected $table = 'claimant_type';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'claimant_type',
    	'claimant_type_description',
    	'created_id',
    ];
    
     public function user()
  {
    return $this->belongsTo(User::class);
  }
}
