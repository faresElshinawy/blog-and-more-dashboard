<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLoged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && (Auth::user()->role == 'admin' or Auth::user()->role == 'employee'))
        {
            return $next($request);
        }
        toast('Access Denied Only Admins or Employees Are Allowed','error');
        return redirect()->route('dashboard.login');
    }
}
