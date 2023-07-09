<?php

namespace App\Http\Requests\Api;

use App\Models\Service;
use App\Http\Requests\Api\ApiFormRequest;

class ServiceStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return array_merge([
            'title'=>'required|string|min:3|max:255|unique:services,title',
            'image'=>'required|image|mimes:gif,png,jpeg,jpg'
        ],Service::rules());
    }
}
