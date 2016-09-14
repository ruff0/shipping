<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
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
            //'txtBookingID' => 'required|unique:tbl_booking_order,booking_no',

        ];
    }
    public function messages(){
        return [
            //'txtBookingID.required' => 'Enter BOOKING #',
            //'txtBookingID.unique' =>'BOOKING ID has already been taken'
        ];
    }
}
