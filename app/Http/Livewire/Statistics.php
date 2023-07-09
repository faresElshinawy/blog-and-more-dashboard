<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Statistics extends Component
{

    use WithPagination;

    public $time_starts;
    public $time_ends;

    public function render()
    {
        $clients = Client::query();
        $projects = Project::query()->with('category:id,name');
        $posts = Post::query()->with('user','category:id,name');
        $users = User::query()->with('gender:name,id','department:id,name','country:id,name');

        if($this->time_starts && $this->time_ends)
        {
            $clients->whereBetween('created_at',[$this->time_starts,$this->time_ends]);
            $projects->whereBetween('date',[$this->time_starts,$this->time_ends]);
            $posts->whereBetween('date',[$this->time_starts,$this->time_ends]);
            $users->whereBetween('created_at',[$this->time_starts,$this->time_ends]);
        }

        return view('livewire.statistics',['clients'=>$clients->paginate(6),'projects'=>$projects->paginate(6),'users'=>$users->paginate(6),'posts'=>$posts->paginate(1),'clientsCount'=>$clients->count(),'usersCount'=>$users->count(),'postsCount'=>$posts->count(),'projectsCount'=>$projects->count()]);
    }
}
