<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\FeedbackRepositoryInterface;

class FeedbackController extends Controller
{

    private FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Feedbacks.index',['feedbacks'=>$this->feedbackRepository->index(true)]);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        toast('feedback deleted successfully','success');
        return redirect()->back();
    }
}
