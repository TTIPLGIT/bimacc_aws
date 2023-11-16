<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ClaimNoticeStage;
use App\models\claimstagestatus;
use App\models\claimnotice_petion_arbitrationno;
use App\models\ClaimantNoticeStatus;
use App\models\notifications;
use App\models\hearing_configuration;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use DB;
use Redirect;
use \Crypt;
use File;


use App\AlfrescoDocument;


class ClaimNoticeStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //  $claimant_respondant_type = ClaimantRespondantType::all();

       //  //echo $claimant_respondant_type; exit;
       // // $claimant_respondantcount = $claimant_respondant_type->count();

       //  return view('claimant_respondant_type.index', compact('claimant_respondant_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('ClaimNoticeStage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        // echo "zsdzxczczxc"; exit;
        // $this->validate($request, [
        //     'claimantnotice_Stage' => 'required',
        //     'claimantnotice_stage_description' =>'required',
        //     'stagefromdate' => 'required',                      
        //     'claimnoticeid' => 'required',                      
        //     'stagetodate' => 'required',                      
        // ]);

        // $Claim_Notice_Stage = new ClaimNoticeStage();
        // $Claim_Notice_Stage->claimantnotice_Stage = $request->claimantnotice_Stage;
        // $Claim_Notice_Stage->claimantnotice_stage_description = $request->claimantnotice_stage_description;
        // $Claim_Notice_Stage->stagefromdate = $request->stagefromdate;
        // $Claim_Notice_Stage->stagetodate = $request->stagetodate;
        // $Claim_Notice_Stage->claimnoticeid = $request->claimnoticeid;
        // $Claim_Notice_Stage->created_id = Auth::user()->id;
        // $Claim_Notice_Stage->save();
        // return redirect()->route('ArbitratorAllocatedClaims.show',$request->claimnoticeid)
        // ->with('success','Stage Created successfully');
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
         //return view('ClaimNoticeStage.edit');
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
         //echo $request->claimantnotice_stage_status; exit;
      $arbitration_petionno = $request->arbitration_petionno;
      $claimantnotice_Stage =$request->claimantnotice_Stage;
      $folderName = $request->arbitration_petionno;
      $documentDirectory = $request->alfresco_stage_folderuniqueid;
      $claimnoticeID = $request->claimnoticeid;
      $stageid = $request->claimnoticestageid;


      $stagetodate = $request->stagetodate;
    //echo $stagetodate; exit;
      $stagefromdate =  date('Y-m-d', strtotime($stagetodate));
      $stagetodate =  date('Y-m-d', strtotime($stagefromdate. ' + 30 days'));

      $table = DB::table('claimantnotice_stage')
      ->where('id' , $id)
      ->update(['claimantnotice_stage_status' => $request->claimantnotice_stage_status]);

      $claimstagestatus = new claimstagestatus(); 
      $claimstagestatus->stageid = $id;
      $claimstagestatus->claimnoticestatus  = $request->claimantnotice_stage_status;
      $claimstagestatus->created_id = Auth::user()->id;        
      $claimstagestatus->save();

      $table = DB::table('claimantnotice')
      ->where('id' , $request->claimnoticeid)
      ->update(['claimnoticestatus' => $claimantnotice_Stage." - ".$request->claimantnotice_stage_status]);
      $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
      $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
      $ClaimantNoticeStatus->claimantnoticestatus = $claimantnotice_Stage.' - '.$request->claimantnotice_stage_status;
      $ClaimantNoticeStatus->userid = Auth::user()->id; 
      $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));  
      $ClaimantNoticeStatus->created_id = Auth::user()->id;        
      $ClaimantNoticeStatus->save();

      $newclaimant = [
        'body' => $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$request->claimantnotice_stage_status,
        'actionURL' => route('claimantsnoticelist.index'),
      ];


      $type = 'ClaimNotice';
      $latest = '1';
      $name = $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$request->claimantnotice_stage_status;
      $notifiable_type = $request->claimnoticeno.' '.$request->claimantnotice_stage_description.' '.$request->claimantnotice_stage_status;
      $newclaimant =  json_encode($newclaimant);
      $created_at = now();
      $updated_at = now();


      if ($request->claimantnotice_stage_status=='Completed' && $claimantnotice_Stage !='Award Stage') 
      {
        // echo $claimantnotice_Stage;exit;
// echo $request->claimantnotice_stage_status;exit;
        if ($claimantnotice_Stage=='Pleadings') 
        {
          $claimantnotice_Stage = "Evidence";
          $claimantnotice_stage_description =" Evidence "; 
        }
        elseif ($claimantnotice_Stage=='Evidence') {
          $claimantnotice_Stage = "Hearing-1";
          $claimantnotice_stage_description ="Submissions and Hearing";




          $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
          foreach($emails as $Adminemail){

            $hearing_configurationrespondent = new hearing_configuration();
            $hearing_configurationrespondent->user_id = $Adminemail->id;
            $hearing_configurationrespondent->claim_id = $claimnoticeID;
            $hearing_configurationrespondent->user_status = '1';
            $hearing_configurationrespondent->hearing_status = '0';
            $hearing_configurationrespondent->hearing_number = '1';
            $hearing_configurationrespondent->display_order = '1';
            $hearing_configurationrespondent->created_id = Auth::user()->id;
            $hearing_configurationrespondent->save();
          }


          $hearing_configurationarbitrator = new hearing_configuration();
          $hearing_configurationarbitrator->user_id = Auth::user()->id;
          $hearing_configurationarbitrator->claim_id = $claimnoticeID;
          $hearing_configurationarbitrator->user_status = '1';
          $hearing_configurationarbitrator->hearing_status = '0';
          $hearing_configurationarbitrator->hearing_number = '1';
          $hearing_configurationarbitrator->display_order = '2';
          $hearing_configurationarbitrator->created_id = Auth::user()->id;
          $hearing_configurationarbitrator->save();


          $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
            res.phone as daytimetelephone,res.email from claimantnotice sm 
            INNER  join claimantregister res on (res.user_id =  sm.userid) 
            where sm.id=".$request->claimnoticeid);

          foreach ($claimant as $claimants)
          {

            $hearing_configurationclaimant = new hearing_configuration();
            $hearing_configurationclaimant->user_id = $claimants->userid;
            $hearing_configurationclaimant->claim_id = $claimnoticeID;
            $hearing_configurationclaimant->user_status = '0';
            $hearing_configurationclaimant->hearing_status = '0';
            $hearing_configurationclaimant->hearing_number = '1';
            $hearing_configurationclaimant->display_order = '3';
            $hearing_configurationclaimant->created_id = Auth::user()->id;
            $hearing_configurationclaimant->save();

          }


          $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, 
            res.daytimetelephone,res.email from claimantnotice sm 
            INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) 
            where sm.id=".$request->claimnoticeid);

          foreach ($RespondentInformation as $RespondentInformations)
          {


           $hearing_configurationrespondent = new hearing_configuration();
           $hearing_configurationrespondent->user_id = $RespondentInformations->user_id;
           $hearing_configurationrespondent->claim_id = $claimnoticeID;
           $hearing_configurationrespondent->user_status = '0';
           $hearing_configurationrespondent->hearing_status = '0';
           $hearing_configurationrespondent->hearing_number = '1';
           $hearing_configurationrespondent->display_order = '4';
           $hearing_configurationrespondent->created_id = Auth::user()->id;
           $hearing_configurationrespondent->save();

         }

       }
       elseif($claimantnotice_Stage=='Hearing-1')
       {
        $claimantnotice_Stage = "Hearing-2";
        $claimantnotice_stage_description ="Submissions and Hearing";
      }
      else
      {
       $claimantnotice_Stage = "Award Stage";
       $claimantnotice_stage_description ="Award Stage"; 
       
     }


     $fromDate = $stagefromdate;
     $todate = $stagetodate;

     $ArbitratorStaging = str_replace('/', '_', $request->arbitration_petionno).'_'.$claimantnotice_Stage;
     $parentFolder = 'documentLibrary/Claim/ClaimPetition/'.str_replace('/', '_', $request->arbitration_petionno);
     $folderName = $ArbitratorStaging;
     $folderTitle = 'Staging '. $ArbitratorStaging;
     $folderDescription = 'Claim Notice Staging'. $ArbitratorStaging;
     // Command Start
      $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
     // command end  

     $Claim_Notice_Stage = new ClaimNoticeStage();
     $Claim_Notice_Stage->claimantnotice_Stage = $claimantnotice_Stage;
     $Claim_Notice_Stage->claimantnotice_stage_description = $claimantnotice_stage_description;
     // command start
      $Claim_Notice_Stage->alfresco_stage_folderuniqueid = $documentDirectory;
     // command end
     $Claim_Notice_Stage->stagefromdate = $fromDate;
     $Claim_Notice_Stage->stagetodate = $todate;
     $Claim_Notice_Stage->claimnoticeid = $request->claimnoticeid;
     $Claim_Notice_Stage->claimantnotice_stage_status = "InProgress";
     $Claim_Notice_Stage->created_id = Auth::user()->id;
     $Claim_Notice_Stage->save();
     $Claim_Notice_StageID =  DB::getPdo()->lastInsertId();

     $claimstagestatus = new claimstagestatus(); 
     $claimstagestatus->stageid = $Claim_Notice_StageID;
     $claimstagestatus->claimnoticestatus  = $claimantnotice_Stage.' InProgress';
     $claimstagestatus->created_id = Auth::user()->id;        
     $claimstagestatus->save();


     $stagestatus = $claimantnotice_Stage.' InProgress';
     $table = DB::table('claimantnotice')
     ->where('id' , $request->claimnoticeid)
     ->update(['claimnoticestatus' =>  $claimantnotice_Stage.' InProgress']);

     $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
     $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
     $ClaimantNoticeStatus->claimantnoticestatus =$claimantnotice_Stage.' InProgress';
     $ClaimantNoticeStatus->userid = Auth::user()->id;  
     $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' )); 
     $ClaimantNoticeStatus->created_id = Auth::user()->id;        
     $ClaimantNoticeStatus->save();

 // echo "SELECT sm.claimnoticeno,res.firstname,res.user_id, res.daytimetelephone,res.email from claimantnotice sm 
 //      INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$id; exit;
     
    $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.firstname,res.user_id, res.daytimetelephone,res.email from claimantnotice sm 
      INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$request->claimnoticeid);
    // echo json_encode($RespondentInformation); exit;
     foreach ($RespondentInformation as $RespondentInformations)
     {
        // echo "jmkj";exit;
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $RespondentInformations->user_id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;   
      $notification->registration_claimnotice_id =$request->claimnoticeid; 
      $notification->save();  

      $repondentmail = $RespondentInformations->email;
      $data = array(
       'email' => $RespondentInformations->email,
        'firstname' => $RespondentInformations->firstname,
        'email' => $RespondentInformations->email,
        'claimnoticeno' => $RespondentInformations->claimnoticeno,
        'arbitration_petionno' => $arbitration_petionno
      );
      

      //send email to respondant
      if ($claimantnotice_Stage=='Evidence') 
        {
 // echo("djjf");exit;
      Mail::send('emails.respondant_evidence',  ["data3"=>$data], function($message) use ($repondentmail,$data,$stagestatus,$arbitration_petionno){
        $message->to($repondentmail)
        ->subject('Electronic Arbitration System (EAS) -Claimants Evidence Initiated (No:'.$arbitration_petionno.')');  
       }); 
    }
    else if ($claimantnotice_Stage=='Hearing-1')
    {
       // echo("hearing1");exit;
       Mail::send('emails.respondant_hearing1', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
     ->subject(' Electronic Arbitration System (EAS) - Claim Petition ('.$arbitration_petionno.') -  Hearing Stage');
      }); 
    }
    
    elseif ($claimantnotice_Stage=='Hearing-2')
    {
       // echo("hearing2");exit;
      Mail::send('emails.respondant_heraing2', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($repondentmail)
     ->subject('Electronic Arbitration System (EAS) - Claim Petition ('.$arbitration_petionno.') - Hearing Number: 2 Initiated');
    
      }); 
    }
  else
  {
  // echo("award");exit;
  Mail::send('emails.respondant_award', ["data3"=>$data], function($message) use ($repondentmail,$data,$claimantnotice_Stage,$arbitration_petionno)
  {
      $message->to($repondentmail)
     ->subject(' Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.')  - Hearing Stage Complete ');
      }); 
  }
    }

    $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
    foreach($emails as $Adminemail){
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $Adminemail->id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at; 
      $notification->registration_claimnotice_id =$request->claimnoticeid;    
      $notification->save();       
    }

    $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
      res.phone as daytimetelephone,res.email,res.username,sm.respondant_status from claimantnotice sm 
      INNER  join claimantregister res on (res.user_id =  sm.userid)  
      where sm.id=".$request->claimnoticeid);

    foreach ($claimant as $claimants)
    {

      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $claimants->userid;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at; 
      $notification->registration_claimnotice_id =$request->claimnoticeid;    
      $notification->save(); 
      $claimantsmail  = $claimants->email;
      
       $data = array(
      'email' => $claimants->email,
      'username' => $claimants->username,
       'claimnoticeno' => $claimants->claimnoticeno,
       
       'arbitration_petionno' => $arbitration_petionno,

   
      );
       // echo $claimantnotice_Stage; exit;
      if ($claimantnotice_Stage=='Evidence') 
        {
// echo("djjf");exit;
      Mail::send('emails.claim_evidence',  ["data1"=>$data], function($message) use ($claimantsmail,$data,$stagestatus,$arbitration_petionno){
        $message->to($claimantsmail)
        ->subject(' Electronic Arbitration System (EAS) -Claimants Evidence Claim Petition  (No:'.$arbitration_petionno.')'); 

   
      }); 
    }
    elseif ($claimantnotice_Stage=='Hearing-1')
    {
      // echo("hearing1");exit;
       Mail::send('emails.claimant_hearing1', ["data1"=>$data], function($message) use ($claimantsmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantsmail)
     ->subject(' Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') -  Hearing Stage');
      }); 

    }
    
    elseif ($claimantnotice_Stage=='Hearing-2'){
      // echo("hearing2");exit;
      Mail::send('emails.claimant_hearing2', ["data1"=>$data], function($message) use ($claimantsmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantsmail)
     ->subject(' Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.') - Hearing Number: 2 Initiated');
      }); 

    }
