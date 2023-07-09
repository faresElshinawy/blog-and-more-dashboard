<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;
use App\Models\ProjectImage;

class ProjectImageStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'image'=>'required|image|mimes:gif,jpeg,jpg,png|max:2048'
        ];
    }
}
