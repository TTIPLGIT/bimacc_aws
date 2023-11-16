<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\models\User;
use App\models\Role;
use App\models\ClaimantRegister;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use App\Notifications\NewClaimantNotification;
use Illuminate\Notifications\Notifiable;
use DB;
use App\models\notifications;
use Crypt; 
use App\AlfrescoDocument;
use File;
use Storage;


class ClaimantRegisterController extends Controller
{
  use RegistersUsers;
  use Notifiable;

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    //  protected function validator(array $data)     
    //  {
    //   return Validator::make($data, [
    //     'name' => 'required|string|max:255',
    //     'username' => 'required|string|max:20|unique:users',
    //     'email' => 'required|email|unique:users',
    //     'password' => 'required|string|min:6|confirmed',
    //   ]);
    // }

     public function index()
     {
      $claimantRegister = ClaimantRegister::oldest()->paginate(5);
            //print_r($claimantRegister);        
      return view('claimantregister.index', compact('claimantRegister'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() 
    {
      $claimant_type = DB::select("SELECT claimant_respondant_type_name,id FROM claimant_respondant_type WHERE TYPE='claimant' order by claimant_respondant_type_name asc ");
      
      return view('claimantregister.create',compact ('claimant_type'));
    }  


    public function store(Request $request, $id = null)
    {


     $rules = [

      'claimant_type' => 'required',
      'firstname' => 'required',
      'lastname' =>'required',
      'username' => 'required',
      'email' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
      'password' => 'required|confirmed|min:8',
       // 'aadhar_num' => 'required',
      'address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'country' => 'required',
      'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12|unique:claimantregister,phone|unique:users,email',
      'zipcode' => 'required|max:10',
       'fileupload' => 'required|file|max:5120',
    ];
    
    $messages = [

      'claimant_type.required' => 'Claimant Type is Required',
      'firstname.required' => 'This field is Required', 
      'lastname.required' => 'This field is Required',
       // 'aadhar_num.required' => 'Aadhar Number is Required',
      'password.required' => 'Password is Required',
      'phone.required' => 'Phone Number is required',
      'address.required' => 'Address is Required',
      'city.required' => 'City field is Required',
      'state.required' => 'State field is Required',
      'country.required' => 'Country is Required',
      
      'username.required' => 'Username is required' ,
      'email.regex' => 'Please Give Proper Mail ID', 
      'email.unique' => 'This Email Address is already Registered', 
      'phone.regex' => 'Please Give Valid Mobile No',
      'phone.unique' => 'This phone number is already registered',
      'zipcode.required' => 'Please enter Postal number',
      'zipcode.regex' => 'Please Enter Proper Postal Code',
       'zipcode.min' => 'The Postal code may not be lesser than 6 characters',
       'zipcode.max' => 'The Postal code may not be greater than 6 characters',
      'email.required' => 'Email Id is required' ,
      'fileupload.required' =>'Please Upload the Document',
      'fileupload.max' =>'File size should be below 5MB',
    ];

    $validator = Validator::make($request->all(), $rules, $messages); 

      // $this->validate($request, [
      //   'claimant_type' => 'required',
      //   // 'organization_name' => 'required',
      //   // 'organization_details'=>'required',
      //   'firstname' => 'required',
      //   'lastname' =>'required',
      //   'username'=>'required',
      //   'phone'=>'required',
      //   'email' => 'required|email|unique:users',            
      //   'password' => 'required|confirmed|min:6',
      // ]);

    //echo json_encode($validator->fails()); exit;

    if($validator->fails()){
      $request->flash();
      return redirect()->back()->withInput()->withErrors($validator);
    }

        $existingmail = DB::select("SELECT * FROM users WHERE email='".$request->email."'  and roles_id in (2)"); 


        $countdetails = count($existingmail);

        if($countdetails == 1){
            return redirect()->route('claimantregister.create')
       ->with('success','This Email Address is Already Registered.');


        }


else{
    $roles = Role::where('name', 'claiment')->first();        
     $encrypt = Crypt::encrypt($request->password);
    $user = new User();
    $fullname =   $request->firstname.' '.$request->lastname;      
    $user->name = $fullname;
    $user->username = $fullname;
    $user->email = $request->email;

    $user->password = $request->password; 
     $user->encrypt_pass = $encrypt;
     $user->phone =$request->phone;
    $user->address = $request->address;
    $user->roles()->associate($roles);
    $usertype = $roles;        
    $user->usertype = $usertype;       
    $user->save();
    $user_id = $user->id;       
    // Auth::login($user); //removed for mail_verification

    $encrypt = Crypt::encrypt($request->password);
    $decrypt = Crypt::decrypt($encrypt);      
    $email = $user->email;
    $userid_claimant=$user->id;
    $data = array(
      'name' => $fullname,
      'email' => $user->email,
      'decrypt' =>$decrypt, 
      'user_id'=>Crypt::encrypt($userid_claimant),
    );
    $alfresco_id=DB::table('alfresco_log')->insertGetId([
        'user_id' => $user_id,
        'doc_type'=>'claimant register',
        'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
      ]);
    

      $parentFolder = 'documentLibrary/Claim/User';
      $folderName = $request->email;
      $folderTitle = $request->email;
      $folderDescription = $request->email;
      $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);

      $storagePath = storage_path().'/app/public/uploads/users/'.$request->email;
        //echo $storagePath; exit;
      if (!File::exists($storagePath))
      {
        File::makeDirectory($storagePath);
      }
      else
      {
        File::cleanDirectory($storagePath);
      }

      if($request->hasFile('fileupload'))
      {
        $storagePath = $storagePath;
        $imageFile = $request->file('fileupload');
        $imageName = $imageFile->getClientOriginalName();
        $imageFile->move($storagePath, $imageName);
      }

      $this->storeDocument($folderName, $documentDirectory,'0','Claimant Registration',$user_id,'UAA',$alfresco_id);
       

    $claimantregister = new ClaimantRegister(); 
    $user_id = $user->id;        
    $claimantregister->organization_name = $request->organization_name;
    //$claimantregister->organization_details = $request->organization_details;
    $claimantregister->govt_name = $request->govt_name;
    $claimantregister->dept_name = $request->dept_name;
    $claimantregister->firstname = $request->firstname;        
    $claimantregister->lastname = $request->lastname;
    $claimantregister->middlename = $request->middlename;        
    $claimantregister->username = $request->username;        
    $claimantregister->email = $request->email;
     $claimantregister->aadhar_num = $request->aadhar_num;
    $claimantregister->password = bcrypt($request->password);        
    $claimantregister->phone = $request->phone;
    $claimantregister->alt_phone = $request->alt_phone;
    $claimantregister->city = $request->city;
    $claimantregister->state = $request->state;
    $claimantregister->country = $request->country;
    $claimantregister->zipcode = $request->zipcode;
    $claimantregister->address = $request->address; 
    $claimantregister->claimant_type = $request->claimant_type;
     $claimantregister->auth_name  = $request->auth_name;
      $claimantregister->auth_email  = $request->auth_email;
       $claimantregister->auth_others  = $request->auth_others;
        $claimantregister->authorised  = $request->authorised; 
    //$claimantregister->official_designation = $request->official_designation; 
    $claimantregister->user_id = $user_id;               
    $claimantregister->roles()->associate($roles);
    $usertype = $roles;        
    $claimantregister->usertype = $usertype;


    if ($claimantregister->save()) {
     $claimantregisterid =  DB::getPdo()->lastInsertId();

     $newclaimant = [
      'body' => 'New Claimant Registered',
      'actionURL' => "New Claimant Registered",
    ];

    $newclaimant =  json_encode($newclaimant);
    $notification = new notifications(); 
    $notification->type = 'Registration';
    $notification->latest = '1';
    $notification->name = 'Claimant Registration';
    $notification->notifiable_type = 'Claimant Registration';
    $notification->data = $newclaimant;
    $notification->notifiable_id = '1';         
    $notification->created_at = now();
    $notification->updated_at =  now();
    $notification->registration_claimnotice_id = $claimantregisterid;
    $notification->save();

        //$claimantregister->notify(new NewClaimantNotification($newclaimant, $user));
    $phone = $claimantregister->phone;

//test sms 

    $url="https://www.way2sms.com/api/v1/sendCampaign";
      $message = urlencode("Online Arbitration System - Claimant New Registeration");// urlencode your message
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
      curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=FYTDZGJD5UUMF879PL0VQGWZ49QEZT1K&secret=HJY51W41BPX4ZFOO&usetype=stage&phone=$phone&senderid=$user_id&message=$message");
      // post data
      // query parameter values must be given without squarebrackets.
       // Optional Authentication:
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($curl);
      curl_close($curl);
      echo $result;


      Mail::send('emails.welcome',["data1"=>$data] , function($message) use ($data, $email)
      {
        $message->to($email)
        ->subject('Electronic Arbitration System (EAS) - New Claimant Registration Information');
      });

       $auth_mail=$request->auth_email;
       if($auth_mail !=null)
       {
         
       Mail::send('emails.welcome',["data1"=>$data] , function($message) use ($data,$auth_mail)
      {
        $message->to($auth_mail)
        ->subject('Electronic Arbitration System (EAS) - New Claimant Registration Information');
      });
       }
        return redirect()->route('claimantregister.create')
       ->with('success','Check Your Mail for Mail Verification');
    }

    
    return redirect()->back()->withInput()->withErrors($claimantregister->getErrors());
  }
  }    

  public function show($id)
  {
   $claimantRegister = ClaimantRegister::findOrFail($id);
   return view('claimantregister.show', compact('claimantRegister')); 
 }

 public function destroy($id)
 {
  $claimantRegister = ClaimantRegister::find($id);
  $claimantregister->delete();
  return redirect()->route('claimantregister.index')
  ->with('success','Register Deleted Successfully.');
}


private function storeDocument($folderName, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type,$alfresco_id)
{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/users/'.$folderName;

    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claimant Document';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      $objResponse = json_decode($response, TRUE);

      $documentNode = $objResponse['nodeRef'];
      $arrWorkSpace = explode('://', $documentNode);
      $arrStore = explode('/', $arrWorkSpace[1]);
      $workspace = $arrWorkSpace[0];
      $spaceStore = $arrStore[0];
      $alfrescoDocumentName = $arrStore[1];

       $alfresco_update = DB::table('alfresco_log')
     ->where(['id'=>$alfresco_id])
     ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes')),'document_name'=>$value]);

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
        'created_id' => $claimant_respondent_id,
        'created_at' => NOW()
      ]);
     
    }
  }
  catch(Exception $exc)
  {

  }
}


}
