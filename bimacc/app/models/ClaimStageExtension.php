<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\models\SystemFees;

class ClaimStageExtension extends Model
{
    use SoftDeletes;
    protected $table = 'claimnoticestageextension';
    protected $fillable = 
    [ 
      'id',
      'stageid',
      'stagestartdate',
      'stageenddate',
      'stageextensiondate',
      'requetedby',
      'approvedby',
      'created_id',
      'created_at',
      'updated_id',
      'updated_at',
      'requestedwhom',
      'stageextensionstatus',
      'reason'
    ];
    
  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
