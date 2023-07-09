<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;

class ClientStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:255|unique:clients,name',
            'image'=>'required|max:2048|image|mimes:png,jpeg,jpg,gif'
        ];
    }
}
