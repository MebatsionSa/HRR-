<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRegistration extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_name' => 'required|string',
            'hotel_phone_number' => 'required|digits:10',
            'hotel_email'  => 'required|email|unique:hotels,hotel_email',
            'hotel_city'   => 'required|string',
            'hotel_type'   => 'required|string',
            'hotel_password' => 'required|string|min:6|confirmed',
            
        ];
    }

   
}
