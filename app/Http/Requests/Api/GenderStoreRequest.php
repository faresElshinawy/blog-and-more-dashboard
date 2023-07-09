<?php

namespace App\Http\Requests\Api;

use App\Models\Gender;
use App\Http\Requests\Api\ApiFormRequest;

class GenderStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:255|unique:genders,name'
        ];
    }

}
