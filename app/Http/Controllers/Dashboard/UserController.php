<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Gender;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Dashboard\UserUpdateRequest;
use App\Http\Requests\Dashboard\UserStoreRequest;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Interfaces\GenderRepositoryInterface;
use App\Models\Department;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private GenderRepositoryInterface $genderRepository;
    private CountryRepositoryInterface $countryRepository;
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(UserRepositoryInterface $userRepository,GenderRepositoryInterface $genderRepository,CountryRepositoryInterface $countryRepository,DepartmentRepositoryInterface $departmentRepository)
    {
        $this->userRepository = $userRepository;
        $this->genderRepository = $genderRepository;
        $this->countryRepository = $countryRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Users.index');
    }

    public function create()
    {
        return view('Dashboard.pages.Users.create',['genders'=>$this->genderRepository->index(),
        'countries'=>$this->countryRepository->index(false),
        'departments'=>$this->departmentRepository->index(false),
        'roles'=>['user','admin','employee']
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $this->userRepository->store($request);
        toast('user created successfully','success');
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('Dashboard.pages.Users.edit',compact('user'),['genders'=>$this->genderRepository->index(),
        'countries'=>$this->countryRepository->index(false),
        'departments'=>$this->departmentRepository->index(false),
        'roles'=>['user','admin','employee']]);
    }

    public function update(UserUpdateRequest $request,User $user)
    {
        $this->userRepository->update($request,$user);
        toast('user updated successfully','success');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);
        toast('user deleted successfully','success');
        return redirect()->back();
    }
}
