<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditRequest extends Request
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
            'txtEmail'=>'required',
            'sltUserType' => 'required',
            'sltState' => 'required'
        ];
    }
    public function messages(){
        return [
            'txtEmail.required' => 'Enter your email',
            'sltUserType.required' => 'Please Choose Customer Type',
            'sltState.required' => 'Please Choose State',
        ];
    }
}
