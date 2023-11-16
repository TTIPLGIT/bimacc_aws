<?php

namespace App\models;
use App\User;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DisputeSubcategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'subcategory_name', 'subcategory_description', 'dispute_categories_id','dispute_subcategory_Code',
    ];

    public function dispute_categories()
    {
         return $this->belongsTo(DisputeCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function users()
    {
        return $this->belongsToMany('\App\User', 'role_user', 'dispute_categories_id')->withPivot('id')->withTrashed();
    }
    public function arbitrationmaster()
    {
        return $this->belongsTo(ArbitrationMaster::class);
    }
    public function arbitratorconfiguration()
    {
       return $this->belongsTo(ArbitratorConfiguration::class); 
    } 

    public function administrationfees()
    {
        return $this->hasMany(AdministrationFees::class);
    }

    public function claim_fees()
    {
        return $this->hasMany(ClaimFees::class,'dispute_subcategories_id');
    }

     public function arbitratorallocationfees()
    {
        return $this->hasMany(ArbitratorAllocationFees::class);
    }

}
