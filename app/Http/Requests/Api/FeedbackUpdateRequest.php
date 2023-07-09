<?php

namespace App\Http\Requests\Api;

use App\Models\Feedback;
use App\Http\Requests\Api\ApiFormRequest;

class FeedbackUpdateRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Feedback::rules();
    }
}
