<?php

namespace App\Http\Requests;

class CreateAccountRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20',
            'role_id' => 'int|exists:roles,id',
            'address' => 'nullable|string',
            'birthday' => 'nullable|string',
        ];
    }
}
