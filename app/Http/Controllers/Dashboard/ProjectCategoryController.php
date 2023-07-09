<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Http\Requests\Dashboard\ProjectCategoryStoreRequest;
use App\Http\Requests\Dashboard\ProjectCategoryUpdateRequest;

class ProjectCategoryController extends Controller
{
    private ProjectCategoryRepositoryInterface $projectCategoryRepository;

    public function __construct(ProjectCategoryRepositoryInterface $projectCategoryRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.ProjectCategories.index',['projectCategories'=>$this->projectCategoryRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.ProjectCategories.create');
    }

    public function store(ProjectCategoryStoreRequest $request)
    {
        $this->projectCategoryRepository->store($request);
        toast('projectCategory created successfully','success');
        return redirect()->back();
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('Dashboard.pages.ProjectCategories.edit',compact('projectCategory'));
    }

    public function update(ProjectCategoryUpdateRequest $request,ProjectCategory $projectCategory)
    {
        $this->projectCategoryRepository->update($request,$projectCategory);
        toast('projectCategory updated successfully','success');
        return redirect()->back();
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $this->projectCategoryRepository->destroy($projectCategory);
        toast('projectCategory deleted successfully','success');
        return redirect()->back();
    }
}
