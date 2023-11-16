<?php

namespace App\Http\Controllers;

use App\models\User;
use App\models\ClaimantRegister;
use App\models\claimnoticedocumentdetails;
use Auth;
use DB;
use App\AlfrescoDocument;
use File;
use Storage;
use Filesystem;
use Log;

use Illuminate\Http\Request;

class UserController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function edit(User $user)
	{   
		$user = Auth::user();
		$claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type) where user_id=".auth()->user()->id);
		$userid=$user->id;
		$claimantinformation = DB::select("SELECT * from  users where id=".$userid);
		$claimantamend= DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='User Name Amend'  and created_id = " .Auth::user()->id);
		$claimantamend1= DB::select("SELECT count(*) as details_count FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='User Address Amend'  and created_id = " .Auth::user()->id);
		//echo json_encode($claimantinformation);exit;
		return view('users.edit', compact('user','claimantinformation','claimanttype','claimantamend','claimantamend1'));
	}

	public function update(User $user,Request $request)
	{ 
		$userid=$user->id;
		
		if(Auth::user()->email == request('email')) {
			
			
			$this->validate(request(), [
				
				'email' => 'required',
				
			]);



			$user->name = request('firstname').''.request('lastname');
			$user->username = request('firstname').''.request('lastname');
			$user->address = request('address');
			$user->password = bcrypt(request('password'));

			$user->save();
			

			DB::table('claimantregister')
			->where('user_id', $user['id'])
			->update([
				'firstname' => request('firstname'),
				'lastname' => request('lastname'),
				'email' => request('email'),
				'address' => request('address'),                   
				
				'updated_at' => NOW()
			]);

			return back()->with('success','Profile Updated Successfully.');
			
		}
		else{
			//dd ($user);
			$this->validate(request(), [
				
				'email' => 'required',
				
			]);

			$user->name = request('firstname').''.request('lastname');
			$user->username = request('firstname').''.request('lastname');
			$user->email = request('email');
			$user->address = request('address');
			$user->password = bcrypt(request('password'));

			$user->save();
			
			
			// DB::table('claimantregister')
			// ->where('user_id', $user['id'])
			// ->update([
			// 	'firstname' => request('firstname'),
			// 	'lastname' => request('lastname'),
			// 	'email' => request('email'),
			// 	'address' => request('address'),                   
				
			// 	'updated_at' => NOW()
			// ]);

			return back()->with('success','Profile Updated Successfully');
			
		}
	}

