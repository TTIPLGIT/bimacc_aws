<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redis;
use Log;
use App\AlfrescoDocument;

class HearingController extends Controller
{
    public function index()
    {
        try {
            return view('online.hearing.index');
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => index => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }        
    }

    public function hearingLoginUserContact()
    {
        try {
            $alfrescoURL = env('DOCUMENT_API').'/node/content/';
            $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();  
            // Log::info('URL: '.$alfrescoURL.$alfrescoTicket);          
            $user = DB::table('users')
                ->select('id', 'name', 'image_name', 'email', 'roles_id as usertype')
                ->where('id', auth()->id())
                ->get();
            $rows = array();
            
            foreach ($user as $key => $value)
            {
                $row = json_decode(json_encode($value), TRUE);
                $arrName = explode(' ', $row['name']);
                $shortName = (count($arrName) >= 2) ? strtoupper($arrName[0][0].$arrName[1][0]) : ((count($arrName) == 1) ? strtoupper($arrName[0][0]) : '');
                $row['short_name'] = $shortName;
                $row['image_path'] = $alfrescoURL.$row['image_name'].$alfrescoTicket;
                array_push($rows, $row);      
            }
            // Log::info($rows);
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => hearingLoginUserContact => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }
        
        return response()->json($rows);
    }
    public function getting_claimpetition()
    {
        try {
           
                     
            
                // $contacts_petition = DB::table('claimnotice_petion_arbitrationno')
                // ->leftJoin('claimantnotice', 'claimantnotice.id', '=', 'claimnotice_petion_arbitrationno.claimnoticeid')
                
                // ->whereIn('claimantnotice.id', function($query) {
                //     $query->select('id')->from('claimantnotice')->where('userid', auth()->id());
                // })
                // ->whereNotIn('claimantnotice.userid', [auth()->id()])
                // ->select('claimnotice_petion_arbitrationno.arbitration_petionno', 'claimnotice_petion_arbitrationno.claimnoticeid as claim_id')

                // ->whereNotIn('claimantnotice.claimnoticestatus', ['Disposed'])
                // ->get();
           
                $contacts_petition = DB::table('hearing_configuration')
                ->leftJoin('users', 'hearing_configuration.user_id', '=', 'users.id')
                ->leftJoin('claimantnotice', 'hearing_configuration.claim_id', '=', 'claimantnotice.id')
                ->leftJoin('claimnotice_petion_arbitrationno', 'hearing_configuration.claim_id', '=', 'claimnotice_petion_arbitrationno.claimnoticeid')
               
                ->whereIn('hearing_configuration.claim_id', function($query) {
                    $query->select('claim_id')->from('hearing_configuration')->where('user_id', auth()->id());
                })
                ->whereNotIn('hearing_configuration.user_id', [auth()->id()])
                
               
                ->select( 'claimantnotice.id as claim_id', 'claimnotice_petion_arbitrationno.arbitration_petionno as claim_name')
                ->whereNotIn('claimantnotice.claimnoticestatus', ['Disposed'])
                 ->groupBy('claim_id','claim_name')

                ->get();
            $rows = array();
            
            foreach ($contacts_petition as $key => $value)
            {
                $row = json_decode(json_encode($value), TRUE);
                array_push($rows, $row);      
            }
             Log::info($rows);

        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => getting_claimpetition => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }
        
        return response()->json($rows);
    }

