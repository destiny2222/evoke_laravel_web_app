<?php

namespace App\Http\Requests\Flight;

use App\Models\InternationalFlight;
use Illuminate\Foundation\Http\FormRequest;

class InternationalFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'airport_location_from' =>'required|string',
            'airport_location_to' =>'required|string',
            'flight_date' =>'required|date',
            'flight_return_date' =>'required|date',
            'flight_class' =>'required|string',
            'flight_time' =>'required|time',
            'number_passenger' =>'required|string',
            'passenger_name' =>'required|string',
            'baggage_weight' =>'required|string',
            'passenger_title' =>'required|string',
            'passenger_fname_onpassport' =>'required|string',
            'passenger_lastname_onpassport' =>'required|string',
            'passenger_gender_onpassport' =>'required|string',
            'date_of_birth' =>'required|date',
            'passenger_email' =>'required|string',
            'passenger_phone' =>'required|string',
        ];
    }


    public function createFlightBooking(){
        InternationalFlight::create([
            'airport_location_from' => $this->airport_location_from,
            'airport_location_to' => $this->airport_location_to,
            'flight_date' => $this->flight_date,
            'flight_return_date' => $this->flight_return_date,
            'flight_class' => $this->flight_class,
            'flight_time' => $this->flight_time,
            'user_id' => $this->user_id,
            'number_passenger' => $this->number_passenger,
            'passenger_name' => $this->passenger_name,
            'baggage_weight' => $this->baggage_weight,
            'passenger_title' => $this->passenger_title,
            'passenger_fname_onpassport' => $this->passenger_fname_onpassport,
        ]);
        return true;
    }
}
