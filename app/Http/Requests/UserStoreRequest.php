<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'firstName' => 'required|string|max:50|min:2',
            'lastName' => 'required|string|max:50|min:2',
            'username' => 'required|string|max:50|min:2',
            'password' => 'required|string|min:8'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'firstName.required' => 'First name is required!',
            'lastName.required' => 'Last name is required!',
            'username.required' => 'Username is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
