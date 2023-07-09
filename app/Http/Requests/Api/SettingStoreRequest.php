<?php

namespace App\Http\Requests\Api;

use App\Models\Setting;
use App\Http\Requests\Api\ApiFormRequest;

class SettingStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Setting::rules();
    }
}
