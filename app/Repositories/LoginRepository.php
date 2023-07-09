<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\LoginRepositoryInterface;

class LoginRepository implements LoginRepositoryInterface
{

    public function store($request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return auth()->user();
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->regenerate();
    }

    public function apiLogout($request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
