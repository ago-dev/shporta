<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'email' => 'required|email',
            'firstName' => 'required|string|max:50|min:2',
            'lastName' => 'required|string|max:50|min:2',
            'username' => 'required|string|max:50|min:2',
            'role'=> 'required'
        ];
    }
}
