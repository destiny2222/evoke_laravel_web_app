<?php

namespace App\Http\Requests\Tuition;

use App\Models\TuitionPaymentWire;
use Illuminate\Foundation\Http\FormRequest;

class WireTransfer extends FormRequest
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
            'legal_name'=>['required','string'],
            'account_number'=>['required','string'],
            'routing_number'=>['required','string'],
            'student_id'=>['required','string'],
            'bank_swift_code'=>'required','string',
            'school_iban'=>['nullable','string'],
            'student_email'=>['required','string','email'],
            'school_address'=>'required','string',
            'service_type'=>['required','string'],
            'college_name'=>['required','string'],
            'amount'=>['required','integer']
        ];
    }

    public function createStore(){
        TuitionPaymentWire::create([
              'legal_name'=>$this->legal_name,
              'account_number'=>$this->account_number,
              'routing_number'=>$this->routing_number,
              'student_id'=>$this->student_id,
              'bank_swift_code'=>$this->bank_swift_code,
              'school_iban'=>$this->school_iban,
              'student_email'=>$this->student_email,
              'school_address'=>$this->school_address,
              'service_type'=>$this->service_type,
              'college_name'=>$this->college_name,
              'amount'=>$this->amount,
              'user_id'=>$this->user_id
            ]);
            return true;
    }
}
