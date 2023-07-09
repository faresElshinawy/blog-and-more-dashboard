<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectImageStoreRequest;
use App\Interfaces\ProjectImageRepositoryInterface;

class ProjectImageController extends Controller
{
    private ProjectImageRepositoryInterface $projectImageRepository;

    public function __construct(ProjectImageRepositoryInterface $projectImageRepository)
    {
        $this->projectImageRepository = $projectImageRepository;
    }

    public function index(Project $project)
    {
        return view('Dashboard.pages.ProjectImages.index',['projectImages'=>$this->projectImageRepository->index($project),'project'=>$project]);
    }

    public function store(ProjectImageStoreRequest $request,Project $project)
    {
        $this->projectImageRepository->store($request,$project);
        toast('project image added successfully','success');
        return redirect()->back();
    }

    public function destroy(ProjectImage $projectImage)
    {
        if(!$this->projectImageRepository->destroy($projectImage))
        {
            toast('request error','error');
        }
        toast('project image deleted successfully','success');
        return redirect()->back();
    }
}
