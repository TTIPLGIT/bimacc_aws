<?php

namespace App\models;
use App\models\ClaimFees;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ClaimFees extends Model
{
	use SoftDeletes;
  protected $table = 'claim_fees';
  protected $dates = ['deleted_at'];
  protected $fillable = [
    'claim_amount',
    'claim_amount_purpose',
    'created_at',
    'dispute_categories_id',
    'dispute_subcategories_id',
    'registration_fees'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function roles()
    {
      return $this->belongsTo(Role::class);
    }

    public function dispute_subcategories()
    {
     return $this->belongsTo(DisputeSubcategory::class);
   }
   public function dispute_categories()
   {
     return $this->belongsTo(DisputeCategory::class);
   }
 }
