<?php

namespace App\Interfaces;

interface PostCategoryRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$postCategory);
    public function destroy($postCategory);
}
