<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\User;
use Session;
use App\Role;
use Redirect;
use DB;
use \Crypt;
use Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } 


    // public function webLoginPost(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);


    //     $remember_me = $request->has('remember_me') ? true : false; 


    //     if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
    //     {
    //         $user = auth()->user();
    //         return Redirect::to('home/index');
    //        // dd($user);
    //     }else{
    //         return back()->with('error','your username and password are wrong.');
    //     }
    // } 
    public function login(Request $request)
    {
    // echo ("yesdfdf");exit;
       $email=$request->get('email');
       $encrypt=$request->get('password');
       $token=$request->get('_token');
       $request->session()->put('email',  $email);
       $request->session()->put('password', $encrypt);
       $users = DB::table('users')
       ->join('roles','roles.id','=','users.roles_id')
       ->where('email', $email)
       ->select('users.email','users.password','users.roles_id','roles.display_name','users.id','users.mail_verify')
       ->get();
      
       $count_claimant=DB::select("SELECT count(ro.display_name) as logincount FROM roles ro INNER JOIN users us ON (us.roles_id=ro.id) WHERE us.email='".$email."' AND ro.id NOT IN('2','4')");
       $count_claimant1=$count_claimant[0]->logincount;
       $verify_count=0;
 // $encrypt_password=$users->password_role;
       $userList = array();
       foreach ($users as $key => $value) {
        if (Hash::check($encrypt, $value->password)) {

            array_push($userList, $value);
            if($value->mail_verify=='1')
        $verify_count++; 

        }


    }
 // echo json_encode($verify_count);exit;

    $mail_count=count($userList);

    $rows = 
    [
        'mail_count' => $mail_count,
        'userList' => $userList,
        'role_id'=>!empty($userList)?$userList[0]->roles_id:'',
        'token'=>$token,
        'email' => $email,
        'encrypt' => $encrypt,
        'count_claimant1'=> $count_claimant1,
        'verify_count'=> $verify_count,


    ];
    return response()->json($rows);

    
} 

public function showLoginForm(Request $request)  

{
    $email=$request->get('email');

    $allroles = DB::select("select * from roles ORDER BY display_name ASC");
    //     if($email!=null)
    //     {
    //     $selected_roles=DB::select("SELECT ro.display_name FROM roles ro INNER JOIN users us ON (us.roles_id=ro.id) WHERE us.email=".$email);
    //      return view('auth.login',compact('allroles','selected_roles'));
    // }
    
    return view('auth.login',compact('allroles','email'));
    

}
public function mail_verify($id)  

    {
         $userid=Crypt::decrypt($id);


    // echo json_encode($userid);exit;

        
      $table = DB::table('users')
        ->where('id' , $userid)
        ->update(['mail_verify' => '1']); 
        // dd($encrypt);
session()->put('success', 'Your Mail Got Verified Successfullyy!');
        return view('auth.login');
        
        // ->with('success','Your Mail Got Verified Successfully');

    
       
    }
public function role(Request $request)  

{
     $email=$request->session()->get('email');
  $encrypt=$request->session()->get('password');
      $users = DB::table('users')
       ->join('roles','roles.id','=','users.roles_id')
       ->where('email', $email)
       ->select('users.email','users.password','users.roles_id','roles.display_name','users.id','users.mail_verify')
       ->get();
        
 // echo json_encode($users);exit;


        // dd($encrypt);
  return view('auth.home2',compact('email','encrypt','users'));


}

  //   public function getrole(Request $request)
  //   {
  //        $email=$request->get('email');
  // // echo $email;exit;
  // $selected_roles=DB::select("SELECT ro.display_name FROM roles ro INNER JOIN users us ON (us.roles_id=ro.id) WHERE us.email='".$email."'");
  //   return view('auth.login',compact('selected_roles','email'));

  //   }
public function login_role(Request $request)
{


    $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
    if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

        return $this->sendLockoutResponse($request);
    }

    if ($this->attemptLogin($request)) {
        return $this->sendLoginResponse($request);
    }


  // echo $email;exit;

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);


    

}


protected function credentials(Request $request)
{



    if(is_numeric($request->get('email'))){
        return ['phone'=>$request->get('email'),'password'=>$request->get('password'),'roles_id'=>$request->get('role_id')];
    }

    return $request->only($this->username(), 'password','roles_id');
}


// public function logout()
// {
//      session(['user' => null]); 
//        return view('auth/login');
// }

}
