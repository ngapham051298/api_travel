<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class BaseRequest extends FormRequest
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

    public function failedValidation(Validator $validated)
    {
        $errors = (new ValidationException($validated))->errors();
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'message' => __('validator.error'),
                    'data' => $errors,
                ],
                HTTP_BAD_REQUEST
            )
        );
    }
}
