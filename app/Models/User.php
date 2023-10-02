<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country',
        'phone',
        'address',
        'referrence_id',
        'image',
        'email',
        // 'last_name',
        'state',
        'city',
        'password',
    ];

    public function visa(){
        return $this->hasMany(VisaApplication::class);
    }

    public function userwallet(){
        return $this->hasOne(UserWallet::class);
    }

    public function kyc(){
        return $this->hasOne(Kyc::class);
    }


    public function isKYCApproved()
    {
        return $this->kyc && $this->kyc->approve_status;
    }

    public function hasSubmittedKYC()
    {
        return $this->kyc !== null; 
    }

    public function flightbooking(){
        return $this->hasMany(FlightBooking::class);
    }

    public function flightcustomer(){
        return $this->hasMany(FlightCustomer::class);
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
    ];
}
