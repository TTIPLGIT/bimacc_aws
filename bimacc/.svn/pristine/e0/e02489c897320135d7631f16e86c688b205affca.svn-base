<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Redirect;
use Carbon\Carbon;

class PaymentFormResponseController extends Controller
{

    public function index(Request $request)
    {

        $key                =   $request->key;
        $salt               =   $request->salt;
        $txnid              =   $request->txnid;
        $amount             =   $request->amount;
        $productInfo        =   $request->productinfo;
        $firstname          =   $request->firstname;
        $email              =   $request->email;
        $udf5               =   $request->udf5;
        $mihpayid           =   $request->mihpayid;
        $status             =   $request->status;
        $resphash               =   $request->hash;
    //Calculate response hash to verify 
        $keyString          =   $key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
        $keyArray           =   explode("|",$keyString);
        $reverseKeyArray    =   array_reverse($keyArray);
        $reverseKeyString   =   implode("|",$reverseKeyArray);
        $CalcHashString     =   strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));

        echo $request->key; exit;
        if ($status == 'success'  && $resphash == $CalcHashString) {
            $msg = "Transaction Successful and Payment Completed...";
        //Do success order processing here...
        }
        else {
        //tampered or failed
            $msg = "Payment failed for Hasn not verified Please Contact Admin";
        } 
        return Redirect()->route('registrationfees.index')
        ->with('success', 'Rees Updated Success fully');
    }

    public function store(Request $request)
    {

        

        $key                =   $request->key;
        $salt               =   $request->salt;
        $txnid              =   $request->txnid;
        $amount             =   $request->amount;
        $productInfo        =   $request->productinfo;
        $firstname          =   $request->firstname;
        $email              =   $request->email;
        $udf5               =   $request->udf5;
        $mihpayid           =   $request->mihpayid;
        $status             =   $request->status;
        $resphash               =   $request->hash;

        $keyString          =   $key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
        $keyArray           =   explode("|",$keyString);
        $reverseKeyArray    =   array_reverse($keyArray);
        $reverseKeyString   =   implode("|",$reverseKeyArray);
        $CalcHashString     =   strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));

        echo $request->key; exit;
        if ($status == 'success'  && $resphash == $CalcHashString) {
            $msg = "Transaction Successful and Hash Verified...";
        //Do success order processing here...
        }
        else {
        //tampered or failed
            $msg = "Payment failed for Hasn not verified...";
        } 
        return Redirect()->route('registrationfees.index')
        ->with('success', 'Registration Fees Created Successfully');
    }
}
