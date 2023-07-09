<?php

namespace App\Http\Controllers\Api;


use App\Models\Gender;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GenderStoreRequest;
use App\Http\Requests\Api\GenderUpdateRequest;
use App\Repositories\GenderRepository;
use App\Interfaces\GenderRepositoryInterface;

class GenderController extends Controller
{
    use ApiResponse;

    private GenderRepositoryInterface $genderRepository;

    public function __construct(GenderRepositoryInterface $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->genderRepository->index(false));
    }

    public function store(GenderStoreRequest $request)
    {
        return $this->apiResponse('gender created successfully',$this->genderRepository->store($request),null,201);
    }

    public function update(GenderUpdateRequest $request,Gender $gender)
    {
        return $this->apiResponse('gender updated successfully',$this->genderRepository->update($request,$gender));
    }

    public function destroy(Gender $gender)
    {
        $this->genderRepository->destroy($gender);
        return $this->apiResponse('gender deleted successfully');
    }
}
