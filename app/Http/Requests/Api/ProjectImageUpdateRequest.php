<?php

namespace App\Http\Requests\Api;

use App\Models\ProjectImage;
use App\Http\Requests\Api\ApiFormRequest;

class ProjectImageUpdateRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'image'=>'nullable|image|mimes:gif,jpeg,jpg,png|max:2048'
        ];
    }
}
