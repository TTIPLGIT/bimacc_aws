<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\RespondantInformation;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\models\ArbitrationMaster;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\Role;
use App\models\ClaimantRegister;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;
use Storage;
use File;
use Filesystem;
use App\AlfrescoDocument;

class RespondantInformationController extends Controller
{
   use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $respondantinformations = RespondantInformation::all(); 
           
        return view('respondantinformation.index', compact('respondantinformations')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respondant_type = DB::select("select * from claimant_respondant_type where type = 'respondant'");
        return view('RespondantInformation.create', compact('respondant_type'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id= null)
    {
        // $this->validate($request, [          
        //     'email' => 'required',                     
        // ]); 

      if( $request->email=='' || $request->daytimetelephone=='')
{
  $claimnoticeid =session()->get('ClaimNoticeID');
       $claimnoti = DB::select("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");
        // echo("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");exit;
        $phone_exist = DB::select("select * from respondantdetails where daytimetelephone = '".$request->daytimetelephone."' and claimnoticeid = '".$claimnoticeid."'");
        
        if (count($claimnoti) != 0) 
        { 
           // echo ("hjhjh");exit;
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Email Address is Already Registered.');
        }
        else if (count($phone_exist) != 0) 
        { 
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Phone Number is Already Registered.');
        }

else{
  // echo("jkhjh");exit;
        $RespondantInformation = new RespondantInformation(); 
       // $user_id = $user->id;    
        $RespondantInformation->no_email = 1;   
        $RespondantInformation->name = $request->name;
        $RespondantInformation->age = $request->age;
        $RespondantInformation->address = $request->address;
        $RespondantInformation->country = $request->country;
        $RespondantInformation->state = $request->state;
        $RespondantInformation->city = $request->city;
        $RespondantInformation->zipcode = $request->zipcode;
        $RespondantInformation->organization_name  = $request->organization_name;
        $RespondantInformation->organization_details  = $request->organization_details;
        $RespondantInformation->aadhar_num  = $request->aadhar_num;
        $RespondantInformation->firstname  = $request->firstname;
        $RespondantInformation->middlename  = $request->middlename;
        $RespondantInformation->lastname  = $request->lastname;
        $RespondantInformation->official_designation  = $request->official_designation;
        $RespondantInformation->daytimetelephone = $request->daytimetelephone;
        $RespondantInformation->email = $request->email;
        $RespondantInformation->respondant_type = $request->respondant_type;
        $RespondantInformation->company_name  = $request->company_name ;
        $RespondantInformation->proprietar_name  = $request->proprietar_name;
        $RespondantInformation->auth_name  = $request->auth_name ;
        $RespondantInformation->auth_designation  = $request->auth_designation;
        // $RespondantInformation->user_id = $user_id;
        $RespondantInformation->created_id = Auth::user()->id;
        //$RespondantInformation->roles()->associate($roles);
        $RespondantInformation->claimnoticeid = $claimnoticeid;
        $RespondantInformation->save();

         $table = DB::table('claimantnotice')
     ->where('id' , $claimnoticeid)
     ->update(['no_email'=>'1']);


        

        return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','Respondent Information Saved Successfully.');
      }
}
else{

        $existinguser = DB::select("select * from users where roles_id='4' and email = '".strtolower($request->email)."'");
        // echo "select * from users where email = '".strtolower($request->email)."'";exit;
        if (count($existinguser) > 0) 
        {
          
            $user_id =$existinguser[0]->id; 
            // echo ($user_id);exit;
        }
        else
        {
            

        $password_string = 'abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
        $password = substr(str_shuffle($password_string), 0, 8);
        $encrypt = Crypt::encrypt($password);

        $roles = Role::where('name', 'respondent')->first();
        $user = new User();
        $user->name = $request->firstname;
        $user->username = $request->firstname;
        $user->email = $request->email;
        $user->encrypt_pass = $encrypt;
        $user->password = $password;
        $user->phone = $request->daytimetelephone;
        $user->roles()->associate($roles);
        $usertype = $roles;
        $user->usertype = $usertype;    
        $user->save();
        $user_id = $user->id;
        }
        
        $claimnoticeid =session()->get('ClaimNoticeID');
        

       $claimnoti = DB::select("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");
        // echo("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");exit;
        $phone_exist = DB::select("select * from respondantdetails where daytimetelephone = '".$request->daytimetelephone."' and claimnoticeid = '".$claimnoticeid."'");
        if (count($claimnoti) != 0) 
        { 
          // echo ("hjhjh");exit;
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Email Address is already Registered.');
        }
        else if (count($phone_exist) != 0) 
        { 
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Phone Number is already Registered.');
        }

        else{
        // $claimnoticeno = DB::select("select claimnoticeno,alfrescouniquefolder_id from claimantnotice where id = ".$claimnoticeid);
        // $claimnoticenoNew = '';
        // foreach ($claimnoticeno as  $claimnoticenos) {
        //     $claimnoticenoNew = $claimnoticenos->claimnoticeno;
        //     $documentDirectory = $claimnoticenos->alfrescouniquefolder_id;
        // }
        // $parentFolder = 'documentLibrary/Claim/ClaimNotice';
        // $folderName = str_replace('/', '_', $claimnoticenoNew);
        // $folderTitle = 'Claim Notice '. $claimnoticenoNew;
// //file upload
//         $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimnoticenoNew);
//         //echo $storagePath; exit;
//         if (!File::exists($storagePath))
//         {
//             File::makeDirectory($storagePath);
//         }
//         else
//         {
//             File::cleanDirectory($storagePath);
//         }

//         if($request->hasFile('respidproof'))
//         {
//             $storagePath = $storagePath;
//             $imageFile = $request->file('respidproof');
//             $imageName = $imageFile->getClientOriginalName();
//             $imageFile->move($storagePath, $imageName);
//         }

     //   $this->storeDocument($folderName, $documentDirectory,$claimnoticeid,'Respondant',$user->id);

    //end of file upload



        $RespondantInformation = new RespondantInformation(); 
       // $user_id = $user->id;  

        $RespondantInformation->name = $request->name;
        $RespondantInformation->age = $request->age;
        $RespondantInformation->address = $request->address;
        $RespondantInformation->country = $request->country;
        $RespondantInformation->state = $request->state;
        $RespondantInformation->city = $request->city;
        $RespondantInformation->zipcode = $request->zipcode;
        $RespondantInformation->organization_name  = $request->organization_name;
        $RespondantInformation->organization_details  = $request->organization_details;
        $RespondantInformation->aadhar_num  = $request->aadhar_num;
        $RespondantInformation->firstname  = $request->firstname;
        $RespondantInformation->middlename  = $request->middlename;
        $RespondantInformation->lastname  = $request->lastname;
        $RespondantInformation->official_designation  = $request->official_designation;
        $RespondantInformation->daytimetelephone = $request->daytimetelephone;
        $RespondantInformation->email = $request->email;
        $RespondantInformation->respondant_type = $request->respondant_type;
        $RespondantInformation->company_name  = $request->company_name ;
        $RespondantInformation->proprietar_name  = $request->proprietar_name;
        $RespondantInformation->auth_name  = $request->auth_name ;
        $RespondantInformation->auth_designation  = $request->auth_designation;
        $RespondantInformation->user_id = $user_id;
        $RespondantInformation->created_id = Auth::user()->id;
        //$RespondantInformation->roles()->associate($roles);
        $RespondantInformation->claimnoticeid = $claimnoticeid;
        $RespondantInformation->save();

        

        return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','Respondent Information Saved Successfully.');
}
}
    }


    private function storeDocument($claimnoticeno, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id)
    {
        try
        {
            $fileDirPath = storage_path().'/app/public/uploads/claim/'.$claimnoticeno;

            $files = array_diff(scandir($fileDirPath), array('.', '..'));
            foreach ($files as $key => $value)
            {
                $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
                $fileName = $value;
                $fileDescription = 'Respondant Document';
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
                    'document_type' => 'Respondant',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //  echo $id; exit;
        $respondantinformations = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.country,ci.state,ci.city,ci.company_name,ci.proprietar_name,
      ci.zipcode,ci.daytimetelephone,ci.email,ci.respondant_type,ci.claimnoticeid,
      crt.id as claimant_respondant_typeid,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code from respondantdetails ci
      left join claimant_respondant_type  crt on (crt.id = ci.respondant_type) where ci.deleted_at is null and  ci.claimnoticeid=".$claimnoticeID);
        
        return view('RespondantInformation.show', compact('respondantinformations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $RespondantInformation = RespondantInformation::withTrashed()->findOrFail($id);

        return view('claimnotice.create', compact('RespondantInformation'));

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
         // echo $id; exit;

        // $request->validate([
            
        //     'email' => 'required',
        // ]);
        $claimnoticeid =session()->get('ClaimNoticeID');
         $claimnoti = DB::select("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'");
         // echo("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");exit;
        $phone_exist = DB::select("select * from respondantdetails where daytimetelephone = '".$request->daytimetelephone."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'"); 
         if( $request->email=='' || $request->daytimetelephone=='')
{
        if (count($claimnoti) != 0) 
        { 
          // echo ("hjhjh");exit;
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Email Address is already Registered.');
        }
        else if (count($phone_exist) != 0) 
        { 
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Phone Number is already Registered.');
        }
        else
        {

        RespondantInformation::findOrFail($id)->update($request->all());

         $table = DB::table('respondantdetails')
     ->where('id' , $id)
     ->update(['no_email'=>'1']);

      $table = DB::table('claimantnotice')
     ->where('id' , $claimnoticeid)
     ->update(['no_email'=>'1']);

        return redirect()->route('claimnotice.create')
        ->with('success','Respondant Information Updated Successfully.');
      }
    }
        else
{
        if (count($claimnoti) != 0) 
        { 
          // echo ("hjhjh");exit;
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Email Address is already Registered.');
        }
        else if (count($phone_exist) != 0) 
        { 
       return Redirect::to('claimnotice/create#respondantinformation')
        ->with('success','This Phone Number is already Registered.');
        }
        else
        {

        RespondantInformation::findOrFail($id)->update($request->all());

        return redirect()->route('claimnotice.create')
        ->with('success','Respondant Information Updated Successfully.');
      }
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
        $claimantinformation = RespondantInformation::find($id);
        $claimantinformation->delete();
        return redirect()->route('claimnotice.create')
        ->with('success','Respondant Information deleted successfully.');
    }


      public function getexistingmail(Request $request, $id = null)
  {
    $user_id = Auth::user()->id; 

    //echo $user_id;exit;

    $existingmail = DB::select("SELECT * FROM users WHERE email='".$request->email."' AND id ='".$user_id."' ");
    // $disputeSubCategory = DB::table('users')
    // ->where([['dispute_categories_id', $request->dispute_categories_id],])
    // ->pluck('subcategory_name','id');


    //echo json_encode($existingmail); exit;

    return response()->json($existingmail);
  }


}
