<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\models\SystemFees;

class ClaimNoticeStage extends Model
{
    use SoftDeletes;
    protected $table = 'claimantnotice_stage';
    protected $dates = ['deleted_at'];
    protected $fillable = 
    [ 'id',
      'claimantnotice_stage',
    	'claimantnotice_stage_description',
    	'alfresco_stage_folderuniqueid',
    	'stagefromdate',
      'stagetodate',
      'nature_of_award',
    	'claimnoitceid','created_id','created_at','updated_id',
    ];
    
     public function user()
  {
    return $this->belongsTo(User::class);
  }

}
