<?php

namespace App\Http\Controllers\Api;

use App\Mail\UserMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {
        Mail::to(auth()->user()->email)->send(new UserMail());
    }
}
