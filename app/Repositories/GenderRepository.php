<?php

namespace App\Repositories;
use App\Models\Gender;
use App\Interfaces\GenderRepositoryInterface;

class GenderRepository implements GenderRepositoryInterface
{
    public function index()
    {
        return Gender::get();
    }

    public function store($request)
    {
        $gender = Gender::create([
            'name'=>$request->name
        ]);
        return $gender;
    }

    public function update($request,$gender)
    {
        $gender->update([
            'name'=>$request->name
        ]);
        return $gender;
    }

    public function destroy($gender)
    {
        $gender->delete();
    }
}
