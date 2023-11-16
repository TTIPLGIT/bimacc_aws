<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\models\User;
use App\models\ArbitrationMaster;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\Role;
use App\ClaimantRegister;
use Auth;
use Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use \Crypt;
use App\DatabaseHelper;


class ArbitrationMasterController extends Controller
{
    use RegistersUsers;


     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
     {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            // 'username' => 'required|string|max:20',
            // 'email' => 'required|string|email|max:255|unique:users'            
        ]);

    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
         $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }

        $arbitrationmasters = DatabaseHelper::getarbitratormaster_index();
        $claimnotice = DB::select("select distinct sm.claimnoticeno,cpa.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )

        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
         inner join claimnotice_petion_arbitrationno cpa on (cpa.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        where cac.arbitrator_id= ".$user_id. " order by sm.id desc");

         $experience_details = DB::select("sELECT * from arbitrator_domain_detail");

        // echo json_encode($arbitrationmasters); exit;
        // $arbitrationmasters = ArbitrationMaster::all();
        
        $arbitrationcount = count($arbitrationmasters);

        $disputecategory = DisputeCategory::all();
        
        $disputesubcategory = DisputeSubcategory::all();

        
        $dispute_categories = DB::table('dispute_categories')->get();
        $dispute_subcategories = DB::table('dispute_subcategories')->get();

        return view('arbitrationmaster.index', compact('arbitrationmasters','disputecategory','disputesubcategory', 'dispute_categories','dispute_subcategories', 'arbitrationcount','claimnotice','experience_details'));
    }

public function arbitratorindex($id)
    {
        

        
        $claimnotice = DB::select("select distinct sm.claimnoticeno,cpa.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name, CONCAT(am.firstname,' ' , am.lastname) AS arbitrator_name,am.arbitrator_code from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        left join claim_details cd on (cd.claimnoticeid =sm.id and cd.is_respondant is null )

        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
         inner join claimnotice_petion_arbitrationno cpa on (cpa.claimnoticeid = sm.id)
        LEFT JOIN arbitration_masters am ON (am.user_id = cac.arbitrator_id)
        where cac.arbitrator_id= ".$id. " order by sm.id desc");

        // echo json_encode($arbitrationmasters); exit;
        // $arbitrationmasters = ArbitrationMaster::all();
        
       

        return view('arbitrationmaster.arbitratorcase', compact('claimnotice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('arbitrationmaster.create');      
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        //$existingmail = DB::select("SELECT * FROM users WHERE email='".$request->email."'  and roles_id in (3)"); 


        $this->validate($request, [
            // 'firstname' => 'required',
            // 'lastname' =>'required',
            // 'arbitrator_code'=>'regex:/^[\w-]*$/',
            // 'email' => 'required|email',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            // 'country' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            
        ]);
      //   $claimdetails =DB::table('arbitration_masters')->orderBy('id', 'desc')->first();
      // if ($claimdetails ==null) 
      // {
      //   $arbitrator_code =  'A1';
      //   // echo ($claimnoticenoNew);exit;
      // }
      // else
      // {
      //   $claimnoticeno = $claimdetails->arbitrator_code;
      //   $arbitrator_code =  ++$claimnoticeno;  // AAA004  
      // }

        $existingmail = DB::select("SELECT * FROM users WHERE email='".$request->email."'  and roles_id in (3)"); 


        $countdetails = count($existingmail);

        if($countdetails == 1){
            return redirect()->route('arbitrationmaster.index')
       ->with('success','Email Id Already Exist.');
        }


else{
        $roles = Role::where('name', 'arbitrator')->first();

        // $pw = User::generatePassword();
        $password_string = 'abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
        $password = substr(str_shuffle($password_string), 0, 8);
        $encrypt = Crypt::encrypt($password); 
       
        // echo json_encode($decrypt);exit;     
        $user = new User();
        $fullname =   $request->firstname.' '.$request->lastname;      
        $user->name = $fullname;
        $user->username = $fullname;
        $user->email = $request->email;
        $user->password = $password;
        $user->roles()->associate($roles);
        $user->encrypt_pass =$encrypt;
        // $decrypt_password=Crypt::decrypt($user->encrypt_pass);

        
        // echo json_encode( $user->decrypt_pass);exit;
        $usertype = $roles;        
        $user->usertype = $usertype;       
        $user->save();
        $user->id; 
         $decrypt = Crypt::decrypt($encrypt);
         $data = array(
     
      'decrypt' =>$decrypt, 
    );


        User::sendWelcomeEmail($user,$data); 
        
        $arbitrationmaster = new ArbitrationMaster(); 
        $user_id = $user->id;               
        
        $arbitrationmaster->firstname = $request->firstname;        
        $arbitrationmaster->lastname = $request->lastname;
        $fullname = $arbitrationmaster->firstname." ".$arbitrationmaster->lastname;
        $arbitrationmaster->username = $fullname;
        $arbitrationmaster->miiddlename = $request->miiddlename;              
        $arbitrationmaster->phone = $request->phone;
         $arbitrationmaster->email = $request->email;
        $arbitrationmaster->address = $request->address;        
        $arbitrationmaster->qualification = $request->qualification;
        $arbitrationmaster->language_prof = $request->language_prof;
        $arbitrationmaster->age = $request->age;
        $arbitrationmaster->dob = $request->dob;
        $arbitrationmaster->experience = $request->experience;               
        $arbitrationmaster->usertype = $usertype;
        $arbitrationmaster->training = $request->training;
        $arbitrationmaster->no_of_arbitration = $request->no_of_arbitration;
        $arbitrationmaster->prof_experience = $request->prof_experience;
         $arbitrationmaster->present_prof = $request->present_prof;
          $arbitrationmaster->prior_position = $request->prior_position;
           $arbitrationmaster->membership = $request->membership;
            $arbitrationmaster->litigation = $request->litigation;
             $arbitrationmaster->no_of_arbitration_rep = $request->no_of_arbitration_rep;
              $arbitrationmaster->conf_interest = $request->conf_interest;
               $arbitrationmaster->arbitrator_code =  $arbitrationmaster->firstname." ".$arbitrationmaster->lastname;
        $arbitrationmaster->user_id = $user_id;
        $arbitrationmaster->roles()->associate($roles);
        $usertype = $roles;        
        $arbitrationmaster->usertype = $usertype;  



        
        
        if ($arbitrationmaster->save()) 
        {
             $arbitratorid =  DB::getPdo()->lastInsertId();
$domain = $request->domain;
$year_of_exp = $request->year_of_exp;
if (!empty($domain[0])) {
 $count=  count($domain);
 for ($i=0; $i < $count; $i++) {
$domain = DB::table('arbitrator_domain_detail')
   ->insertGetId([  

    'domain' =>$domain[$i],
    'year_of_exp' =>$year_of_exp[$i],
   'arbitrator_id' => $arbitratorid,
      'created_id'        =>  Auth::user()->id,

]); 
}
}  

            $phone = $arbitrationmaster->phone;


            $url="https://www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Welcome to the Online Arbitration System. Thank You for Registering As a Arbitrator Check Your Email For Login Credential.");// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=9NTU6RCILNPNZWF5MYHMK7O9TA0W9OZB&secret=REL8EGNQQK3XCEE3&usetype=stage&phone=$phone&senderid=$user_id&message=$message");
// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;




           // Redirect to the new accessory  page
return redirect()->route('arbitrationmaster.index')
->with('success','Arbitration Master Created Successfully.');
}

return redirect()->back()->withInput()->withErrors($arbitrationmaster->getErrors());   
}
}

    /**
     * Display the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // echo ($id);exit;
      //  $user_id = (auth()->check()) ? auth()->user()->id : null;

      // if ( $user_id==null)
      // {

      //   return view('auth.login');
      // }
        $arbitrationmasters = DB::select("sELECT am.*,dc.category_name,us.mail_verify  FROM arbitration_masters am
        INNER JOIN dispute_categories dc ON (am.dispute_categories_id = dc.id)
        inner JOIN users us ON (am.user_id=us.id)
         where am.deleted_at is NULL and am.id=".$id);
        // $arbitrationmasters = ArbitrationMaster::findOrFail($id);
        return view('arbitrationmaster.show', compact('arbitrationmasters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisputeCategory  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
       
        $arbitrationmasters = ArbitrationMaster::find($id);

        $dispute_categories = DisputeCategory::all();
        $dispute_subcategories = DisputeSubcategory::all(); 
      
        $experience_details = DB::select("sELECT * from arbitrator_domain_detail
         where arbitrator_id=".$id);

        return view('arbitrationmaster.edit', compact('arbitrationmasters','dispute_categories','dispute_subcategories', 'experience_details'));         
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisputeCategory  $dispute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // $request->validate([
        //     'firstname' => 'required',
        //     'username' => 'required',
        // ]);

        //echo $id; exit;
      // ArbitrationMaster::findOrFail($id)->update($request->all());
      $bank_cliam_update = DB::table('arbitration_masters')
     ->where(['id'=>$id])
     ->update(['firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'firstname' => $request->firstname,
        'username' => $request->lastname,
        'miiddlename' => $request->miiddlename,
        'phone' =>$request->phone,
        'email' => $request->email,
        'address' => $request->address,
        'qualification' =>$request->qualification,
        'language_prof' => $request->language_prof,
        'age' => $request->age,
        'dob' => $request->dob,
        'experience' => $request->experience,
'training' => $request->training,
'no_of_arbitration' => $request->no_of_arbitration,
'prof_experience' => $request->prof_experience,
'present_prof' => $request->present_prof,
'prior_position' => $request->prior_position,
'membership' => $request->membership,
'litigation' =>  $request->litigation,
'no_of_arbitration_rep' =>  $request->no_of_arbitration_rep,
'conf_interest' =>  $request->conf_interest,


    ]);

             $domain = $request->domain;
        $year_of_exp = $request->year_of_exp;
if (!empty($domain[0])) {
     DB::delete('delete from arbitrator_domain_detail where arbitrator_id = ?',[$id]);
 $count=  count($domain);
 for ($i=0; $i < $count; $i++) {
$domain1 = DB::table('arbitrator_domain_detail')
   ->insertGetId([  

    'domain' =>$domain[$i],
    'year_of_exp' =>$year_of_exp[$i],
   'arbitrator_id' => $id,
      'created_id'        =>  Auth::user()->id,

]); 
}
}  
        return redirect()->route('arbitrationmaster.index')
        ->with('success','Arbitration Master Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisputeCategory  $disputeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // $arbitrationmasters = ArbitrationMaster::find($id);
      //   $arbitrationmasters->delete();
        // $users_id=DB::select("select user_id as arb_id from arbitration_masters where id=".$id );
        // $user_id= $users_id[0]->arb_id;
        DB::delete('delete from arbitration_masters where user_id = ?',[$id]);
        DB::delete('delete from users where id = ?',[$id]);

        return redirect()->route('arbitrationmaster.index')
        ->with('success','Arbitration Master Deleted Successfully.');
    }  



}
