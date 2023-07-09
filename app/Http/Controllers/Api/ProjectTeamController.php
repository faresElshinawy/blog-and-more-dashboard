<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\ProjectTeam;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectTeamStoreRequest;
use App\Interfaces\ProjectTeamRepositoryInterface;

class ProjectTeamController extends Controller
{
    use ApiResponse;

    private ProjectTeamRepositoryInterface $projectTeamRepository;

    public function __construct(ProjectTeamRepositoryInterface $projectTeamRepository)
    {
        $this->projectTeamRepository = $projectTeamRepository;
    }

    public function index(Project $project)
    {
        return $this->apiResponse('success',$this->projectTeamRepository->index($project));
    }

    public function store(ProjectTeamStoreRequest $request,Project $project)
    {
        return $this->apiResponse('project member created successfully',$this->projectTeamRepository->store($request,$project),null,201);
    }

    public function destroy(ProjectTeam $projectTeam)
    {
        return $this->apiResponse('project member deleted successfully',$this->projectTeamRepository->destroy($projectTeam));
    }
}
