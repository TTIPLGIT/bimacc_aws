<?php

namespace App\models;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\ClaimDetails;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class DisputeCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'category_name', 'category_description','dispute_category_Code'];

   public function disputesubcategories()
    {
        return $this->hasMany(DisputeSubcategory::class);
    }

    public function arbitrationmaster()
    {
        return $this->belongsTo(ArbitrationMaster::class);
    }   
    public function arbitratorconfiguration()
    {
       return $this->belongsTo(ArbitratorConfiguration::class); 
    } 
     public function claimdetails()
    {
        return $this->hasMany(ClaimDetails::class,'dispute_categories_id');

    }
     public function claimnotice()
    {
        return $this->hasMany(ClaimNotice::class,'dispute_categories_id');

    } 

    public function claim_fees()
    {
        return $this->hasMany(ClaimFees::class,'dispute_categories_id');
    }

    public function administrationfees()
    {
        return $this->hasMany(AdministrationFees::class);
    }
    public function arbitratorallocationfees()
    {
        return $this->hasMany(ArbitratorAllocationFees::class);
    }
}
