<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QuestionStoreRequest;
use App\Interfaces\QuestionRepositoryInterface;
use App\Http\Requests\Api\QuestionUpdateRequest;

class QuestionController extends Controller
{
    use ApiResponse;

    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->questionRepository->index(false));
    }

    public function store(QuestionStoreRequest $request)
    {
        return $this->apiResponse('question created successfully',$this->questionRepository->store($request),null,201);
    }

    public function update(QuestionUpdateRequest $request,Question $question)
    {
        return $this->apiResponse('question updated successfully',$this->questionRepository->update($request,$question));
    }

    public function destroy(Question $question)
    {
        $this->questionRepository->destroy($question);
        return $this->apiResponse('question deleted successfully');
    }
}
