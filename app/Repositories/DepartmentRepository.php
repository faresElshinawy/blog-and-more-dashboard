<?php

namespace App\Repositories;

use App\Models\Department;
use App\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Department::paginate(10);
        }
        return Department::get();
    }

    public function store($request)
    {
        $Department = Department::create([
            'name'=>$request->name
        ]);
        return $Department;
    }

    public function update($request,$Department)
    {
        $Department->update([
            'name'=>$request->name
        ]);
        return $Department;
    }

    public function destroy($Department)
    {
        $Department->delete();
    }
}
