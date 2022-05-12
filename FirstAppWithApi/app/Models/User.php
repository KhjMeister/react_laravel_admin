<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Fortify\TwoFactorAuthenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    // TwoFactorAuthenticatable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'family',
        'email',
        'phone',
        'password',
        // 'social_id',
        // 'social_type'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }  

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function session()
    {
        return $this->hasMany(Session::class);
    }

}
