<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Api\ProfileUpdateRequest;

class ProfileController extends Controller
{

    use ApiResponse;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth:sanctum');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->userRepository->profile());
    }

    public function update(ProfileUpdateRequest $request)
    {
        return $this->apiResponse('profile updated successfully',$this->userRepository->update($request,auth('sanctum')->user()));
    }
}
