<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Project;
use App\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function index($search = null)
    {
        $projects = Project::query();
        if($search)
        {
            $search = trim($search);
            $projects->where('title','like',"%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere("client_name",'like',"%{$search}%");
        }
        return $projects->with('category')->get();
    }

    public function myProjects()
    {
        return User::select('id','name')->where('id',auth()->user()->id)->with('projects.category')->first();
    }

    public function store($request)
    {
        $project = Project::create([
            'category_id'=>$request->category_id,
            'client_name'=>$request->client_name,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'status'=>$request->status,
            'price'=>$request->price,
            'starts_at'=>$request->starts_at,
            'ends_at'=>$request->ends_at
        ]);
        return $project;
    }

    public function update($request,$project)
    {
        $project->update([
            'category_id'=>$request->category_id,
            'client_name'=>$request->client_name,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'status'=>$request->status,
            'price'=>$request->price,
            'starts_at'=>$request->starts_at,
            'ends_at'=>$request->ends_at
        ]);
        return $project;
    }

    public function destroy($project)
    {
        return $project->delete();
    }
}
