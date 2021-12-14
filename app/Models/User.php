<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'weight',
        'height',
        'planType',
        'goal',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function checkToken($token)
    {
        if ($token->token) {
            return true;
        }
        return false;
    }

    public static function getCurrentUser($request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public static function findByEmail($email)
    {
        return static::where(compact('email'));
    }

    // public static function find($id)
    // {
    //     return static::where(compact('id'));
    // }

    /**
     * Get the ROUTINE records associated with the USER
     */
    public function routines()
    {
        // return $this->hasMany(Routine::class);
        return $this->hasMany('App\Models\Routines');
    }

    /**
     * Get the DIET records associated with the USER
     */
    public function diets()
    {
        return $this->hasMany(Diet::class);
    }

    
}
