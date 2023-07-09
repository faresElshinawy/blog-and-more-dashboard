<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectStoreRequest;
use App\Interfaces\ProjectRepositoryInterface;
use App\Http\Requests\Api\ProjectUpdateRequest;

class ProjectController extends Controller
{
    use ApiResponse;

    private ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index($search = null)
    {
        return $this->apiResponse('success',$this->projectRepository->index($search));
    }

    public function myProjects()
    {
        return $this->apiResponse('success',$this->projectRepository->myProjects());
    }

    public function store(ProjectStoreRequest $request)
    {
        return $this->apiResponse('project created successfully',$this->projectRepository->store($request),null,201);
    }

    public function update(ProjectUpdateRequest $request,Project $project)
    {
        return $this->apiResponse('project updated successfully',$this->projectRepository->update($request,$project));
    }

    public function destroy(Project $project)
    {
        return $this->apiResponse('project deleted successfully',$this->projectRepository->destroy($project));
    }
}
