<?php

namespace App\models;
use App\models\Role;
use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

class Role extends LaratrustRole
{
    protected $table = "roles";
            protected $fillable = [
            'name','display_name', 'description',
        ];
     public function user()
    {
        return $this->hasOne(User::class);
    }
    
     public function arbitrationmaster()
    {
        return $this->hasMany(ArbitrationMaster::class);
    }
    public function respondantinformation()
    {
        return $this->hasMany(RespondantInformation::class);
    }
}
