<?php

namespace App\Repositories;

use App\Models\question;
use App\Interfaces\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Question::painate(10);
        }
        return Question::get();
    }

    public function store($request)
    {
        $question = Question::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return $question;
    }

    public function update($request,$question)
    {
        $question->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return $question;
    }

    public function destroy($question)
    {
        $question->delete();
    }
}
