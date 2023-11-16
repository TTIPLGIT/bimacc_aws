<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ClaimantRespondantType;
use App\User;
use App\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;

class ClaimantRespondantTypeController extends Controller
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
        $claimant_respondant_type = ClaimantRespondantType::all();

        //echo $claimant_respondant_type; exit;
       // $claimant_respondantcount = $claimant_respondant_type->count();
        
        return view('claimant_respondant_type.index', compact('claimant_respondant_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('claimant_respondant_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        // $this->validate($request, [
        //     'type' => 'required',
        //     'claimant_respondant_type_name' =>'required',
        //     'claimant_respondant_type_Code' => 'required|max:2',                      
        // ]);

        $claimant_respondant_type = new ClaimantRespondantType();
        $claimant_respondant_type->type = $request->type;
        $claimant_respondant_type->claimant_respondant_type_name = $request->claimant_respondant_type_name;
        $claimant_respondant_type->claimant_respondant_type_description = $request->claimant_respondant_type_description;
        $claimant_respondant_type->claimant_respondant_type_Code = $request->claimant_respondant_type_Code;
        $claimant_respondant_type->created_id = Auth::user()->id;
        $claimant_respondant_type->save();
        return redirect()->route('claimant_respondant_type.index')
                       ->with('success','Claimant/Respondent Type Added Successfully');
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
        // $request->validate([
        //     'type' => 'required',
        //     'claimant_respondant_type_name' =>'required',
        //     'claimant_respondant_type_Code' => 'required|max:2',
        // ]);
        
        ClaimantRespondantType::findOrFail($id)->update($request->all());
        $claimant_respondant_type = ClaimantRespondantType::all();
               return redirect()->route('claimant_respondant_type.index')
                       ->with('success','Claimant/Respondent Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $claimant_respondant_type = ClaimantRespondantType::find($id);
        $claimant_respondant_type->delete();
        return redirect()->route('claimant_respondant_type.index')
                        ->with('success','Types Deleted Successfully.');
    }
}
