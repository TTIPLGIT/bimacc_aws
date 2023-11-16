<?php

namespace App\models;
use App\models\PaymentResponse;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class PaymentResponse extends Model
{
	use SoftDeletes;
  protected $table = 'payment_receipt';
  protected $dates = ['deleted_at'];
  protected $fillable = ['id',
                        'payment_status',
                        'mode',
                        'txnid',
                       'amount',
                       'email',
                       'phone',
                       'cardCategory',
                       'discount',
                       'net_amount_debit',
                       'addedon',
                       'productinfo',
                       'firstname',
                       'cardnum',
                       'issuing_bank',
                       'card_type',
                       'name_on_card',
                       'created_id',
                       'created_at',
                       'modified_id',
                       'updated_at',
                       'deleted_id',
                       'deleted_at','claimnoticeid'];
 }
