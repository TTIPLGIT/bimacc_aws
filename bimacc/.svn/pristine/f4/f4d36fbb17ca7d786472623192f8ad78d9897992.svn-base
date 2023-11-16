<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\ClaimantRegister;
use DB;
use Role;

class ClaimantsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $user_id = (auth()->check()) ? auth()->user()->id : null;
         // echo $user_id;exit;
      if ( $user_id==null)
      {

        return view('auth.login'); 
      }
        $claimantslist = DB::select("SELECT * FROM claimantregister cl
INNER JOIN claimant_respondant_type cr ON (cl.claimant_type =cr.id)
inner JOIN users us ON (cl.user_id=us.id)
");
 $claimant_type = DB::select("SELECT claimant_respondant_type_name,id FROM claimant_respondant_type WHERE TYPE='claimant' order by claimant_respondant_type_name asc ");
        return view('claimantslist.index', compact('claimantslist','claimant_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo ("jhgjhg");exit;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
