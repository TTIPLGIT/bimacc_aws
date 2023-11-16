<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use DB;


class MisrespondentController  extends Controller
{
    public function index()
    {
         $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login'); 
      }
      $claimant_type = DB::select("SELECT claimant_respondant_type_name,id FROM claimant_respondant_type WHERE TYPE='respondant' order by claimant_respondant_type_name asc ");
    	$respondantLists = DB::select('select us.mail_verify,cr.username,cr.organization_details,sm.claimnoticeno,res.name,crr.claimant_respondant_type_name,res.address,res.email,res.country,res.state,res.city,res.daytimetelephone,res.id,res.firstname from respondantdetails res
inner join claimantnotice sm on (sm.id = res.claimnoticeid)
inner join claimantregister cr on (cr.user_id = sm.userid)
INNER JOIN claimant_respondant_type crr ON (res.respondant_type =crr.id)
inner JOIN users us ON (res.user_id=us.id)
');
    	
    	 return view('mis_respondentdetails.index', compact('respondantLists','claimant_type'));

    }
public function store(Request $request)
    {
        
        $from_date=$request->from_date; 
        $from_date1=date('Y-m-d', strtotime($from_date));
      // echo json_encode($from_date1);exit;
        $received_date=$request->received_date;
         $received_date1=date('Y-m-d', strtotime($received_date));
         $claimant_type=$request->claimant_type;
          $country=$request->country;

if($claimant_type=='')
{
   
        

           $respondantLists = DB::select("select crr.claimant_respondant_type_name,cp.arbitration_petionno,us.mail_verify,cr.username,cr.organization_details,sm.claimnoticeno,res.name,crr.claimant_respondant_type_name,res.address,res.email,res.country,res.state,res.city,res.daytimetelephone,res.id,res.firstname,res.zipcode,crr.id,res.middlename,red.respondent_decision,red.remarks,res.lastname,cdd.id as name_id,cdd.document_name as name_doc,cdn.id as address_id, cdn.document_name as address_name from respondantdetails res
inner join claimantnotice sm on (sm.id = res.claimnoticeid)
left join claimnotice_petion_arbitrationno cp on (sm.id = cp.claimnoticeid)
inner join claimantregister cr on (cr.user_id = sm.userid)
INNER JOIN claimant_respondant_type crr ON (res.respondant_type =crr.id)
left JOIN respondents_decision red on(red.claim_notice_id=sm.id)

inner JOIN users us ON (res.user_id=us.id) 
left JOIN claimnoticedocumentdetails cdd ON (cdd.created_id =us.id and  cdd.document_type='AMEND_NAME')
left JOIN claimnoticedocumentdetails cdn ON (cdn.created_id =us.id and  cdn.document_type='AMEND_USER')
 where  DATE_FORMAT(res.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(res.created_at, '%Y-%m-%d')   <= '".$received_date1."'
");
         }
         else{
          $respondantLists = DB::select("select crr.claimant_respondant_type_name,cp.arbitration_petionno,us.mail_verify,cr.username,cr.organization_details,sm.claimnoticeno,res.name,crr.claimant_respondant_type_name,res.address,res.email,res.country,res.state,res.city,res.daytimetelephone,res.id,res.firstname,res.zipcode,crr.id,res.middlename,red.respondent_decision,red.remarks,cdd.id as name_id,res.lastname,cdd.document_name as name_doc,cdn.id as address_id, cdn.document_name as address_name from respondantdetails res
inner join claimantnotice sm on (sm.id = res.claimnoticeid)
left join claimnotice_petion_arbitrationno cp on (sm.id = cp.claimnoticeid)
inner join claimantregister cr on (cr.user_id = sm.userid)
INNER JOIN claimant_respondant_type crr ON (res.respondant_type =crr.id)
left JOIN respondents_decision red on(red.claim_notice_id=sm.id)
inner JOIN users us ON (res.user_id=us.id)
left JOIN claimnoticedocumentdetails cdd ON (cdd.created_id =us.id and  cdd.document_type='AMEND_NAME')
left JOIN claimnoticedocumentdetails cdn ON (cdn.created_id =us.id and  cdn.document_type='AMEND_USER')
 where  res.respondant_type =".$claimant_type." and  DATE_FORMAT(res.created_at, '%Y-%m-%d') >='" .$from_date1."' AND DATE_FORMAT(res.created_at, '%Y-%m-%d')   <= '".$received_date1."'
");
         }




          return view('mis_respondentdetails.list', compact('respondantLists'));
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
