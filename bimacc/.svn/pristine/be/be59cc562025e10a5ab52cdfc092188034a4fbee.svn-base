<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\AdministrationFees;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\User;
use App\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;
use Carbon\Carbon;

class AdministrationFeesController extends Controller
{
    public function index(Request $request)
    {
    	$administrationfees = AdministrationFees::all(); 
    	$disputeCategory = DisputeCategory::all();
    	$disputeSubCategory = DisputeSubcategory::all();
     	$date = Carbon::now();  
			
    	
    	return view('administrationfees.index', compact('administrationfees','disputeCategory','disputeSubCategory','date'));
    }

    public function create()
    {   $disputeCategory = DisputeCategory::all();
        $disputeSubCategory = DisputeSubcategory::all();
        $date = Carbon::now(); 	
		return view('administrationfees.create', compact('disputeCategory','disputeSubCategory','date'));
    }

    public function store(Request $request, $id = null)
    {
    	$request->validate([
    		'administration_fees' => 'required',
    	]);

    	$administrationfees = new AdministrationFees();
    	$administrationfees->administration_fees = $request->administration_fees;
    	$administrationfees->fees_description = $request->fees_description;
        $administrationfees->claim_amount_from = $request->claim_amount_from;
        $administrationfees->claim_amount_to = $request->claim_amount_to;
        $administrationfees->currency = $request->currency;
    	$administrationfees->created_id = Auth::user()->id;
    	$administrationfees->save();
    	return Redirect()->route('administrationfees.index')
    					->with('success', 'Administration Fees Created Successfully');
    }
    
    public function edit($id)
    {
    	$administrationfees = AdministrationFees::find($id);
        $disputeCategory = DisputeCategory::all();
        $disputeSubCategory = DisputeSubcategory::all();                    

        return view('administrationfees.edit', compact('administrationfees','disputeCategory','disputeSubCategory'));
    }
    public function update(Request $request, $id = null)
    {
    	$request->validate([
    		'administration_fees' => 'nullable',
    	]);

    	AdministrationFees::findOrfail($id)->update($request->all());

    	return Redirect()->route('administrationfees.index')
    					->with('Success', 'Administration Fees Updated Successfully');

    }


    public function destroy($id)
    {
		$administrationfees = AdministrationFees::find($id);
		$administrationfees->delete();
		return Redirect()->route('administrationfees.index')
    					->with('Success', 'Administration
                            Fees Deleted Successfully');
    }

   


}
