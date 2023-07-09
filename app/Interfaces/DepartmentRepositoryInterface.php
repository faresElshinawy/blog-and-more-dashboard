<?php

namespace App\Interfaces;

interface DepartmentRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$department);
    public function destroy($department);
}
