<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailable;
use Mail;
use App\models\ArbitrationMaster;
use App\models\DisputeSubcategory;
use App\models\DisputeCategory;
use App\Notifications\NewClaimant;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','usertype','roles_id'
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
   
   
     public static function sendWelcomeEmail($user)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);

      
      
      // Send email
      Mail::send('emails.new-user', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('BIMACC Admin', 'Online Arbitration System');
        $m->to($user->email, $user->password)->subject('Online Arbitration System - Request for Arbitrator Registration.');
      });
    }

    public static function Sendnotification($user)
    {
       
        $user = User::find(1);

        foreach ($user->notifications as $notification) {
                echo $notification->type;
        }

    $user->notify(new NewClaimant($user));

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
