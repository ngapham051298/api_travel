<?php
namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'nullable|string',
            'birthday' => 'nullable|string',
        ];
    }
}
