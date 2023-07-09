<?php

namespace App\Repositories;

use App\Models\ProjectCategory;
use App\Interfaces\ProjectCategoryRepositoryInterface;

class ProjectCategoryRepository implements ProjectCategoryRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return ProjectCategory::paginate(10);
        }
        return ProjectCategory::get();
    }

    public function store($request)
    {
        $projectCategory = ProjectCategory::create([
            'name'=>$request->name
        ]);
        return $projectCategory;
    }

    public function update($request,$projectCategory)
    {
        $projectCategory->update([
            'name'=>$request->name
        ]);
        return $projectCategory;
    }

    public function destroy($projectCategory)
    {
        $projectCategory->delete();
    }
}
