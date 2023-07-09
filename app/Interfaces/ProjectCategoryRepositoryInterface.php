<?php

namespace App\Interfaces;


interface ProjectCategoryRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$projectCategory);
    public function destroy($projectCategory);
}
