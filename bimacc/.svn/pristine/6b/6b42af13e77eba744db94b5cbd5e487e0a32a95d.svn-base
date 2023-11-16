<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect; 
use App\DatabaseHelper;
use \Crypt;

class VideoConferencingController extends Controller
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
    $videoconferencing = DatabaseHelper::getvideo_conference();
    return view('videoconferencing.index', compact('videoconferencing'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $claimnotice = DatabaseHelper::fillclaimnoticeforvideoconferencing();
        //echo json_encode($claimnotice); exit;
        return view('videoconferencing.create',compact('claimnotice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input = [
            'claim_notice_id' => $request['claim_notice_id'],
            'link' => $request['link'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'video_conferencing_header' => $request['video_conferencing_header'],
            'meeting_id' => $request['meeting_id'],
            'meeting_passcode' => $request['meeting_passcode'],
            'mail_id' => $request['mail_id']
        ];

           // echo json_encode($input); exit;

        $rules = [
            'claim_notice_id' => 'required',
            'link' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];


        $messages = [
            'claim_notice_id.required' => 'Claim Notice is required',
            'link.required' => 'Link is required',
            'start_date.required' => 'Start Date is required',
            'end_date.required' => 'End Date is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }else
        {
            DB::transaction(function() use($input)
            {

             $video_conferencing_link_id = DB::table('video_conferencing')->insertGetId([
                'claim_notice_id' => $input['claim_notice_id'],
                'link' => $input['link'],                        
                'start_date' => $input['start_date'],                        
                'end_date' => $input['end_date'],                        
                'meeting_id' => $input['meeting_id'],                        
                'meeting_passcode' => $input['meeting_passcode'],                        
                'video_conferencing_header' => $input['video_conferencing_header'],                        
                'status' => 'Initiated',
                'created_id' => auth()->user()->id,
                'created_at' => NOW()
            ]);
             $mail_id = implode(",", $input['mail_id']);
             $user = DB::select("select * from users where id in (".$mail_id.")");

             foreach ($user as $key => $userdetails) 
             {
                $video_conferencing_emails = DB::table('video_conferencing_emails')->insertGetId([
                    'claim_notice_id' => $input['claim_notice_id'],
                    'video_conferencing_link_id' => $video_conferencing_link_id,
                    'email_id' => $userdetails->email,                        
                    'user_id' => $userdetails->id,
                    'created_id' => auth()->user()->id,
                    'created_at' => NOW()
                ]);

                $data = array(
                  'name' => $userdetails->name,
                  'email' => $userdetails->email,
                  'link' => $input['link'],                        
                  'start_date' => $input['start_date'],                        
                  'end_date' => $input['end_date'],                        
                  'meeting_id' => $input['meeting_id'],                        
                  'meeting_passcode' => $input['meeting_passcode'],                        
                  'video_conferencing_header' => $input['video_conferencing_header'],   
              );

                $email =$userdetails->email;

                $claimnotice =  DB::select("SELECT * FROM claimantnotice where id =".$input['claim_notice_id']);

                $claimnoticeno = $claimnotice[0]->claimnoticeno;

                Mail::send('emails.videoconference',["data1"=>$data] , function($message) use ($data, $email,$claimnoticeno)
                {
                    $message->to($email)
                    ->subject('Reg.Online Arbitration System - Invitation for the Video Conferencing for '.$claimnoticeno);
                });
            }
        });
        }
        return Redirect()->route('videoconferencing.index')
        ->with('success', 'Video Conference Link Sent Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $videoconferencing = DatabaseHelper::getvideo_conferencebyid($id);
     $claimnotice = DatabaseHelper::fillclaimnoticeforvideoconferencing();
     return view('videoconferencing.show', compact('videoconferencing','claimnotice'));
 }
  public function arbitratorlist()
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {
        return view('auth.login');
    }
    
    $videoconferencing = DatabaseHelper::getvideo_conference();
    return view('videoconferencing.arbitratorindex', compact('videoconferencing'));
}
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        $videoconferencing = DatabaseHelper::getvideo_conferencebyid($id);

        // echo json_encode($videoconferencing); exit;
        $claimnotice = DatabaseHelper::fillclaimnoticeforvideoconferencing();
        $message_video = DB::table('video_message')->insertGetId([
     
      'message' =>  $request->message,
     'user_id' => $user_id,
     'created_id'=>$user_id,
      'claimnoticeid'=>$request->claimnoticeid,
      
      'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
    ]);
        return view('videoconferencing.edit', compact('videoconferencing','claimnotice'));

        //echo json_encode($videoconferencing); exit;

        //write  code here for without using popup modal       
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

      $user = DB::select("select * from users where id in ( select user_id from video_conferencing_emails where video_conferencing_link_id=".$id.")");

      $videoconferencing = DatabaseHelper::getvideo_conferencebyid($id);

      $input = [
        'claim_notice_id' => $videoconferencing['video_conference_header'][0]->claim_notice_id,
        'link' => $videoconferencing['video_conference_header'][0]->link,
        'start_date' => $videoconferencing['video_conference_header'][0]->start_date,
        'end_date' => $videoconferencing['video_conference_header'][0]->end_date,
        'video_conferencing_header' => $videoconferencing['video_conference_header'][0]->video_conferencing_header,
        'meeting_id' => $videoconferencing['video_conference_header'][0]->meeting_id,
        'meeting_passcode' => $videoconferencing['video_conference_header'][0]->meeting_passcode,
    ];


    foreach ($user as $key => $userdetails) 
    {
        $data = array(
          'name' => $userdetails->name,
          'email' => $userdetails->email,
          'link' => $input['link'],                        
          'start_date' => $input['start_date'],                        
          'end_date' => $input['end_date'],                        
          'meeting_id' => $input['meeting_id'],                        
          'meeting_passcode' => $input['meeting_passcode'],                        
          'video_conferencing_header' => $input['video_conferencing_header'],   
      );

        $email =$userdetails->email;
        $claimnotice =  DB::select("SELECT * FROM claimantnotice where id =".$input['claim_notice_id']);

        $claimnoticeno = $claimnotice[0]->claimnoticeno;

        Mail::send('emails.videoconference',["data1"=>$data] , function($message) use ($data, $email,$claimnoticeno)
        {
            $message->to($email)
            ->subject('Reg.Online Arbitration System - Invitation for the Video Conferencing for '.$claimnoticeno);
        });
    }

    return Redirect()->route('videoconferencing.index')
    ->with('success', 'Video Conference Link Invitation Link Re-Sent Successfully');

}


public function getemail($id)
{ 
    try 
    {
        $rows = DatabaseHelper::getemailfromclaimnotice($id);
        return $rows;

    } catch (Exception $e) {

    }

}

public function getemail_repay($id)
{ 
    try 
    {
        $rows = DatabaseHelper::getemailfromclaimnotice_repay($id);
        return $rows;

    } catch (Exception $e) {

    }

}
public function getlateststage($id)
{ 
    try 
    {
        $rows = DatabaseHelper::getclaimnoticestageforvideoconference($id);

       // echo json_encode($rows); exit;
        return $rows;

    } catch (Exception $e) {

    }

}


}
