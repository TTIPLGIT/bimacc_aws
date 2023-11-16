<?php

namespace App\Http\Controllers;

use App\models\SecurityTypes;
use Illuminate\Http\Request;

class SecurityTypesController extends Controller
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
        $security_types = SecurityTypes::all();
        $securitytypes_count = $security_types->count();

        return view('securitytypes.index', compact('security_types','securitytypes_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('securitytypes.create');
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
            'security_type_name' => 'required',
            'security_type_description' => 'required',
            'security_type_code' => 'required|max:3|unique:security_types',
        ]);

        SecurityTypes::create($request->all());

        return redirect()->route('securitytypes.index')
                        ->with('success','Security Types Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SecurityTypes  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $securityType = SecurityTypes::findOrFail($id);
        return view('securitytypes.show', compact('securityType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SecurityTypes  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $securityType = SecurityTypes::withTrashed()->findOrFail($id);
        return view('securitytypes.edit', compact('securityType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SecurityTypes  $securityTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // $request->validate([
        //     'security_type_name' => 'required',
        //     'security_type_description' => 'required',
        //     'security_type_code' => 'required|max:3|unique:security_types',
        // ]);

        SecurityTypes::findOrFail($id)->update($request->all());

        return redirect()->route('securitytypes.index')
                        ->with('success','Security Types Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SecurityTypes  $securityTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $securityType = SecurityTypes::find($id);
        $securityType->delete();
        return redirect()->route('securitytypes.index')
                        ->with('success','Security Types Deleted Successfully.');
    }
}