public function nameamendupdate(User $user,Request $request)
	{ 

		$userid=request('user_id');
		
		$claimantinformation = DB::select("SELECT uss.*,ro.display_name from  users uss INNER JOIN roles ro on(ro.id=uss.roles_id) where uss.id=".$userid);
		$claimantamend = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Claimant Amend'  AND document_type='AMEND_NAME' and created_id=".$userid);
		
		$user_email=$claimantinformation[0]->email;
		$user_name=$claimantinformation[0]->display_name;

		  // echo ($user_name);exit;
		
		$amend = DB::table('amend_details')->insertGetId([
			'firstname' => $claimantinformation[0]->name,
			'lastname' => $claimantinformation[0]->name,
			
			'email' => $claimantinformation[0]->email,
			'user_id' => $userid,
			'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
		]);
		



			// $user->name = request('firstname').''.request('lastname');
			// $user->username = request('firstname').''.request('lastname');
			
			
			// $user->save();
			DB::table('users')
			->where('id', $userid)
			->update([
				'name' => request('firstname').''.request('lastname'),
				'username' => request('firstname').''.request('lastname'),
				                  
				
				'updated_at' => NOW()
			]);

      $alfresco_id=DB::table('alfresco_log')->insertGetId([
    'user_id' => Auth::user()->id,
    'doc_type'=>'Name-UserProfileAmend',
    
    'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
  ]);
			$parentFolder = 'documentLibrary/Claim/Name-UserProfileAmend';
			$count = count($claimantamend) +1;

			$folderName = $user_email.'_'.$user_name.'_'.'Amend';
			//dd ($folderName);
			$folderTitle =  $user_email;
			$folderDescription =  $user_email;

      try{
    $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
    Log::error('[Method => usercontroller => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');
 

  }
  catch(\Exception $exc){

    $documentDirectory='';    
    Log::error('[Method => usercontroller => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

  }
 // echo $documentDirectory;exit;

  if($documentDirectory != '')
  {

			

			$storagePath = storage_path().'/app/public/uploads/amendusers/'.$folderName;
        	
			if (!File::exists($storagePath))
			{
				File::makeDirectory($storagePath);
				// echo $storagePath; exit;
			}
			else
			{
				File::cleanDirectory($storagePath);
			}

			if($request->hasFile('fileupload'))
			{
				//echo ("gjh");exit;
				$storagePath = $storagePath;
				$imageFile = $request->file('fileupload');
				$imageName = $imageFile->getClientOriginalName();
				$imageFile->move($storagePath, $imageName);
				
			}

			$this->storeDocument($folderName, $documentDirectory,'0','User Name Amend',$userid,'AMEND_NAME');
		$alfresco_update = DB::table('alfresco_log')
          ->where(['id'=>$alfresco_id])
          ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);

			

			return back()->with('success','Document Added Successfully');
			 }
   else
  {
  return back()
   ->with('success','Document Upload Failed');

 } 
			
		
		
	}
	public function addressamendupdate(User $user,Request $request)
	{ 

		$userid=request('user_id');
		
		$claimantinformation = DB::select("SELECT uss.*,ro.display_name from  users uss INNER JOIN roles ro on(ro.id=uss.roles_id) where uss.id=".$userid);
		$claimantamend = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE claimant_respondent_type ='Claimant Amend'  AND document_type='AMEND_USER' and created_id=".$userid);
		$user_email=$claimantinformation[0]->email;
		$user_name=$claimantinformation[0]->display_name;
		
		$amend = DB::table('amend_details')->insertGetId([
			'address' => $claimantinformation[0]->address,
			'email' => $claimantinformation[0]->email,
			
			'user_id' => $userid,
			'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
		]);
		



			// $user->name = request('firstname').''.request('lastname');
			// $user->username = request('firstname').''.request('lastname');
			
			
			// $user->save();
			DB::table('users')
			->where('id', $userid)
			->update([
				
				'address' => request('address'),
				                  
				
				'updated_at' => NOW()
			]);
			$alfresco_id=DB::table('alfresco_log')->insertGetId([
    'user_id' => Auth::user()->id,
    'doc_type'=>'Address-UserProfileAmend',
    
    'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
  ]);

			$parentFolder = 'documentLibrary/Claim/Address-UserProfileAmend';
			$count = count($claimantamend) +1;

			$folderName = $user_email.'_'.$user_name.'_'.'Amend';
			//dd ($folderName);
			$folderTitle =  $user_email;
			$folderDescription =  $user_email;
			try{
    $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);

    Log::error('[Method => usercontroller2 => log_detail1 => Step2 => success Code:'.Auth::user()->id.''.$folderName.']');
 

  }
  catch(\Exception $exc){

    $documentDirectory='';    
    Log::error('[Method => usercontroller2 => log_detail2 => Error Code:'.$exc.''.Auth::user()->id.''.$folderName.']');

  }

		if($documentDirectory != '')
  {	
			$storagePath = storage_path().'/app/public/uploads/addressamend/'.$folderName;
        	//echo $documentDirectory; exit;
			if (!File::exists($storagePath))
			{
				File::makeDirectory($storagePath);
			}
			else
			{
				File::cleanDirectory($storagePath);
			}

			if($request->hasFile('fileidproof'))
			{
				$storagePath = $storagePath;
				$imageFile = $request->file('fileidproof');
				$imageName = $imageFile->getClientOriginalName();
				$imageFile->move($storagePath, $imageName);
			}
        // commanded start

			$this->addressstoreDocument($folderName, $documentDirectory,'0','User Address Amend',$userid,'AMEND_USER');
		

			// DB::table('claimantregister')
			// ->where('user_id',$userid)
			// ->update([
			// 	'address' => request('address'),
				
			// 	'email' => $user_email,
				                  
				
			// 	'updated_at' => NOW()
			// ]);
			$alfresco_update = DB::table('alfresco_log')
          ->where(['id'=>$alfresco_id])
          ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))]);

			return back()->with('success','Document Added Successfully');
				 }
   else
  {
  return back()
   ->with('success','Document Upload Failed');

 } 
		
		
	}
	private function storeDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
	{
		try
		{
			$fileDirPath = storage_path().'/app/public/uploads/amendusers/'.$folderName;

			$files = array_diff(scandir($fileDirPath), array('.', '..'));
			foreach ($files as $key => $value)
			{
				$fileExtension = pathinfo($value, PATHINFO_EXTENSION);
				$fileName = $value;
				$fileDescription = 'Claimant Amend';
				$response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
				$objResponse = json_decode($response, TRUE);

				$documentNode = $objResponse['nodeRef'];
				$arrWorkSpace = explode('://', $documentNode);
				$arrStore = explode('/', $arrWorkSpace[1]);
				$workspace = $arrWorkSpace[0];
				$spaceStore = $arrStore[0];
				$alfrescoDocumentName = $arrStore[1];

				DB::table('claimnoticedocumentdetails')->insert([
					'claimnoticeid' => $claimnoticeID,
					'node_ref' => $documentNode,
					'work_space' => $workspace,
					'space_store' => $spaceStore,
					'alfresco_document_name' => $alfrescoDocumentName,
					'document_name' => $value,
					'file_extension' => $fileExtension,
					'document_type' => $document_Type,
					'claimant_respondent_type' => $claimant_respondent_type,
					'claimant_respondent_id' => $claimant_respondent_id,
					'created_id' => auth()->user()->id,
					'created_at' => NOW()
				]);
			}
		}
		catch(Exception $exc)
		{

		}
	}
	private function addressstoreDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type)
	{
		try
		{
			$fileDirPath = storage_path().'/app/public/uploads/addressamend/'.$folderName;

			$files = array_diff(scandir($fileDirPath), array('.', '..'));
			foreach ($files as $key => $value)
			{
				$fileExtension = pathinfo($value, PATHINFO_EXTENSION);
				$fileName = $value;
				$fileDescription = 'Claimant Amend';
				$response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
				$objResponse = json_decode($response, TRUE);

				$documentNode = $objResponse['nodeRef'];
				$arrWorkSpace = explode('://', $documentNode);
				$arrStore = explode('/', $arrWorkSpace[1]);
				$workspace = $arrWorkSpace[0];
				$spaceStore = $arrStore[0];
				$alfrescoDocumentName = $arrStore[1];

				DB::table('claimnoticedocumentdetails')->insert([
					'claimnoticeid' => $claimnoticeID,
					'node_ref' => $documentNode,
					'work_space' => $workspace,
					'space_store' => $spaceStore,
					'alfresco_document_name' => $alfrescoDocumentName,
					'document_name' => $value,
					'file_extension' => $fileExtension,
					'document_type' => $document_Type,
					'claimant_respondent_type' => $claimant_respondent_type,
					'claimant_respondent_id' => $claimant_respondent_id,
					'created_id' => auth()->user()->id,
					'created_at' => NOW()
				]);
			}
		}
		catch(Exception $exc)
		{

		}
	}
}
