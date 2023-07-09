<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function index($search);
    public function myProjects();
    public function store($request);
    public function update($request,$porject);
    public function destroy($project);
}
