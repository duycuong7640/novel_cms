<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'phone',
        'address',
        'thumbnail',
        'is_push_notify',
        'is_send_mail',
        'user_type',
        'customer_id',
        'total_point',
        'status',
        'email_verified_at',
    ];

    public $fillableSearch = [
        'name',
        'email',
        'password',
    ];

    public $fillableSearchLike = [
        'name',
        'email',
        'password',
    ];

    public $fillableSearchIn = [
        'name',
        'email',
        'password',
    ];

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
