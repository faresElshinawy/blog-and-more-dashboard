<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\LoginStoreRequest;
use App\Interfaces\LoginRepositoryInterface;

class LoginController extends Controller
{

    private LoginRepositoryInterface $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->loginRepository = $loginRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Login.index');
    }

    public function store(LoginStoreRequest $request)
    {
        if($this->loginRepository->store($request))
        {
            toast('loged in successfully','success');
            return redirect()->route('dashboard.profile.show');
        }
        $this->loginRepository->logout();
        toast('wrong credentials','error');
        return redirect()->back();
    }

    public function logout()
    {
        $this->loginRepository->logout();
        return redirect()->route('dashboard.login');
    }
}
