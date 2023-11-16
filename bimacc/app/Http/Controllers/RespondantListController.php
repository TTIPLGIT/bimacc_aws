<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use DB;


class RespondantListController extends Controller
{
    public function index()
    {
         $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login'); 
      }
    	$respondantLists = DB::select('select us.mail_verify,cr.username,cr.organization_details,sm.claimnoticeno,res.name,crr.claimant_respondant_type_name,res.address,res.email,res.country,res.state,res.city,res.daytimetelephone,res.id,res.firstname from respondantdetails res
inner join claimantnotice sm on (sm.id = res.claimnoticeid)
inner join claimantregister cr on (cr.user_id = sm.userid)
INNER JOIN claimant_respondant_type crr ON (res.respondant_type =crr.id)
inner JOIN users us ON (res.user_id=us.id)
');
    	
    	return view('respondantlist.index', compact('respondantLists'));

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

}
