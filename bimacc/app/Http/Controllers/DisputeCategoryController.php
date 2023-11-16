<?php

namespace App\Http\Controllers;

use App\models\DisputeCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\View;

class DisputeCategoryController extends Controller
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
        $dispute_categories = DisputeCategory::all();        

        return view('disputecategory.index', compact('dispute_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {         
        return view('disputecategory.create');
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
            'category_name' => 'required',
            'category_description' => 'required',
            'dispute_category_Code' => 'required|max:3|unique:dispute_categories',
        ]);

        DisputeCategory::create($request->all());

        return redirect()->route('disputecategory.index')
                        ->with('success','Dispute Category Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disputeCategory = DisputeCategory::findOrFail($id);
        return view('disputecategory.show', compact('disputeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disputeCategory = DisputeCategory::withTrashed()->findOrFail($id);
        return view('disputecategory.edit', compact('disputeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisputeCategory  $dispute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // $request->validate([
        //     'category_name' => 'required',
        //     'category_description' => 'required',
        //     'dispute_category_Code' => 'required|max:3|',
        // ]);

        DisputeCategory::findOrFail($id)->update($request->all());

        return redirect()->route('disputecategory.index')
                    ->with('success','Dispute Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisputeCategory  $disputeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disputeCategory = DisputeCategory::find($id);
        $disputeCategory->delete();
        return redirect()->route('disputecategory.index')
                        ->with('success','Dispute Category Deleted Successfully.');
    }
}
