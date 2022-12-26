<?php

namespace App\Http\Requests;

class PasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
