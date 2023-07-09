<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectTeamRepositoryInterface;
use App\Http\Requests\Dashboard\ProjectTeamStoreRequest;
use App\Interfaces\UserRepositoryInterface;

class ProjectTeamController extends Controller
{
    private ProjectTeamRepositoryInterface $projectTeamRepository;

    public function __construct(ProjectTeamRepositoryInterface $projectTeamRepository)
    {
        $this->projectTeamRepository = $projectTeamRepository;
    }

    public function index(Project $project)
    {
        return view('Dashboard.pages.ProjectTeam.index',['projectTeam'=>$this->projectTeamRepository->index($project),'project'=>$project]);
    }

    public function store(ProjectTeamStoreRequest $request,Project $project)
    {
        $this->projectTeamRepository->store($request,$project);
        toast('project team added successfully','success');
        return redirect()->back();
    }

    public function destroy(ProjectTeam $projectTeam)
    {
        if(!$this->projectTeamRepository->destroy($projectTeam))
        {
            toast('request error','error');
        }
        toast('project team deleted successfully','success');
        return redirect()->back();
    }
}
