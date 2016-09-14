<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePassRequest extends Request
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
            'txtPassOld' =>'required|unique:tbl_users,password',
            'txtNewPassword' => 'required|AlphaNum|min:6',
            'txtConfirmPassword' => 'required|AlphaNum|min:6',
        ];
    }
    public function messages(){
        return [
            'txtPassOld.required' => 'Please Enter Old Password',
            'txtNewPassword.required' => 'Please Enter New Password',
            'txtConfirmPassword.required' => 'Please Enter Confirm New Password',

        ];
    }
}
