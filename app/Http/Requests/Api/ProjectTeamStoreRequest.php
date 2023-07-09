<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;
use App\Models\ProjectTeam;

class ProjectTeamStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return ProjectTeam::rules();
    }
}
