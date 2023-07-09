<?php

namespace App\Http\Requests\Api;

use App\Models\Question;
use App\Http\Requests\Api\ApiFormRequest;

class QuestionStoreRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Question::rules();
    }
}
