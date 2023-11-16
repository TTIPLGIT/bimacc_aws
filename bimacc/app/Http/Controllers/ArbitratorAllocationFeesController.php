<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ArbitratorAllocationFees;
use App\models\AdministrationFees;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\User;
use App\models\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;
use Carbon\Carbon;

class ArbitratorAllocationFeesController extends Controller
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
        $arbitratorallocationfees = ArbitratorAllocationFees::all();
      
        $date = Carbon::now();
                  
        
        return view('arbitratorallocationfees.index', compact('arbitratorallocationfees','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arbitratorallocationfees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        $request->validate([
            'claim_amount_form' => 'required|numeric|min:1',
            
            'adminstration_fees' => 'required',
            'arbitrator_fees' => 'required',
            'arbitartion_percentage'=>'required',
             ]);

        $totalfees = ($request->adminstration_fees + $request->arbitrator_fees);
        $arbitratorallocationfees = new ArbitratorAllocationFees();
        $arbitratorallocationfees->claim_amount_form = $request->claim_amount_form;
        $arbitratorallocationfees->claim_amount_to = $request->claim_amount_to;
        $arbitratorallocationfees->arbitrator_fees = $request->arbitrator_fees;
        $arbitratorallocationfees->adminstration_fees = $request->adminstration_fees;
        $arbitratorallocationfees->total_fees = $totalfees;
        $arbitratorallocationfees->currency = $request->currency;
        $arbitratorallocationfees->fees_description = $request->fees_description;
        $arbitratorallocationfees->arbitartion_percentage = $request->arbitartion_percentage;
        $arbitratorallocationfees->created_id = Auth::user()->id;
        $arbitratorallocationfees->save(); 
        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Arbitrator Allocation + Adminstration Fees Created Successfully');
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
        $request->validate([
            'claim_amount_form' => 'required|numeric|min:1',
           
             'adminstration_fees' => 'required',
            'arbitrator_fees' => 'required',
            'arbitartion_percentage'=>'required',
            
             ]);

        ArbitratorAllocationFees::findOrFail($id)->update($request->all());

        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Arbitrator Allocation + Adminstration Fees Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arbitratorallocationfees = ArbitratorAllocationFees::find($id);
        $arbitratorallocationfees->delete();
        return Redirect()->route('registrationfees.index')
                        ->with('success', 'Arbitrator Allocation Fees Deleted Successfully');

    }
}