else{
  // echo("award");exit;
  Mail::send('emails.claimant_award', ["data1"=>$data], function($message) use ($claimantsmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantsmail)
     ->subject(' Electronic Arbitration System (EAS) - Claim Petition (No:'.$arbitration_petionno.')  - Hearing Stage Complete');
      }); 

}



    }
  }
  else if ($request->claimantnotice_stage_status=='Award Reserved By Arbitrator' ) {

    // echo "Sample"; exit;
    // echo ($claimnoticeID);exit;
      $nature_of_award = $request->nature_of_award;
         $delete='1';
       $table = DB::table('claimantnotice_stage')
     ->where('id' , $stageid)
     ->update(['nature_of_award' => $nature_of_award],
              );
     $table =DB::table('claimnoticedocumentdetails')
     ->where(['stageid'=> $stageid, 'claimnoticeid' => $claimnoticeID])
     ->update(['is_delete'=>$delete]);


    if($request->hasFile('awardedstatementdocument'))
    {

      $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno);
      $imageFile = $request->file('awardedstatementdocument');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }
 if($request->hasFile('arbitrator_sign'))
    {

      $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno);
      $imageFile = $request->file('arbitrator_sign');
      $imageName = $imageFile->getClientOriginalName();
      $imageFile->move($storagePath, $imageName);
    }


    $stagestatus = $claimantnotice_Stage.' '.$request->claimantnotice_stage_status;

    $table = DB::table('claimantnotice')
    ->where('id' , $request->claimnoticeid)
    ->update(['claimnoticestatus' => $request->claimantnotice_stage_status],['awardedstatement' => $request->awardedstatement]);

    $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
    $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
    $ClaimantNoticeStatus->claimantnoticestatus = $request->claimantnotice_stage_status;
    $ClaimantNoticeStatus->userid = Auth::user()->id;
    $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));   
    $ClaimantNoticeStatus->created_id = Auth::user()->id;        
    $ClaimantNoticeStatus->save();

       $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.firstname,res.user_id, res.daytimetelephone,res.email from claimantnotice sm 
      INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) where sm.id=".$request->claimnoticeid);
    foreach ($RespondentInformation as $RespondentInformations)
    {
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $RespondentInformations->user_id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;  
      $notification->registration_claimnotice_id =$request->claimnoticeid;   
      $notification->save(); 

      $repondentmail = $RespondentInformations->email;
      $data = array(
        'email' => $RespondentInformations->email,
        'firstname' => $RespondentInformations->firstname,
        'email' => $RespondentInformations->email,
        'claimnoticeno' => $RespondentInformations->claimnoticeno,
        'arbitration_petionno' => $arbitration_petionno
      );

      //send email to respondant
// echo "jjh"; exit;
      Mail::send('emails.arbitrator_award1', ["data3"=>$data], function($message) use ($repondentmail,$data,$stagestatus,$arbitration_petionno){
        $message->to($repondentmail)
       
         ->subject(' Reg.Electronic Arbitration System - Claim Petition (No:'.$arbitration_petionno.')  - Award Stage - Award Reserved'); 

      });      

    }

    $arbitratorsid = DB::select("select arbitrator_id,claimnoticeid,us.email,us.username,cn.respondant_status from claimant_arbitrator_configuration arc
INNER JOIN claimantnotice cn ON (cn.id= arc.claimnoticeid) 
inner JOIN users us on (us.id = arc.arbitrator_id)  where arc.isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);

    foreach ($arbitratorsid as $arbitratorid) {

      $arbitratoremail = $arbitratorid->email;

      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $arbitratorid->arbitrator_id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;    
      $notification->registration_claimnotice_id =$claimnoticeID;  
      $notification->save(); 

      $data = array(
        'email' => $arbitratorid->email,
      'username'=>$arbitratorid->username,
      'arbitration_petionno'=>$arbitration_petionno,
      'respondant_status'=>$arbitratorid->respondant_status,
      );
// echo "award"; exit;
      Mail::send('emails.awardarbitrator', ["data3"=>$data], function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
        $message->to($arbitratoremail)
        ->subject('Electronic Arbitration System (EAS)-  Award - Claim Petition (No:'.$arbitration_petionno.')) Award Stage ');     
      }); 
     

    }

    $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
    foreach($emails as $Adminemail){
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $Adminemail->id;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at; 
      $notification->registration_claimnotice_id =$request->claimnoticeid;    
      $notification->save();       

    }

    $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
      res.phone as daytimetelephone,res.email,res.username,sm.respondant_status from claimantnotice sm 
      INNER  join claimantregister res on (res.user_id =  sm.userid)  
      where sm.id=".$request->claimnoticeid);
    foreach ($claimant as $claimants)
    {
      $notification = new notifications(); 
      $notification->type = $type;
      $notification->latest = $latest;
      $notification->name = $name;
      $notification->notifiable_type = $notifiable_type;
      $notification->data = $newclaimant;
      $notification->notifiable_id = $claimants->userid;  
      $notification->created_at = $created_at;
      $notification->updated_at = $updated_at;  
      $notification->registration_claimnotice_id =$request->claimnoticeid;   
      $notification->save();  

      $claimantsmail  = $claimants->email;
      $data = array(
         'email' => $claimants->email,
      'username' => $claimants->username,
       'claimnoticeno' => $claimants->claimnoticeno,
       
       'arbitration_petionno' => $arbitration_petionno,

      );

      Mail::send('emails.arbitrator_award', ["data1"=>$data], function($message) use ($claimantsmail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($claimantsmail)
     ->subject(' Reg.Electronic Arbitration System - Claim Petition (No:'.$arbitration_petionno.')  - Award Stage - Award Reserved'); 
      }); 

    }

    $this->storeDocument($folderName, $documentDirectory,$claimnoticeID,$stageid,$request->remarks);


  }
  else
  {

    // $stagestatus = $claimantnotice_Stage.' '.$request->claimantnotice_stage_status;

    // $RespondentInformation = DB::select("SELECT sm.claimnoticeno,res.user_id, 
    //   res.daytimetelephone,res.email from claimantnotice sm 
    //   INNER  join respondantdetails res on (res.claimnoticeid =  sm.id) 
    //   where sm.id=".$request->claimnoticeid);

    // foreach ($RespondentInformation as $RespondentInformations)
    // {
    //   $notification = new notifications(); 
    //   $notification->type = $type;
    //   $notification->latest = $latest;
    //   $notification->name = $name;
    //   $notification->notifiable_type = $notifiable_type;
    //   $notification->data = $newclaimant;
    //   $notification->notifiable_id = $RespondentInformations->user_id;  
    //   $notification->created_at = $created_at;
    //   $notification->updated_at = $updated_at;    
    //   $notification->registration_claimnotice_id =$request->claimnoticeid; 
    //   $notification->save();    

    //   $repondentmail = $RespondentInformations->email;
    //   $data = array(
    //     'email' => $RespondentInformations->email,
    //   );

    //   //send email to respondant

    //   Mail::send('emails.respondant', $data, function($message) use ($repondentmail,$data,$stagestatus,$arbitration_petionno){
    //     $message->to($repondentmail)
    //     ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - '.$stagestatus);   
    //   });   

    // }

    // $emails = DB::select("SELECT email,id from users WHERE roles_id = 1");
    // foreach($emails as $Adminemail){
    //   $notification = new notifications(); 
    //   $notification->type = $type;
    //   $notification->latest = $latest;
    //   $notification->name = $name;
    //   $notification->notifiable_type = $notifiable_type;
    //   $notification->data = $newclaimant;
    //   $notification->notifiable_id = $Adminemail->id;  
    //   $notification->created_at = $created_at;
    //   $notification->updated_at = $updated_at;  
    //   $notification->registration_claimnotice_id =$request->claimnoticeid;   
    //   $notification->save();       
    // }
    // $claimant = DB::select("SELECT sm.claimnoticeno,sm.userid, 
    //   res.phone as daytimetelephone,res.email from claimantnotice sm 
    //   INNER  join claimantregister res on (res.user_id =  sm.userid) 
    //   where sm.id=".$request->claimnoticeid);

    // foreach ($claimant as $claimants)
    // {
    //   $notification = new notifications(); 
    //   $notification->type = $type;
    //   $notification->latest = $latest;
    //   $notification->name = $name;
    //   $notification->notifiable_type = $notifiable_type;
    //   $notification->data = $newclaimant;
    //   $notification->notifiable_id = $claimants->userid;  
    //   $notification->created_at = $created_at;
    //   $notification->updated_at = $updated_at;  
    //   $notification->registration_claimnotice_id =$request->claimnoticeid;   
    //   $notification->save();  

    //   $claimantsmail  = $claimants->email;
    //   $data = array(
    //     'email' => $claimants->email,
    //   );

    //   Mail::send('emails.claim_petition', $data, function($message) use ($claimantsmail,$data,$stagestatus,$arbitration_petionno){
    //     $message->to($claimantsmail)
    //     ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - '.$stagestatus);   
    //   });      
    // }
  }

  return redirect()->route('ArbitratorAllocatedClaims.show',$request->claimnoticeid)
  ->with('success','Stage Updated Successfully');
}


