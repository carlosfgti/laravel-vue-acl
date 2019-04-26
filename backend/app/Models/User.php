<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'user_profile');
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasProfile($permission->profiles);
    }
    
    public function hasProfile($profile)
    {
        if(is_string($profile) ) {
            return $this->profiles->contains('name', $profile);
        }

        return !! $profile->intersect($this->profiles)->count(); 
    }

    public function isSuperAdmin()
    {
        return $this->hasProfile('Admin');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
