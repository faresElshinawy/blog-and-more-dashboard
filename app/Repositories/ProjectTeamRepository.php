<?php

namespace App\Repositories;

use App\Models\projectTeam;
use App\Interfaces\ProjectTeamRepositoryInterface;

class ProjectTeamRepository implements ProjectTeamRepositoryInterface
{


    public function index($project)
    {
        return ProjectTeam::where('project_id',$project->id)->with('user')->get();
    }

    public function store($request,$project)
    {
        $projectTeam = ProjectTeam::create([
            'project_id'=>$project->id,
            'user_id'=>$request->user_id
        ]);
        return $projectTeam;
    }

    public function destroy($projectTeam)
    {
        return $projectTeam->delete();
    }
}