    public function conversationContacts()
    {
        try {
            $contacts = DB::table('hearing_configuration')
                ->leftJoin('users', 'hearing_configuration.user_id', '=', 'users.id')
                ->leftJoin('claimantnotice', 'hearing_configuration.claim_id', '=', 'claimantnotice.id')
                ->leftJoin('claimnotice_petion_arbitrationno', 'hearing_configuration.claim_id', '=', 'claimnotice_petion_arbitrationno.claimnoticeid')
                ->whereIn('hearing_configuration.claim_id', function($query) {
                    $query->select('claim_id')->from('hearing_configuration')->where('user_id', auth()->id());
                })
                ->whereNotIn('hearing_configuration.user_id', [auth()->id()])
                ->orderBy('claimantnotice.id', 'asc')
                ->orderBy('hearing_configuration.display_order', 'asc')
                ->select('hearing_configuration.id', 'claimantnotice.id as claim_id', 'hearing_configuration.user_status', 'hearing_configuration.display_order', 'hearing_configuration.hearing_number', 'users.id as user_id', 'users.id as to_user_id', 'users.name', 'users.email', 'users.roles_id as usertype', 'users.image_name', 'claimantnotice.claimnoticeno as claim_name1', 'claimnotice_petion_arbitrationno.arbitration_petionno as claim_name','users.id as from_user_id', DB::raw("'' as message_typing"))
                ->whereNotIn('claimantnotice.claimnoticestatus', ['Disposed'])
                ->get();
              // Log::info($contacts);
            $unreadMessage = DB::table('hearing_messages')
                ->select(DB::raw('claim_id, from_user_id, count(*) as message_count'))
                ->where([['to_user_id', auth()->id()], ['message_read', false]])
                ->groupBy('claim_id', 'from_user_id')
                ->get();Log::info($unreadMessage);
            $user = DB::table('users')
                ->where('id', auth()->id())
                ->get();
            $loginUserType = $user[0]->roles_id;

            $rows = array();
            $preValue = 0;
            $alfrescoURL = env('DOCUMENT_API').'/node/content/';
            $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
            foreach ($contacts as $key => $value) {
                $row = json_decode(json_encode($value), TRUE);
                $previousClaim = $preValue;
                $preValue = $row['claim_id'];
                $arrName = explode(' ', $row['name']);
                $shortName = (count($arrName) >= 2) ? strtoupper($arrName[0][0].$arrName[1][0]) : ((count($arrName) == 1) ? strtoupper($arrName[0][0]) : '');
                $row['short_name'] = $shortName;
                $messageUnread = $unreadMessage->where('claim_id', $row['claim_id'])->where('from_user_id', $row['user_id'])->first();
                $row['message_count'] = $messageUnread ? $messageUnread->message_count : 0;
                $row['previousClaim'] = $previousClaim;
                $row['loginUserType'] = $loginUserType;
                $row['image_path'] = $alfrescoURL.$row['image_name'].$alfrescoTicket;
                array_push($rows, $row);
                 Log::info($rows);
                 
            }
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => conversationContacts => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }        

        return response()->json($rows);
    }

    public function getConversations($user_id, $claim_id)
    {
        try {
            DB::table('hearing_messages')
                ->where([['claim_id', $claim_id], ['to_user_id', auth()->id()]])
                ->update([
                    'message_read' => true
                ]);
            $user = DB::table('users')
                ->where('id', $user_id)
                ->get();
            $userType = $user[0]->roles_id;
            $messages = DB::table('hearing_messages')
                ->leftJoin('users as from_users', 'hearing_messages.from_user_id', '=', 'from_users.id')
                ->leftJoin('users as to_users', 'hearing_messages.to_user_id', '=', 'to_users.id')
                ->select('hearing_messages.id', 'hearing_messages.claim_id', 'hearing_messages.hearing_number', 'hearing_messages.from_user_id', 'hearing_messages.to_user_id', 'hearing_messages.message_text', 'hearing_messages.message_type', 'hearing_messages.attachment', 'hearing_messages.file_link as nodeRef', 'hearing_messages.file_extension', 'hearing_messages.created_at', 'from_users.name as from_user_name', 'to_users.name as to_user_name', 'from_users.image_name as from_image_name', 'to_users.image_name as to_image_name')
                ->where('claim_id', $claim_id)            
                ->where(function($query) use($userType, $user_id) {
                    //if ((auth()->user()->roles_id == 3 && $userType == 1) || (auth()->user()->roles_id == 1 && $userType == 3)) {
                    if ((auth()->user()->roles_id == 3 && $userType == 1) || (auth()->user()->roles_id == 1 && $userType == 3)) {
                        $query->where('hearing_messages.message_type', 'Private');
                    } else {
                        $query->where('hearing_messages.message_type', 'Public');
                    }
                })
                ->get();
            
            $rows = array();
            $alfrescoURL = env('DOCUMENT_API').'/node/content/';
            $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
            foreach ($messages as $key => $value) {
                $row = json_decode(json_encode($value), TRUE);
                $arrName = explode(' ', $row['from_user_name']);
                $shortName = (count($arrName) >= 2) ? strtoupper($arrName[0][0].$arrName[1][0]) : ((count($arrName) == 1) ? strtoupper($arrName[0][0]) : '');
                $row['short_name'] = $shortName;
                $row['image_path'] = $alfrescoURL.$row['from_image_name'].$alfrescoTicket;
                $row['file_link'] = $alfrescoURL.$row['nodeRef'].$alfrescoTicket;
                array_push($rows, $row);
            }
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => getConversations => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }  
        
        return response()->json($rows);
    }

