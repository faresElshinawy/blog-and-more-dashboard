<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiFormRequest;
use App\Models\Feedback;

class FeedbackStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Feedback::rules();
    }
}
