<?php

namespace App\Interfaces;


interface ProjectImageRepositoryInterface
{

    public function index($project);
    public function store($request,$project);
    public function update($request,$projectImage);
    public function destroy($projectImage);
}
