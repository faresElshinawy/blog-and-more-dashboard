<?php

namespace App\Http\Requests\Api;

use App\Models\Project;
use App\Http\Requests\Api\ApiFormRequest;

class ProjectUpdateRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Project::rules();
    }
}