    public function saveConversation(Request $request)
    {        
        try {
            $userAccess = DB::table('hearing_configuration')
            ->where([['hearing_configuration.claim_id', $request->claim_id], ['hearing_configuration.user_id', auth()->id()]])
            ->get();
        
            if ($userAccess[0]->user_status == 1) {
                return $this->saveMessage($request->claim_id, $request->hearing_number, $request->to_user_id, $request->message_text, 0, '', '');
            }
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => saveConversation => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }        

        return response()->json($message, 200);
    }

    private function saveMessage($claimId, $hearingNo, $toUserId, $message, $attachment, $fileLink, $fileExtension)
    {
        try {
            if (!empty($claimId) && !empty($hearingNo) && !empty($toUserId) && !empty($message)) {
                Log::info('[Method => HearingController => saveMessage => Info: {fromUser = '.auth()->id().', toUser = '.$toUserId.', hearingNumber = '.$hearingNo.', message = '.$message.'}]');
                $userAccess = DB::table('hearing_configuration')
                    ->where([['hearing_configuration.claim_id', $claimId], ['hearing_configuration.user_id', auth()->id()]])
                    ->get();

                if ($userAccess[0]->user_status == 1) {
                    $user = DB::table('users')
                        ->where('id', $toUserId)
                        ->get();
                    $userType = $user[0]->roles_id;
                    $messageType = ((auth()->user()->roles_id == 3 && $user[0]->roles_id == 1) || (auth()->user()->roles_id == 1 && $user[0]->roles_id == 3)) ? 'Private' : 'Public';
                    
                    $id = DB::table('hearing_messages')
                        ->insertGetId([
                            'claim_id' => $claimId,
                            'hearing_number' => $hearingNo,
                            'from_user_id' => auth()->id(),
                            'to_user_id' => $toUserId,
                            'message_type' => $messageType,
                            'message_text' => $message,
                            'attachment' => $attachment,
                            'file_link' => $fileLink,
                            'file_extension' => $fileExtension,
                            'message_read' => false,              
                            'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' )),
                            'updated_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
                        ]);
                    
                    $rows = DB::table('hearing_messages')
                    ->leftJoin('users as from_users', 'hearing_messages.from_user_id', '=', 'from_users.id')
                    ->leftJoin('users as to_users', 'hearing_messages.to_user_id', '=', 'to_users.id')
                    ->select('hearing_messages.id', 'hearing_messages.claim_id', 'hearing_messages.hearing_number', 'hearing_messages.from_user_id', 'hearing_messages.to_user_id', 'hearing_messages.message_text', 'hearing_messages.message_type', 'hearing_messages.attachment', 'hearing_messages.file_link as nodeRef', 'hearing_messages.file_extension', 'hearing_messages.created_at', 'from_users.name as from_user_name', 'to_users.name as to_user_name', 'from_users.image_name as from_image_name', 'to_users.image_name as to_image_name')
                    ->where('hearing_messages.id', $id)
                    ->get();

                    $message = array();
                    $alfrescoURL = env('DOCUMENT_API').'/node/content/';
                    $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
                    foreach ($rows as $key => $value) {
                        $row = json_decode(json_encode($value), TRUE);
                        $arrName = explode(' ', $row['from_user_name']);
                        $shortName = (count($arrName) >= 2) ? strtoupper($arrName[0][0].$arrName[1][0]) : ((count($arrName) == 1) ? strtoupper($arrName[0][0]) : '');
                        $row['short_name'] = $shortName;
                        $row['image_path'] = $alfrescoURL.$row['from_image_name'].$alfrescoTicket;
                        $row['file_link'] = $alfrescoURL.$row['nodeRef'].$alfrescoTicket;
                        array_push($message, $row);
                    }
                    $message = json_encode($message);
                    $redis = Redis::connection();
                    $redis->publish('message', $message);
                }
                return response()->json($message, 200);
            }
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => saveMessage => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }
    }

    public function setAttachment(Request $request)
    {

        try {
            $fileName = $request->fileName;
            $image = $request->image;
            $newFileName = time().'_'.$fileName;
            $name = public_path('images/hearing/').$newFileName;
            $removeText = substr($image, 0, strpos($image, ',', 1));
            $image = str_replace($removeText, '', $image);
            $pdf = fopen ($name,'w');
            fwrite ($pdf,base64_decode($image));
            fclose ($pdf);
            $message = $fileName;
            //$fileLink = 'http://localhost:6019/images/'.$newFileName;

            $stage1 = "Hearing-1";
           // $stage1 = "Respondant's Submission/Hearing";

            $rows = DB::table('claimantnotice_stage')
                ->where([['claimnoticeid', $request->claim_id], ['claimantnotice_Stage', $stage1]])
                ->select('alfresco_stage_folderuniqueid as nodeRef')
                ->get();
               //  echo "sample"; exit;
               // echo json_encode($rows); exit;
            Log::info($rows);
            $documentDirectory = $rows[0]->nodeRef;

           // echo $documentDirectory; exit;

            
            $fileDescription = 'Claim hearing Document';
            //$documentDirectory = 'workspace://SpacesStore/6c48f8f5-bae0-48bd-9322-c1b258aa7525';
            $response = AlfrescoDocument::SetAlfrescoDocument(public_path('images/hearing'), $newFileName, $request->fileExtension, $documentDirectory, $fileDescription);
            $objResponse = json_decode($response, TRUE);
            $documentNode = $objResponse['nodeRef'];
            $arrWorkSpace = explode('://', $documentNode);
            $arrStore = explode('/', $arrWorkSpace[1]);
            $workspace = $arrWorkSpace[0];
            $spaceStore = $arrStore[0];
            $alfrescoDocumentName = $arrStore[1];
            $fileLink = $workspace.'/'.$spaceStore.'/'.$alfrescoDocumentName.'/'.$newFileName;

            return $this->saveMessage($request->claim_id, $request->hearing_number, $request->to_user_id, $message, 1, $fileLink, $request->fileExtension);
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => setAttachment => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }

        return response()->json($name, 200);
    }

    public function setUserAccess(Request $request)
    {
        try {
            DB::table('hearing_configuration')
                ->where('id', $request->id)
                ->update([
                    'user_status' => $request->user_status,
                    'updated_at' => NOW()
                ]);
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => setUserAccess => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }
        
        return $request;
    }    

    public function setTypingMessage(Request $request)
    {
        try {
            $user = DB::table('users')
                ->select('id', 'name')
                ->where('id', auth()->id())
                ->get();
            $message = array();
            $message['claim_id'] = $request->claim_id;
            $message['from_user_id'] = auth()->id();
            $message['to_user_id'] = $request->to_user_id;
            $message['display_text'] = ($request->display_text) ? '' : $user[0]->name.' is typing . . .';
            $redis = Redis::connection();
            $redis->publish('typingMessage', json_encode($message));
        } catch (\Exception $exc) {
            Log::error('[Method => HearingController => setTypingMessage => Error Code: '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']);
        }
        
        return response()->json(json_encode($message), 200);
    }

}
