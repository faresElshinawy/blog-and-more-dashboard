<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileUpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\GenderRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class ProfileController extends Controller
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
        return view('Dashboard.pages.Profile.index',
            ['user'=>$this->userRepository->profile(),
            'genders'=>$this->genderRepository->index(),
            'countries'=>$this->countryRepository->index(false),
            'departments'=>$this->departmentRepository->index(false),
            'roles'=>['user','admin','employee']
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        if(!$this->userRepository->update($request,auth()->user()))
        {
            toast('request is not done','error');
        }
        toast('profile updated successfully','success');
        return redirect()->back();
    }
}
