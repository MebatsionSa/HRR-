<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PositiveNumber;
class Room extends FormRequest
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
            'room_name'     =>  'required|string',
            'room_price'    =>  ['required','integer','gt:200'],
            'room_image'    =>  ['required','image','min:2','max:100'],
            'room_number'   =>  ['required','integer','gt:0'],
            'description'   =>  ['required','min:10','max:30'],
        ];
    }
}
