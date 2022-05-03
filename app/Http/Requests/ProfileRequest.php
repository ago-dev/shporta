<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        $user = $this->user();
        return [
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'firstName' => 'string|max:50|min:2',
            'lastName' => 'string|max:50|min:2',
            'username' => 'required|string|max:50|min:2'
        ];
    }
}
