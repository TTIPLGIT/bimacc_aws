<?php

namespace App\models;
use App\models\ClaimNotice;
use App\models\ClaimDetails;
use App\ArbitratorConfiguration;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ClaimNotice extends Model
{
	use SoftDeletes;
    protected $table = 'claimantnotice';
	  protected $dates = ['deleted_at'];
   	protected $fillable = ['id','claimnoticeno','claimnoticestatus', 'created_at'];

  public function user()
  {
    return $this->belongsTo(User::class);
        https://sportsala.com/cwc-2019-server/
  }
  public function roles()
  {
    return $this->belongsTo(Role::class);
  }
   public function arbitratorconfiguration()
  {
    return $this->belongsTo(ArbitratorConfiguration::class);
  }
  public function dispute_categories()
  {
    return $this->belongsTo(DisputeCategory::class);
  }
  public function dispute_subcategories()
  {
    return $this->belongsTo(DisputeSubcategory::class);
  }
}
