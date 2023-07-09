<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FeedbackStoreRequest;
use App\Interfaces\FeedbackRepositoryInterface;
use App\Http\Requests\Api\FeedbackUpdateRequest;

class FeedbackController extends Controller
{
    use ApiResponse;

    private FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->feedbackRepository->index(false));
    }

    public function store(FeedbackStoreRequest $request)
    {
        return $this->apiResponse('feedback created successfully',$this->feedbackRepository->store($request),null,201);
    }

    public function update(FeedbackUpdateRequest $request,Feedback $feedback)
    {
        return $this->apiResponse('feedback updated successfully',$this->feedbackRepository->update($request,$feedback));
    }

    public function destroy(Feedback $feedback)
    {
        $this->feedbackRepository->destroy($feedback);
        return $this->apiResponse('feedback deleted successfully');
    }
}
