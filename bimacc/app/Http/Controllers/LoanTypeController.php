<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\LoanType;
use App\User;
use App\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;

class LoanTypeController extends Controller
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
        $loan_type = LoanType::all();

        return view('loan_type.index', compact('loan_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
     
        $loan_type = new LoanType();

        $loan_type->loan_type_code = $request->loan_type_code;
        $loan_type->loan_type_name = $request->loan_type_name;
        $loan_type->loan_description = $request->loan_description;
        $loan_type->created_id = Auth::user()->id;

        $loan_type->save();

        return Redirect()->route('loantype.index')
                        ->with('success', 'Loan Type Added Successfully');
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
        //write  code here for without using popup modal       
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
        // $request->validate([
        //     'loan_type_code' => 'required',
        //     'loan_type_name' => 'required',
        //     'loan_description' => 'nullable', 
        // ]);

        if(LoanType::findOrFail($id)->update($request->all())){
            $loantype = LoanType::findOrFail($id);           
            $loantype->updated_id = Auth::user()->id;
            $loantype->update();
        return Redirect()->route('loantype.index')
                        ->with('success','Loan Type Updated Successfully');    
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan_type = LoanType::find($id);
        $loan_type->delete();
        return Redirect()->route('loantype.index')
                        ->with('success', 'Loan Type Deleted Succssfully');
    }
}
