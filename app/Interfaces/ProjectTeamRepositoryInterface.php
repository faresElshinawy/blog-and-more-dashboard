<?php

namespace App\Interfaces;


interface ProjectTeamRepositoryInterface
{

    public function index($project);
    public function store($request,$project);
    public function destroy($projectTeam);
}
