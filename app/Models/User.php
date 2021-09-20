<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nic',
        'full_name',
        'phone',
        'nick_name',
        'email',
        'email_verified_at',
        'dob',
        'gender',
        'country',
        'city',
        'address',
        'profile_pic',
        'wall_pic',
        'password',
        'otp_code',
        'verification_code',
        'is_verified',
        'account_of',
        'account_type',
        'account_status',
        'account_privacy',
        'post_privacy',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
