<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\ClaimantRegister;
use DB;
use Role; 

class MisclaimantController extends Controller
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
        return view('mis_claimantdetails.index', compact('claimantslist','claimant_type'));
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
        
        $from_date=$request->from_date;
        $from_date1=date('Y-m-d', strtotime($from_date));
      // echo json_encode($from_date1);exit;
        $received_date=$request->received_date;
         $received_date1=date('Y-m-d', strtotime($received_date));
         $claimant_type=$request->claimant_type;
          $country=$request->country;
//          $claimantslist = DB::select("SELECT *,cd.document_name  FROM claimantregister cl
// INNER JOIN claimant_respondant_type cr ON (cl.claimant_type =cr.id)
// inner JOIN users us ON (cl.user_id=us.id)
// left JOIN claimnoticedocumentdetails cd ON (cd.created_id =us.id)
//  where cd.document_type='UAA' and cl.claimant_type =".$claimant_type." and cl.country ='".$country."' and  DATE_FORMAT(cl.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cl.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
          if($claimant_type=='')
{ 
   
     $claimantslist = DB::select("SELECT *,cd.document_name,cd.id as document_id,cdd.id as name_id,cdd.document_name as name_doc,cdn.id as address_id, cdn.document_name as address_name   FROM claimantregister cl
INNER JOIN claimant_respondant_type cr ON (cl.claimant_type =cr.id)
inner JOIN users us ON (cl.user_id=us.id)
left JOIN claimnoticedocumentdetails cd ON (cd.created_id =us.id and  cd.document_type='UAA')
left JOIN claimnoticedocumentdetails cdd ON (cdd.created_id =us.id and  cdd.document_type='AMEND_NAME')
left JOIN claimnoticedocumentdetails cdn ON (cdn.created_id =us.id and  cdn.document_type='AMEND_USER')
 where  DATE_FORMAT(cl.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cl.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
}
else{

           $claimantslist = DB::select("SELECT *,cd.document_name,cd.id as document_id,cdd.id as name_id,cdd.document_name as name_doc,cdn.id as address_id, cdn.document_name as address_name   FROM claimantregister cl
INNER JOIN claimant_respondant_type cr ON (cl.claimant_type =cr.id)
inner JOIN users us ON (cl.user_id=us.id)
left JOIN claimnoticedocumentdetails cd ON (cd.created_id =us.id and  cd.document_type='UAA')
left JOIN claimnoticedocumentdetails cdd ON (cdd.created_id =us.id and  cdd.document_type='AMEND_NAME')
left JOIN claimnoticedocumentdetails cdn ON (cdn.created_id =us.id and  cdn.document_type='AMEND_USER')
 where cl.claimant_type =".$claimant_type." and  DATE_FORMAT(cl.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cl.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
       }



          return view('mis_claimantdetails.list', compact('claimantslist'));
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
