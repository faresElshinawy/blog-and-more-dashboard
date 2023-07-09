<?php

namespace App\Http\Requests\Api;

use App\Models\Plan;
use App\Http\Requests\Api\ApiFormRequest;

class PlanStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return array_merge(Plan::rules(),[
            'image'=>'required|image|mimes:jpej,jpg,png,gif'
        ]);
    }
}
