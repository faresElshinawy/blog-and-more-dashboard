<?php

namespace App\Interfaces;


interface QuestionRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$question);
    public function destroy($question);
}
