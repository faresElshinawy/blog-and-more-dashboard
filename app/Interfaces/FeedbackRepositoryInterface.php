<?php

namespace App\Interfaces;

interface FeedbackRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$feedback);
    public function destroy($feedback);
}
