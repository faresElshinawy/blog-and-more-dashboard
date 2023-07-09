<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentStoreRequest;
use App\Http\Requests\Dashboard\DepartmentUpdateRequest;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Departments.index',['departments'=>$this->departmentRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Departments.create');
    }

    public function store(DepartmentStoreRequest $request)
    {
        $this->departmentRepository->store($request);
        toast('department added successfully','success');
        return redirect()->back();
    }

    public function edit(Department $department)
    {
        return view('Dashboard.pages.Departments.edit',compact('department'));
    }

    public function update(DepartmentUpdateRequest $request,Department $department)
    {
        $this->departmentRepository->update($request,$department);
        toast('department updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Department $department)
    {
        $this->departmentRepository->destroy($department);
        toast('department deleted successfully','success');
        return redirect()->back();
    }
}
