<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ArbitratorAllocationFees;
use App\models\RegistrationFees;
use App\models\AdministrationFees;
use App\models\User;
use App\models\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use Carbon\Carbon; 

class RegistrationFeesController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
        $registrationfees = RegistrationFees::all();
        $arbitratorallocationfees = ArbitratorAllocationFees::all();
        $administrationfees = AdministrationFees::all();
        $date = Carbon::now();
        return view('registrationfees.index',compact('registrationfees','date','arbitratorallocationfees','administrationfees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrationfees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_fees' => 'required',
        ]);

        $registrationfees = new RegistrationFees();
        $registrationfees->registration_fees = $request->registration_fees;
         $registrationfees->claim_amount_from = $request->claim_amount_from;
          $registrationfees->claim_amount_to = $request->claim_amount_to;
        $registrationfees->fees_description = $request->fees_description;
        $registrationfees->currency = $request->currency;
        $registrationfees->created_id = Auth::user()->id;
        $registrationfees->save();

        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Registration Fees Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $user_id = (auth()->check()) ? auth()->user()->id : null;
           // echo $user_id;exit;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
        $request->validate([
            'registration_fees' => 'required',
             ]);

      //  RegistrationFees::findOrFail($id)->update($request->all());

        //   $registrationfees->registration_fees = $request->registration_fees;
        //  $registrationfees->claim_amount_from = $request->claim_amount_from;
        //   $registrationfees->claim_amount_to = $request->claim_amount_to;
        // $registrationfees->fees_description = $request->fees_description;
        // $registrationfees->currency = $request->currency;
        // $registrationfees->created_id = Auth::user()->id;

        $table = DB::table('registration_fees')
        ->where('id' , $id)
        ->update(['registration_fees' => $request->registration_fees,
     'claim_amount_from' => $request->claim_amount_from,
        'claim_amount_to' => $request->claim_amount_to,
         'fees_description' => $request->fees_description,
         'currency' => $request->currency,
         

    ]); 

        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Registration Fees Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registrationfees = RegistrationFees::find($id);
        $registrationfees->delete();
        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Registration Fees Deleted Successfully');
    }
}
