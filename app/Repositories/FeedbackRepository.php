<?php

namespace App\Repositories;

use App\Models\feedback;
use App\Interfaces\FeedbackRepositoryInterface;

class FeedbackRepository implements FeedbackRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return feedback::with('user:name,email,image,id')->paginate(10);
        }
        return Feedback::with('user:name,email,image,id')->get();
    }

    public function store($request)
    {
        $feedback = Feedback::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'rate'=>$request->rate
        ]);
        return $feedback;
    }

    public function update($request,$feedback)
    {
        $feedback->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'rate'=>$request->rate
        ]);
        return $feedback;
    }

    public function destroy($feedback)
    {
        $feedback->delete();
    }
}
