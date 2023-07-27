<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $rules = [
            'username' => 'required|unique:users,username',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'password' => 'required|min:6',
            'email' => 'required|unique:users,email',
        ];

        return $rules;
    }
}
