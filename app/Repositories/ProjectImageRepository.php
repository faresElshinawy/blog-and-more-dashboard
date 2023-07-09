<?php

namespace App\Repositories;

use App\Models\ProjectImage;
use App\Interfaces\ProjectImageRepositoryInterface;
use App\Traits\ImageUpload;

class ProjectImageRepository implements ProjectImageRepositoryInterface
{

    use ImageUpload;

    public function index($project)
    {
        return ProjectImage::where('project_id',$project->id)->get();
    }

    public function store($request,$project)
    {
        $projectImage = ProjectImage::create([
            'project_id'=>$project->id,
            'image'=>$this->imageUpload($request,ProjectImage::$uploadPath)
        ]);
        return $projectImage;
    }

    public function update($request,$projectImage)
    {
        $projectImage->update([
            'image'=>$this->imageUpload($request,ProjectImage::$uploadPath,$projectImage->image)
        ]);
        return $projectImage;
    }

    public function destroy($projectImage)
    {
        $projectImage->delete();
    }
}
