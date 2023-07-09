<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Traits\ApiResponse;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectImageStoreRequest;
use App\Interfaces\ProjectImageRepositoryInterface;
use App\Http\Requests\Api\ProjectImageUpdateRequest;

class ProjectImageController extends Controller
{
    use ApiResponse;

    private ProjectImageRepositoryInterface $projectImageRepository;

    public function __construct(ProjectImageRepositoryInterface $projectImageRepository)
    {
        $this->projectImageRepository = $projectImageRepository;
    }

    public function index(Project $project)
    {
        return $this->apiResponse('success',$this->projectImageRepository->index($project));
    }

    public function store(ProjectImageStoreRequest $request,Project $project)
    {
        return $this->apiResponse('project image created successfully',$this->projectImageRepository->store($request,$project),null,201);
    }

    public function update(ProjectImageUpdateRequest $request,ProjectImage $projectImage)
    {
        return $this->apiResponse('project image updated successfully',$this->projectImageRepository->update($request,$projectImage));
    }

    public function destroy(ProjectImage $projectImage)
    {
        return $this->apiResponse('project image deleted successfully',$this->projectImageRepository->destroy($projectImage));
    }
}
