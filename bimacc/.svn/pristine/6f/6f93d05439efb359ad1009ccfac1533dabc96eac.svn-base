<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\ClaimantRegister;
use DB;
use Role;

class MisclaimpetitionController extends Controller
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
       $claimant_type = DB::select("sELECT am.*  FROM arbitration_masters am
        INNER JOIN users dc ON (am.user_id = dc.id)
        
        where am.deleted_at is NULL ");

      
        
        
      $dispute_categories = DB::select("SELECT category_name,id,deleted_at FROM dispute_categories WHERE deleted_at IS NULL ORDER BY order_by asc,category_name ASC "); 

      $claimstage = DB::select("select cs.id as stageid,cn.id as claimnotice_id,claimantnotice_stage as claimantnotice_stagenew,cn.claimnoticeno,cs.claimantnotice_stage,date_format(cs.updated_at,'%d-%m-%Y %H:%i:%s') as disposed_date,cpa.arbitration_petionno,am.firstname,date_format(cac.created_at,'%d-%m-%Y %H:%i:%s') created_at from claimantnotice_stage cs inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
INNER JOIN claimnotice_petion_arbitrationno cpa ON(cpa.claimnoticeid=cn.id)
INNER JOIN claimant_arbitrator_configuration cac ON(cac.claimnoticeid=cn.id)
INNER JOIN arbitration_masters am ON(am.user_id=cac.arbitrator_id) where cn.id = cs.claimnoticeid");
        $stage_document = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
        inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
        inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and cn.userid = cd.created_id)
        where cd.claimnoticeid=cn.id");
        $respondent_document = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
        inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
        inner join respondantdetails res on (res.claimnoticeid = cn.id)
        inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and res.user_id = cd.created_id)
        where cd.claimnoticeid=cn.id");
         $claim_status = DB::select("select cn.id as claimnoticeid,cn.claimnoticestatus claimnoticestatus FROM claimantnotice cn");
        return view('misclaimpetition.index', compact('dispute_categories','claimant_type','claimstage','stage_document','respondent_document','claim_status'));
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
          $dispute_categories_id=$request->dispute_categories_id;

          if($claimant_type=='')
{

    $claimstage = DB::select("select cs.id as stageid,cn.id as claimnotice_id,claimantnotice_stage as claimantnotice_stagenew,cn.claimnoticeno,cs.claimantnotice_stage_status,cs.claimantnotice_stage,cs.claimantnotice_stage_status,date_format(cs.updated_at,'%d-%m-%Y %H:%i:%s') as disposed_date,cpa.arbitration_petionno,am.firstname,date_format(cac.created_at,'%d-%m-%Y %H:%i:%s') created_at from claimantnotice_stage cs inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
INNER JOIN claimnotice_petion_arbitrationno cpa ON(cpa.claimnoticeid=cn.id)
INNER JOIN claimant_arbitrator_configuration cac ON(cac.claimnoticeid=cn.id)
INNER JOIN arbitration_masters am ON(am.user_id=cac.arbitrator_id) where cn.id = cs.claimnoticeid and DATE_FORMAT(cn.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cn.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
  }
  else{
    $claimstage = DB::select("select cs.id as stageid,cn.id as claimnotice_id,claimantnotice_stage as claimantnotice_stagenew,cn.claimnoticeno,cs.claimantnotice_stage,cs.claimantnotice_stage_status,date_format(cs.updated_at,'%d-%m-%Y %H:%i:%s') as disposed_date,cpa.arbitration_petionno,am.firstname,date_format(cac.created_at,'%d-%m-%Y %H:%i:%s') created_at from claimantnotice_stage cs inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
INNER JOIN claimnotice_petion_arbitrationno cpa ON(cpa.claimnoticeid=cn.id)
INNER JOIN claimant_arbitrator_configuration cac ON(cac.claimnoticeid=cn.id)
INNER JOIN arbitration_masters am ON(am.user_id=cac.arbitrator_id) where cn.id = cs.claimnoticeid and cac.arbitrator_id =".$claimant_type." and DATE_FORMAT(cn.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(cn.created_at, '%Y-%m-%d')   <= '".$received_date1."'");
  }
        $stage_document = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
        inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
        inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and cn.userid = cd.created_id)
        where cd.claimnoticeid=cn.id");
        $respondent_document = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
        inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
        inner join respondantdetails res on (res.claimnoticeid = cn.id)
        inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and res.user_id = cd.created_id)
        where cd.claimnoticeid=cn.id");
         $claim_status = DB::select("select cn.id as claimnoticeid,cn.claimnoticestatus claimnoticestatus FROM claimantnotice cn");
        return view('misclaimpetition.list', compact('claimstage','stage_document','respondent_document','claim_status'));
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
