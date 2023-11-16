<?php

namespace App\Http\Controllers;

use App\models\Country;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\View;

class CountryController extends Controller
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
        $Countries = Country::all();        

        return view('country.index', compact('Countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {         
        return view('country.create');
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
            'country_name' => 'required',
            'country_description' => 'required',
            'country_Code' => 'required|max:3|unique:countries',
        ]);

        Country::create($request->all());

        return redirect()->route('country.index')
                        ->with('success','Country Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Countries = Country::findOrFail($id);
        return view('country.show', compact('Countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Countries = Country::withTrashed()->findOrFail($id);
        return view('country.edit', compact('Countries'));
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

        Country::findOrFail($id)->update($request->all());

        return redirect()->route('country.index')
                    ->with('success','Country Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisputeCategory  $disputeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Countries = Country::find($id);
        $Countries->delete();
        return redirect()->route('country.index')
                        ->with('success','Country Deleted Successfully.');
    }
}
