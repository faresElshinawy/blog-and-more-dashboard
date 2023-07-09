<?php

namespace App\Http\Requests\Api;

use App\Models\Question;
use Spatie\FlareClient\Api;
use App\Http\Requests\Api\ApiFormRequest;

class QuestionUpdateRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return Question::rules();
    }
}
