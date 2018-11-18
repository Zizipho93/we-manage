<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProject extends FormRequest
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

    public function messages()
    {
        return [
            'project.0.name.required' => 'The project name field is required.',
            'project.0.name.min' => 'The project name field must be at least 6 characters.',
            'project.0.description.required' => 'The project description field is required.',
            'project.*.email_name.required' => 'The name field is required.',

            'project.*.email_invites.required' => 'The email field is required.',
            'project.*.email_invites.unique' => 'The email has already been taken.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'project.0.name' => 'required|min:6',
            'project.0.description' => 'required',
            'project.*.email_name' => 'required',
            'project.*.email_invites' => 'required|unique:users,email,project.*.email_invites|regex:/^.+@.+$/i',
        ];
    }
}
