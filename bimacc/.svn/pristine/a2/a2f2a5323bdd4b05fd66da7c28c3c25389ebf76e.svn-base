<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailable;
use App\models\User;
use Mail;
use App\models\ArbitrationMaster;
use App\models\DisputeSubcategory;
use App\models\DisputeCategory;
use \Crypt;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','usertype','role_id','encrypt_pass','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token',
    ];

    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
      return bcrypt(str_random(8));
    }
   
   
     public static function sendWelcomeEmail($user,$data)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      $id=$user->id;
      $userid=Crypt::encrypt($id);

     
      
      Mail::send('emails.new-user', ['user' => $user, 'token' => $token,"data1"=>$data,'id'=>$userid], function ($message) use ($user) {
         $message->to($user->email)
        ->subject('Welcome to Online Arbitration System');
       
      });
     
    }

   

   public function setPasswordAttribute($password){
    $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
        }

    public function claimantregister()
        {
            return $this->hasMany(ClaimantRegister::class);
        }
        public function sendPasswordResetNotification($token)
        {
             $this->notify(new ResetPasswordNotification($token));
        }

        public function disputesubcategories()
    {
        return $this->hasMany(DisputeSubcategory::class);
    }

    public function disputecategories()
    {
        return $this->hasMany(DisputeCategory::class);
    }

   /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
    
    
    public function arbitrationmasters()
    {
        return $this->hasMany(ArbitrationMaster::class);

    }
    public function respondantinformation()
    {
        return $this->hasMany(RespondantInformation::class);
    }
    public function arbitratorconfiguration()
    {
        return $this->hasMany(ArbitratorConfiguration::class);
    }

    public function loan_type()
    {
      return $this->hasMany(LoanType::class);
    }

    public function administrationfees()
    {
        return $this->belongsTo(AdministrationFees::class);
    }
    

}
