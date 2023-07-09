<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DepartmentStoreRequest;
use App\Http\Requests\Api\DepartmentUpdateRequest;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    use ApiResponse;

    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->departmentRepository->index(false));
    }

    public function store(DepartmentStoreRequest $request)
    {
        return $this->apiResponse('department added successfully',$this->departmentRepository->store($request),null,201);
    }

    public function update(DepartmentUpdateRequest $request,Department $department)
    {
        return $this->apiResponse('department updated successfully',$this->departmentRepository->update($request,$department));
    }

    public function destroy(Department $department)
    {
        $this->departmentRepository->destroy($department);
        return $this->apiResponse('department deleted successfully');
    }
}
