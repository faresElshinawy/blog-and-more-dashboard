<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $querString = ['search'];

    public function render()
    {
        $users = User::query();
        if($this->search)
        {
            $this->search = trim($this->search);
            $users->where('name','like',"%{$this->search}%");
        }
        return view('livewire.user-search',['users'=>$users->with('department','gender','country')->paginate(10)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }

}
