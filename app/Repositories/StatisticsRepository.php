<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\setting;
use App\Interfaces\StatisticsRepositoryInterface;

class StatisticsRepository implements StatisticsRepositoryInterface
{

    public function index($time_starts = null,$time_ends = null)
    {
        $clients = Client::query();
        $projects = Project::query()->with('category:id,name');
        $posts = Post::query()->with('user','category:id,name');
        $users = User::query()->with('gender:name,id','department:id,name','country:id,name');

        if($time_starts && $time_ends)
        {
            $clients->whereBetween('created_at',[$time_starts,$time_ends]);
            $projects->whereBetween('date',[$time_starts,$time_ends]);
            $posts->whereBetween('date',[$time_starts,$time_ends]);
            $users->whereBetween('created_at',[$time_starts,$time_ends]);
        }

        return ['clients'=>$clients->get(),'projects'=>$projects->get(),'users'=>$users->get(),'posts'=>$posts->get(),'statistics'=>['clientsCount'=>$clients->count(),'usersCount'=>$users->count(),'postsCount'=>$posts->count(),'projectsCount'=>$projects->count()]];
    }

}
