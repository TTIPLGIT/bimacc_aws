<?php

namespace App\Http\Controllers;

use App\models\DisputeSubcategory;
use App\models\DisputeCategory;
use App\models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\View;
use DB;
use Illuminate\Support\Facades\Validator;
use Rule;

class DisputeSubcategoryController extends Controller
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
        $dispute_subcategories = DisputeSubcategory::all();
        $disputeCategory = DisputeCategory::all(); 
        $dispute_categories = DB::table('dispute_categories')->get();
        //print_r($dispute_subcategories);    
        return view('disputesubcategory.index', compact('dispute_subcategories', 'disputeCategory','dispute_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $disputeCategory = DisputeCategory::all();    

        return view('disputesubcategory.create', compact('disputeCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subcategory_name' => 'required',
            'subcategory_description' => 'required',
            'dispute_subcategory_Code' => 'required|max:3|unique:dispute_subcategories',                      
        ]);

        DisputeSubcategory::create($request->all());

        return redirect()->route('disputesubcategory.index')
                        ->with('success','Dispute SubCategory Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DisputeSubcategory  $disputeSubcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disputeSubcategory = DisputeSubcategory::findOrFail($id);
        return view('disputesubcategory.show', compact('disputeSubcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisputeSubcategory  $disputeSubcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id = null)
    {
        $disputeSubcategory = DisputeSubcategory::with('dispute_categories')->withTrashed()->findOrFail($id);
        //print_r($disputeSubcategory);
        $dispute_categories = DisputeCategory::all();

               
        return view('disputesubcategory.edit', compact('disputeSubcategory'))->with('dispute_categories', $dispute_categories);       
       
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisputeSubcategory  $disputeSubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // $request->validate([
        //     'subcategory_name' => 'required',
        //     'subcategory_description' => 'required',
        //     'dispute_subcategory_Code' => 'required|max:3|',          
                        
        // ]);
        DisputeSubcategory::findOrFail($id)->update($request->all());     

        return redirect()->route('disputesubcategory.index')
                        ->with('success','Dispute SubCategory Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisputeSubcategory  $disputeSubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disputeSubcategory = DisputeSubcategory::find($id);
        $disputeSubcategory->delete();
        return redirect()->route('disputesubcategory.index')
                        ->with('success','Dispute Sub Category Deleted Successfully.');
    }
}
