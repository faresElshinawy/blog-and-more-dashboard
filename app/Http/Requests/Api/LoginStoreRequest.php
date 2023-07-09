<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;

class LoginStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email'=>'required|email',
            'password'=>'required|min:6|max:50'
        ];
    }
}
