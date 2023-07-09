<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;

class GenderUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:255|unique:genders,name,'.$this->gender->id
        ];
    }
}
