<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;

class FeatureStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:255|unique:features,name'
        ];
    }
}
