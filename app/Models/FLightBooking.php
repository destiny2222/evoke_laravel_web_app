<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FLightBooking extends Model
{
    use HasFactory;

    protected $table = 'flight_bookings';
    

    protected $fillable = [
        'airport_location_from',
        'airport_location_to',
        'flight_date',
        'flight_return_date',
        'flight_class',
        'flight_time',
        'user_id',
        'number_passenger',
        'passenger_name',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function flightcustomerDetails(){
        return $this->hasOne(FLightCustomerDetails::class, 'flightbooking_id');
    }

}
