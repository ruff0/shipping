<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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

            'sltRole' => 'required',
            'gridPer' => 'required'

        ];
    }
    public function messages(){
        return [

            'sltRole.required' => 'Please Choose User Role',    
            'gridPer.required' => 'Please select Permission'

        ];
    }
}
