<?php

namespace App\Interfaces;

interface GenderRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request,$gender);
    public function destroy($gender);
}
