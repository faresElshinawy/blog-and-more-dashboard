<?php

namespace App\Http\Requests\Api;

use App\Models\Setting;
use App\Http\Requests\Api\ApiFormRequest;

class SettingUpdateRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Setting::rules();;
    }
}
