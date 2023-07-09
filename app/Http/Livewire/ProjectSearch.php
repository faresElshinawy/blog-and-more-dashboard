<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;

class ProjectSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];


    public function render()
    {
        $projects = Project::query();
        if($this->search)
        {
            $search = trim($this->search);
            $projects->where('title','like',"%{$this->search}%")
            ->orWhere('description','like',"%{$this->search}%")
            ->orWhere("client_name",'like',"%{$this->search}%");
        }
        return view('livewire.project-search',['projects'=>$projects->with('category')->paginate(10)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
