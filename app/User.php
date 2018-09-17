<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','Role_id', 'password','is_active','photo_id'
    ];

    public function role(){

        return $this->belongsTo('App\Role' ,'Role_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password)){
            $this->attributes['password'] = bcrypt($password);
        }else{
            $this->attributes['password'] = $password;
        }
    }

    public function isAdmin()
    {
        if($this->role->name == "administrator"){

            return true;
        }
        return false;

    }

    public function post()
    {
        return $this->hasMany('App\Post');

    }
}
