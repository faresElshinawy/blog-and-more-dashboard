<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\LoginRepository;
use App\Http\Requests\Api\LoginStoreRequest;
use App\Interfaces\LoginRepositoryInterface;

class LoginController extends Controller
{

    use ApiResponse;

    private LoginRepositoryInterface $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(LoginStoreRequest $request)
    {
        if($this->loginRepository->store($request))
        {
            $token = auth()->user()->createToken(auth()->user()->name)->plainTextToken;
            return $this->apiResponse('logged in successfully',$token,null,201);
        }
        return $this->apiResponse('Invalid credentials',null,null,401);
    }

    public function logout(Request $request)
    {
        $this->loginRepository->apiLogout($request);
        return $this->apiResponse('user logged out successfully');
    }
}
