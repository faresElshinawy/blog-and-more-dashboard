<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProjectCategoryStoreRequest;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Http\Requests\Api\ProjectCategoryUpdateRequest;

class ProjectCategoryController extends Controller
{
    use ApiResponse;

    private ProjectCategoryRepositoryInterface $ProjectCategoryRepository;

    public function __construct(ProjectCategoryRepositoryInterface $ProjectCategoryRepository)
    {
        $this->ProjectCategoryRepository = $ProjectCategoryRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->ProjectCategoryRepository->index(false));
    }

    public function store(ProjectCategoryStoreRequest $request)
    {
        return $this->apiResponse('projectCategory created successfully',$this->ProjectCategoryRepository->store($request),null,201);
    }

    public function update(ProjectCategoryUpdateRequest $request,ProjectCategory $projectCategory)
    {
        return $this->apiResponse('projectCategory updated successfully',$this->ProjectCategoryRepository->update($request,$projectCategory));
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $this->ProjectCategoryRepository->destroy($projectCategory);
        return $this->apiResponse('projectCategory deleted successfully');
    }
}
