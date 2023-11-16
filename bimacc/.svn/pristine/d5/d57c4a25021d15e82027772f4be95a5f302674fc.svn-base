<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ClaimNoticeStage;
use App\models\claimstagestatus;
use App\models\claimnotice_petion_arbitrationno;
use App\models\ClaimantNoticeStatus;
use App\models\notifications;
use App\models\ClaimStageExtension;
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


class ClaimStageExtensionController extends Controller
{


  public function update(Request $request, $id)
  {

   $arbitration_petionno = $request->arbitration_petionno;
   $claimantnotice_Stage =$request->claimantnotice_Stage;

   $folderName = $request->arbitration_petionno;
   $documentDirectory = $request->alfresco_stage_folderuniqueid;
   $claimnoticeID = $request->claimnoticeid;
   $stageid = $request->claimnoticestageid;
   $stageextendeddate =  date("Y-m-d", strtotime($request->stageextensionrequestdate));
   $stagestartdate = $request->stagefromdate;
   $stagetodate = $request->stagetodate;
   $stageextensionremarks = $request->stageextensionremarks;


   $table = DB::table('claimantnotice_stage')
   ->where('id' , $id)
   ->update([
    'claimantnotice_stage_status' => 'Stage Extend Request Created',
    'isextended' => 'Y',
    'stagetodate' => $stageextendeddate
  ]);

   $claimstagestatus = new claimstagestatus(); 
   $claimstagestatus->stageid = $id;
   $claimstagestatus->claimnoticestatus  = 'Stage Extend Request Created';
   $claimstagestatus->created_id = Auth::user()->id;        
   $claimstagestatus->save();

   $claimnoticestageextension = new ClaimStageExtension();

   $claimnoticestageextension->stageid =$id ;
   $claimnoticestageextension->stagestartdate = $stagestartdate;
   $claimnoticestageextension->stageenddate = $stagetodate;
   $claimnoticestageextension->stageextensiondate = $stageextendeddate;
   $claimnoticestageextension->requetedby = Auth::user()->id;        
   $claimnoticestageextension->created_id = Auth::user()->id;
   $claimnoticestageextension->requestedwhom = 'Claimant';
   $claimnoticestageextension->stageextensionstatus = 'Waiting For Approval';
   $claimnoticestageextension->stageextensionremarks = $stageextensionremarks;
   $claimnoticestageextension->save();


   $table = DB::table('claimantnotice')
   ->where('id' , $request->claimnoticeid)
   ->update(['claimnoticestatus' => $claimantnotice_Stage.' - Stage Extend Request Created']);

   $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
   $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
   $ClaimantNoticeStatus->claimantnoticestatus = $claimantnotice_Stage.' - Stage Extend Request Created';
   $ClaimantNoticeStatus->userid = Auth::user()->id;
   $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));   
   $ClaimantNoticeStatus->created_id = Auth::user()->id;        
   $ClaimantNoticeStatus->save();

  $newclaimant = [
    'body' => $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created',
    'actionURL' => route('claimantsnoticelist.index'),
  ];

  $type = 'ClaimNotice';
  $latest = '1';
  $name =  $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created';
  $notifiable_type =  $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created';
  $newclaimant =  json_encode($newclaimant);
  $created_at = now();
  $updated_at = now();


   $arbitratorsid = DB::select("select arbitrator_id,claimnoticeid,us.email from claimant_arbitrator_configuration arc inner join users us on (us.id = arc.arbitrator_id)  where isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);

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
    );

    Mail::send('emails.claimanttoarbitratorforextension', $data, function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - Claimant Extended Request against '.$claimantnotice_Stage.'.');     
    }); 
  }

  return redirect()->route('ClaimPetion.show',$request->claimnoticeid)
  ->with('success','Stage Extension Request Sent Successfully');
 }



  public function SendStageExtensionByRespondent(Request $request)
  {


  $arbitration_petionno = $request->arbitration_petionno;
   $claimantnotice_Stage =$request->claimantnotice_Stage;

   $folderName = $request->arbitration_petionno;
   $documentDirectory = $request->alfresco_stage_folderuniqueid;
   $claimnoticeID = $request->claimnoticeid;
   $stageid = $request->claimnoticestageid;

   $id = $stageid;


   $stageextendeddate =  date("Y-m-d", strtotime($request->stageextensionrequestdate));
   $stagestartdate = $request->stagefromdate;
   $stagetodate = $request->stagetodate;
   $stageextensionremarks = $request->stageextensionremarks;


   $table = DB::table('claimantnotice_stage')
   ->where('id' , $id)
   ->update([
    'claimantnotice_stage_status' => 'Stage Extend Request Created',
    'isextended' => 'Y',
    'stagetodate' => $stageextendeddate
  ]);

   $claimstagestatus = new claimstagestatus(); 
   $claimstagestatus->stageid = $id;
   $claimstagestatus->claimnoticestatus  = 'Stage Extend Request Created';
   $claimstagestatus->created_id = Auth::user()->id;        
   $claimstagestatus->save();

   $claimnoticestageextension = new ClaimStageExtension();

   $claimnoticestageextension->stageid =$id ;
   $claimnoticestageextension->stagestartdate = $stagestartdate;
   $claimnoticestageextension->stageenddate = $stagetodate;
   $claimnoticestageextension->stageextensiondate = $stageextendeddate;
   $claimnoticestageextension->requetedby = Auth::user()->id;        
   $claimnoticestageextension->created_id = Auth::user()->id;
   $claimnoticestageextension->requestedwhom = 'Claimant';
   $claimnoticestageextension->stageextensionstatus = 'Waiting For Approval';
   $claimnoticestageextension->stageextensionremarks = $stageextensionremarks;
   $claimnoticestageextension->save();


   $table = DB::table('claimantnotice')
   ->where('id' , $request->claimnoticeid)
   ->update(['claimnoticestatus' => $claimantnotice_Stage.' - Stage Extend Request Created']);

   $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
   $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
   $ClaimantNoticeStatus->claimantnoticestatus = $claimantnotice_Stage.' - Stage Extend Request Created';
   $ClaimantNoticeStatus->userid = Auth::user()->id;  
   $ClaimantNoticeStatus->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' )); 
   $ClaimantNoticeStatus->created_id = Auth::user()->id;        
   $ClaimantNoticeStatus->save();

  $newclaimant = [
    'body' => $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created',
    'actionURL' => route('claimantsnoticelist.index'),
  ];

  $type = 'ClaimNotice';
  $latest = '1';
  $name =  $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created';
  $notifiable_type =  $request->claimnoticeno.' '.$claimantnotice_Stage.' - Stage Extend Request Created';
  $newclaimant =  json_encode($newclaimant);
  $created_at = now();
  $updated_at = now();


   $arbitratorsid = DB::select("select arbitrator_id,claimnoticeid,us.email from claimant_arbitrator_configuration arc inner join users us on (us.id = arc.arbitrator_id)  where isagreeorDisagree='Agree' and claimnoticeid=".$request->claimnoticeid);

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
    );

    Mail::send('emails.claimanttoarbitratorforextension', $data, function($message) use ($arbitratoremail,$data,$claimantnotice_Stage,$arbitration_petionno){
      $message->to($arbitratoremail)
      ->subject('Online Arbitration System(Claim Petition No:'.$arbitration_petionno.') - Claimant Extended Request against '.$claimantnotice_Stage.'.');     
    }); 
  }

  return redirect()->route('ClaimPetion.show',$request->claimnoticeid)
  ->with('success','Stage Extension Request Sent Successfully');
 }

}
