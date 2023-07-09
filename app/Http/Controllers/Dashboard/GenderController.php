<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\GenderRepositoryInterface;
use App\Http\Requests\Dashboard\GenderStoreRequest;
use App\Http\Requests\Dashboard\GenderUpdateRequest;
use RealRashid\SweetAlert\Toaster;

class GenderController extends Controller
{
    private GenderRepositoryInterface $genderRepository;

    public function __construct(GenderRepositoryInterface $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    public function index()
    {
        $genders = $this->genderRepository->index();
        return view('Dashboard.pages.Genders.index',compact('genders'));
    }

    public function create()
    {
        return view('Dashboard.pages.Genders.create');
    }

    public function store(GenderStoreRequest $request)
    {
        $this->genderRepository->store($request);
        toast('gender added successfully','success');
        return redirect()->back();
    }

    public function edit(Gender $gender)
    {
        return view('Dashboard.pages.Genders.edit',compact('gender'));
    }

    public function update(GenderUpdateRequest $request,Gender $gender)
    {
        $this->genderRepository->update($request,$gender);
        toast('gender updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Gender $gender)
    {
        $this->genderRepository->destroy($gender);
        toast('gender deleted successfully','success');
        return redirect()->back();
    }
}
