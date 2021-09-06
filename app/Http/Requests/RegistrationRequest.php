<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required|max:10|unique:users',
            'password'=>'required',
            'c_password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>"First name cannot be null or empty",
            'last_name.required'=>"Last name cannot be null or empty",
            'username.required'=>"Username cannot be null or empty",
            'username.max'=>"Username must be 10 char long",
            'password.required'=>'Password cannot be null or empty',
            'c_password.required'=>'Confirm Password cannot be null or empty'
        ];
    }
}
