<?php

namespace App\models;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;  
use App\Role;
use App\models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class AdministrationFees extends Model
{
    use SoftDeletes;
    protected $table = 'administration_fees';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'disputecategory_id',
    	'disputsubecategory_id',
    	'administration_fees',
         'claim_amount_from',
        'claim_amount_to',
        'currency',
    	'valid_from',
    	'valid_to',
        
    ];

     

	    public function dispute_categories()
	  {
	    return $this->belongsTo(DisputeCategory::class,'disputecategory_id');
	  }

	  public function dispute_subcategories()
	   {
	    return $this->belongsTo(DisputeSubcategory::class,'disputsubecategory_id');
	  }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
