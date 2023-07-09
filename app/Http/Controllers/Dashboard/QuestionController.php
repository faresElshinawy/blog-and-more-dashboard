<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\QuestionRepositoryInterface;
use App\Http\Requests\Dashboard\QuestionStoreRequest;
use App\Http\Requests\Dashboard\QuestionUpdateRequest;

class QuestionController extends Controller
{

    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Questions.index',['questions'=>$this->questionRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Questions.create');
    }

    public function store(QuestionStoreRequest $request)
    {
        $this->questionRepository->store($request);
        toast('question created successfully','success');
        return redirect()->back();
    }

    public function edit(Question $question)
    {
        return view('Dashboard.pages.Questions.edit',compact('question'));
    }

    public function update(QuestionUpdateRequest $request,Question $question)
    {
        $this->questionRepository->update($request,$question);
        toast('question updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Question $question)
    {
        $this->questionRepository->destroy($question);
        toast('question deleted successfully','success');
        return redirect()->back();
    }
}
