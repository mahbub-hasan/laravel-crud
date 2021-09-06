<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoAddRequest extends FormRequest
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
            'task'=>'required',
            'task_details'=>'required',
            'assign_to'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'task.required'=>'Task cannot be null or empty',
            'task_details.required'=>'Task details cannot be null or empty',
            'assign_to'=>'Please choose assign person'
        ];
    }
}
