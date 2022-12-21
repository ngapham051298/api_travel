<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class AuthnRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email||unique:users,email',
            'password' => 'required|min:6|max:12',
        ];
    }

    public function failedValidation(Validator $validated)
    {
        $errors = (new ValidationException($validated))->errors();
        throw new HttpResponseException(
            _error(
                $errors,
                'message.email_password_incorrect',
                HTTP_BAD_REQUEST
            )
        );
    }
}
