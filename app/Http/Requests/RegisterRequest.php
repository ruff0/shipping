<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'txtEmail' => 'required|email|unique:tbl_users,email',
            'txtPassword' => 'required|min:6',
            'sltUserType' => 'required',
            'sltState' => 'required',
            'txtPhone' => 'max:20',
            'txtFax' => 'max:20'
        ];
    }
    public function messages(){
        return [
            'txtEmail.required' => 'Enter your email',
            'txtEmail.unique' => 'Email is duplicated',
            'txtEmail.email' => 'Email must be a valid email address',
            'txtPassword.required' => 'Enter your password',
            'sltUserType.required' => 'Please Choose Customer Type',
            'sltState.required' => 'Please Choose State',
            'fileLogo' => 'required|mimes:jpeg,jpg,png,bmp,gif,svg',

        ];
    }
}