private function storeDocument($claimpetion_arbitrationNo, $documentDirectory,$claimnoticeID,$stageid,$remarks)
{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimpetion_arbitrationNo);

    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claim Petion Document';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      if($response !=''){
      $getting_code=json_decode($response);
      $getting_code2=$getting_code->status->code;
    }
     else{
      $getting_code2='';
     }
     if($getting_code2=='200')
     { 
      $objResponse = json_decode($response, TRUE);

       $documentNode = $objResponse['nodeRef'];
      $arrWorkSpace = explode('://', $documentNode);
      $arrStore = explode('/', $arrWorkSpace[1]);
      $workspace = $arrWorkSpace[0];
      $spaceStore = $arrStore[0];
      $alfrescoDocumentName = $arrStore[1];
     //  $delete='deleted';

     //  $table =DB::table('claimnoticedocumentdetails')
     // ->where(['id'=> $stageid, 'claimnoticeid' => $claimnoticeID])
     // ->update('is_delete'=>$delete);
     // $bank_cliam_update = DB::table('banking_account_detail')
     // ->where(['claim_notice_id'=> $claimnoticeid,'is_respondant'=>'1'])
     // ->update(['claim_id' => $claimdetails_id]);

      DB::table('claimnoticedocumentdetails')->insert([
        'claimnoticeid' => $claimnoticeID,
        'stageid'=>$stageid,
        'node_ref' => $documentNode,
        'work_space' => $workspace,
        'space_store' => $spaceStore,
        'alfresco_document_name' => $alfrescoDocumentName,
        'document_name' => $value,
        'file_extension' => $fileExtension,
        'document_type' => 'Stage Documents',
        'remarks' => $remarks,
        'created_id' => auth()->user()->id,
        'created_at' => NOW()
      ]);
    }
    else{

      
        return redirect()->route('ArbitratorAllocatedClaims.show',$claimnoticeid)
  ->with('success','Stage Updated Successfully');
        File::cleanDirectory($fileDirPath);
      }
    }
    File::cleanDirectory($fileDirPath);
  }
  catch(Exception $exc)
  {

  }
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
      return redirect()->route('ArbitratorAllocatedClaims.show',$request->claimnoticeid)
      ->with('success','Stage Updated Successfully');
    }
  }
