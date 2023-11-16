<?php

namespace App\Http\Controllers;
use App\User;
use Charts;
use DB;
use Auth;
use Role;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    public function SubscribProcess()
{
    return view('PaymentFormData.index');
}



public function Response(Request $request)
{
    dd('Payment Successfully done!');
}


public function SubscribeCancel()
{
     dd('Payment Cancel!');
}

}
