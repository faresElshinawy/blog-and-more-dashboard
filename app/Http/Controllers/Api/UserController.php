<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserStoreRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Api\UserUpdateRequest;

class UserController extends Controller
{
    use ApiResponse;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->userRepository->index(false));
    }

    public function store(UserStoreRequest $request)
    {
        return $this->apiResponse('user created successfully',$this->userRepository->store($request),null,201);
    }

    public function update(UserUpdateRequest $request,User $user)
    {
        return $this->apiResponse('user updated successfully',$this->userRepository->update($request,$user));
    }

    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);
        return $this->apiResponse('user deleted successfully');
    }
}
