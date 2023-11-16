<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\PaymentResponse;
use App\models\ClaimNotice;
use App\models\ClaimantNoticeStatus;
use App\models\notifications;
use Redirect;
use Auth;
use Role;
use App\models\User;
use DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewClaimantNotification;
use Illuminate\Notifications\Notifiable;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function payment(Request $request)
    {        
        try {
            $key = env('PAYUMONEY_MERCHANT_KEY');
            $txnid = "TRNREG" . rand(10000,99999999);
            //substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            $amount = $request->amount;
            $firstname = $request->firstName;
            $email = $request->email;
            $phone = $request->phone;
            $productinfo = $request->productInfo;
            $udf1 = '';
            $udf2 = '';
            $udf3 = '';
            $udf4 = '';
            $udf5 = '';
            $udf6 = '';
            $udf7 = '';
            $udf8 = '';
            $udf9 = '';
            $udf10 = '';

            $hash_string = $key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'|'.$udf4.'|'.$udf5.'|'.$udf6.'|'.$udf7.'|'.$udf8.'|'.$udf9.'|'.$udf10.'|';
            $hash_string .= env('PAYUMONEY_SALT');
            $hash = strtolower(hash('sha512', $hash_string));
            $action = env('PAYUMONEY_BASE_URL').'/_payment';
            $success = env('PAYUMONEY_PAYMENT_SUCCESS_URL');
            $failure = env('PAYUMONEY_PAYMENT_FAILURE_URL');
            $serviceProvider = env('PAYUMONEY_SERVICE_PROVIDERL');
            
            return view('payment.payment', compact('key', 'txnid', 'amount', 'firstname', 'email', 'phone', 'productinfo', 'hash', 'action', 'success', 'failure', 'serviceProvider'));
        } catch (\Exception $exc) {
            echo $exc;
        }
    }

    public function success(Request $request)
    {
        try {
            $status = $request->status;
            $mode = $request->mode;
            $txnid = $request->txnid;
            $amount = $request->amount;
            $email = $request->email;
            $phone = $request->phone;
            $cardCategory = $request->cardCategory;
            $discount = $request->discount;
            $net_amount_debit = $request->net_amount_debit;
            $addedon = $request->addedon;
            $udf2 = $request->udf2;
            $productinfo = $request->productinfo;
            $firstname = $request->firstname;
            $cardnum = $request->cardnum;
            $issuing_bank = $request->issuing_bank;
            $card_type = $request->card_type;
            $name_on_card = $request->name_on_card;
            $error_Message = $request->error_Message;
            $claimnoticeid = $request->udf2;

            $Payment_receipt = new PaymentResponse(); 
            $Payment_receipt->payment_status = $request->status;
            $Payment_receipt->mode = $request->mode;
            $Payment_receipt->txnid = $request->txnid;
            $Payment_receipt->amount = $request->amount;
            $Payment_receipt->email = $request->email;
            $Payment_receipt->phone = $request->phone;
            $Payment_receipt->cardCategory = $request->cardCategory;
            $Payment_receipt->discount = $request->discount;
            $Payment_receipt->net_amount_debit = $request->net_amount_debit;
            $Payment_receipt->addedon = $request->addedon;
            //$Payment_receipt->claimnoticeid = $request->udf2;
            $Payment_receipt->productinfo = $request->productinfo;
            $Payment_receipt->firstname = $request->firstname;
            $Payment_receipt->cardnum = $request->cardnum;
            $Payment_receipt->issuing_bank = $request->issuing_bank;
            $Payment_receipt->card_type = $request->card_type;
            $Payment_receipt->name_on_card = $request->name_on_card;
           // $Payment_receipt->error_message = $request->error_Message;
            $Payment_receipt->claimnoticeid = $request->udf2;
            $Payment_receipt->created_id = Auth::user()->id;        
            
            if($Payment_receipt->save())
            {
               $ClaimNoticeID = $request->udf2;
               $claimantnoticestatus = '';
               $feesstatus = '';
               $Responsemessage = '';
               $receipt_type ='';
               if ($request->productinfo == 'Registration') {
                $receipt_type = 'Registration';
                $feesstatus ='Registration Fees Completed';
                $claimantnoticestatus = 'New Claim Created';
                $Responsemessage = 'Registration Payment has been completed Successfully';
            }
            else
            {
                $claimantnoticestatus = 'Payment Completed, Allocate Arbitrator';

                $invoice_type = 'Administration';

                $feesstatus ='Adminstrative and Arbitrator Allocation Payment Completed';
                $Responsemessage = 'Adminstrative and Arbitrator Allocation Payment has been completed Successfully';
            }

            $receiptdetails =DB::table('claimnotice_payment_receipt')->orderBy('id', 'desc')->first();
              if ($receiptdetails ==null) 
              {
                $receiptno  =  'REC/'.date("Y").'/001';
              }
              else
              {
                $receiptno = $receiptdetails->receiptno;
                $receiptno =  ++$receiptno;  // AAA004  
              }

             $claimnotice_receiptdetails = DB::table('claimnotice_payment_receipt')->insertGetId([
                        'receiptno' => $receiptno,
                        'receiptdate' => NOW(),
                        'claimnoticeid' => $request->udf2,
                        'receipt_type' => $receipt_type,
                        'receiptamount' => $request->amount,
                        'created_by' => auth()->user()->id,
                        'created_at' => NOW()
             ]);


            $table = DB::table('claimantnotice')
            ->where('id' , $request->udf2)
            ->update(['claimnoticestatus' => $claimantnoticestatus]); 
            $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
            $ClaimantNoticeStatus->claimantnoticeid = $request->udf2;
            $ClaimantNoticeStatus->claimantnoticestatus = $claimantnoticestatus;
            $ClaimantNoticeStatus->userid = Auth::user()->id; 
            $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
            $ClaimantNoticeStatus->created_id = Auth::user()->id;        
            $ClaimantNoticeStatus->save();






            $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
                foreach($emails as $Adminemail){
                  $email = $Adminemail->email;
                // echo $email; exit;

                  // Mail::send('emails.welcome2', $data, function($message) use ($email,$receiptPath,$data,$data1){
                  //   $message->to($email)
                  //   ->subject('Online Arbitration System(Claim Notice No:'.$data1['claimnoticeno'].'  '.$feesstatus.')')
                  //   ->attach($receiptPath);
                  // });

                  $newclaimant = [
                    'body' => $feesstatus,
                    'actionURL' => route('claimantsnoticelist.index'),
                  ];

                  $newclaimant =  json_encode($newclaimant);

                  $notification = new notifications(); 
                  $notification->type = 'ClaimNotice';
                  $notification->latest = '1';
                  $notification->name = $feesstatus;
                  $notification->notifiable_type = $feesstatus;
                  $notification->data = $newclaimant;
                  $notification->notifiable_id = $Adminemail->id;         
                  $notification->created_at = date('Y-m-d H:i:s');
                  $notification->updated_at = date('Y-m-d H:i:s');
                  $notification->registration_claimnotice_id = $request->udf2; 
                  $notification->save();
                 }

        }
        return redirect()->route('claimnotice.index')
        ->with('success',$Responsemessage);
        
         //   return view('payment.success', compact('status', 'mode', 'txnid', 'amount', 'email', 'phone', 'cardCategory', 'firstname', 'cardnum', 'card_type', 'name_on_card', 'error_Message', 'request'));
    } catch (\Exception $exc) {
        echo $exc;
    }
}

public function failure(Request $request)
{
    try {
        $status = $request->status;
        $mode = $request->mode;
        $txnid = $request->txnid;
        $amount = $request->amount;
        $email = $request->email;
        $phone = $request->phone;
        $cardCategory = $request->cardCategory;
        $discount = $request->discount;
        $net_amount_debit = $request->net_amount_debit;
        $addedon = $request->addedon;
        $productinfo = $request->productinfo;
        $firstname = $request->firstname;
        $cardnum = $request->cardnum;
        $issuing_bank = $request->issuing_bank;
        $card_type = $request->card_type;
        $name_on_card = $request->name_on_card;
        $error_Message = $request->error_Message;

        return view('payment.failure', compact('status', 'mode', 'txnid', 'amount', 'email', 'phone', 'cardCategory', 'firstname', 'cardnum', 'card_type', 'name_on_card', 'error_Message', 'request'));
    } catch (\Exception $exc) {
        echo $exc;
    }
}

}
