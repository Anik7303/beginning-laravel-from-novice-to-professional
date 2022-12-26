<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // TODO: fix this
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'address' => ['required', 'string'],
            'company_id' => ['required', 'exists:companies,id']
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email is already in use',
            'email.email' => 'The entered email is invalid',
            '*.required' => 'The :attribute field cannot be empty'
        ];
    }
}