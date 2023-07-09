<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Http\Requests\Dashboard\ProjectStoreRequest;
use App\Http\Requests\Dashboard\ProjectUpdateRequest;
use App\Interfaces\ProjectCategoryRepositoryInterface;

class ProjectController extends Controller
{
    private ProjectRepositoryInterface $projectRepository;
    private ProjectCategoryRepositoryInterface $projectCategoryRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository,ProjectCategoryRepositoryInterface $projectCategoryRepository,UserRepositoryInterface $userRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->userRepository = $userRepository;
    }

    public function index($search = null)
    {
        return view('Dashboard.pages.Projects.index',['projects'=>$this->projectRepository->index($search)]);
    }

    public function myProjects()
    {
        return view('Dashboard.pages.Projects.myProjects',['user'=>$this->projectRepository->myProjects()]);
    }

    public function create()
    {
        return view('Dashboard.pages.Projects.create',['status'=>['pending','cancel','success'],'categories'=>$this->projectCategoryRepository->index(false)]);
    }

    public function store(ProjectStoreRequest $request)
    {
        $this->projectRepository->store($request);
        toast('project created successfully','success');
        return redirect()->back();
    }

    public function edit(project $project)
    {
        return view('Dashboard.pages.Projects.edit',compact('project'),['status'=>['pending','cancel','success'],'categories'=>$this->projectCategoryRepository->index(false),'users'=>$this->userRepository->usersOnlyNameAndId('employee')]);
    }

    public function update(ProjectUpdateRequest $request,Project $project)
    {
        $this->projectRepository->update($request,$project);
        toast('project updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Project $project)
    {
        if(!$this->projectRepository->destroy($project))
        {
            toast('request did not applyed','error');
        }
        toast('project deleted successfully','success');
        return redirect()->back();
    }
}
