<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;

class PostTagStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'tag'=>'required|gt:0|exists:tags,id'
        ];
    }
}
