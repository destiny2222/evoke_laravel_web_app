<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FLightCustomerDetails extends Model
{
    use HasFactory;

    protected $table = 'flight_customer_details';

    protected $fillable = [
        'flightbooking_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'user_id'
    ];

    public function flightbooking(){
        return $this->belongsTo(FLightBooking::class, 'flightbooking_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
