<?php

namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function index($paginate);
    public function usersOnlyNameAndId($role);
    public function profile();
    public function store($request);
    public function update($request,$user);
    public function destroy($user);
}
