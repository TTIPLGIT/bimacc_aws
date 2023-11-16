<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use DB;
use \Crypt;
use App\models\Role;


class RespondantCentreController  extends Controller
{
  public function index()
  {
   $user_id = (auth()->check()) ? auth()->user()->id : null;
   if ( $user_id==null)
   {

    return view('auth.login'); 
  }
  $respondantinformations = DB::select("SELECT *,cl.claimnoticeno,res.id FROM respondantdetails res left JOIN claimantnotice cl ON(res.claimnoticeid=cl.id) 
    left join claimant_respondant_type  crt on (crt.id = res.respondant_type)
    WHERE res.no_email='1' ");





  return view('respondent_centre.index', compact('respondantinformations'));

}
public function update(Request $request, $id)
{
         // echo $id; exit;
$noticeid = DB::select("select claimnoticeid from respondantdetails where id = '".$id."'");
$claimnoticeid=$noticeid[0]->claimnoticeid;
 $existinguser = DB::select("select * from users where roles_id='4' and email = '".strtolower($request->email)."'");
 if (count($existinguser) > 0) 
 {
  $user_id =$existinguser[0]->id; 
  $claimnoti = DB::select("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'");
$phone_exist = DB::select("select * from respondantdetails where daytimetelephone = '".$request->daytimetelephone."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'");
        // echo ("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");exit;
        // echo 
if (count($claimnoti) != 0) 
{ 
  


  return redirect()->route('respondentdetailupdate.index')
    ->with('success','This Email Address is Already Registered Against this Claimnotice.');
}
else if (count($phone_exist) != 0) 
{ 



 return redirect()->route('respondentdetailupdate.index')
    ->with('success','This Phone Number is Already Registered Against this Claimnotice.');

}

else{
 $table = DB::table('respondantdetails')
 ->where('id' , $id)
 ->update(['no_email'=>'0','daytimetelephone'=>$request->daytimetelephone,'email'=>$request->email,'user_id'=>$user_id]);


 $claimnoti = DB::select("select * from respondantdetails where no_email='1' and claimnoticeid = '".$claimnoticeid."'");

 if (count($claimnoti) == 0) 
 {
   // echo ($claimnoticeid);exit;
   $table = DB::table('claimantnotice')
   ->where('id' , $claimnoticeid)
   ->update(['no_email'=>'0']); 
 }






// session()->put('success', 'Respondent Information Updated Successfully.');
//  return view('respondent_centre.index',compact('respondantinformations'));

 return redirect()->route('respondentdetailupdate.index')
    ->with('success','Respondent Information Updated Successfully.');

}
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


        // echo json_encode($claimnoticeid);exit;
$claimnoti = DB::select("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'");
$phone_exist = DB::select("select * from respondantdetails where daytimetelephone = '".$request->daytimetelephone."' and claimnoticeid = '".$claimnoticeid."' and id !='".$id."'");
        // echo ("select * from respondantdetails where email = '".strtolower($request->email)."' and claimnoticeid = '".$claimnoticeid."'");exit;
        // echo 
if (count($claimnoti) != 0) 
{ 
  


  return redirect()->route('respondentdetailupdate.index')
    ->with('success','This Email Address is already Registered against this Claimnotice.');
}
else if (count($phone_exist) != 0) 
{ 



 return redirect()->route('respondentdetailupdate.index')
    ->with('success','This Phone Number is already Registered against this Claimnotice.');

}

else{
 $table = DB::table('respondantdetails')
 ->where('id' , $id)
 ->update(['no_email'=>'0','daytimetelephone'=>$request->daytimetelephone,'email'=>$request->email,'user_id'=>$user_id]);


 $claimnoti = DB::select("select * from respondantdetails where no_email='1' and claimnoticeid = '".$claimnoticeid."'");

 if (count($claimnoti) == 0) 
 {
   // echo ($claimnoticeid);exit;
   $table = DB::table('claimantnotice')
   ->where('id' , $claimnoticeid)
   ->update(['no_email'=>'0']); 
 }






// session()->put('success', 'Respondent Information Updated Successfully.');
//  return view('respondent_centre.index',compact('respondantinformations'));

 return redirect()->route('respondentdetailupdate.index')
    ->with('success','Respondent Information Updated Successfully.');

}

}
}
}