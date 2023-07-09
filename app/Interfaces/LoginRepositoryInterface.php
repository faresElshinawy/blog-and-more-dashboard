<?php

namespace App\Interfaces;

interface LoginRepositoryInterface
{
    public function store($request);
    public function apiLogout($request);
    public function logout();
}
