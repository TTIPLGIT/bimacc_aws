<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ClaimantNoticeStatus extends Model
{
	use SoftDeletes;
	protected $table = 'claimantnoticestatus';
	protected $dates = ['deleted_at'];	 
    protected $fillable = [
        'claimantnoticestatus', 'userid','claimantnoticeid'
    ]; 
}
