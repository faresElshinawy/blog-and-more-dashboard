<?php

namespace App\Repositories;

use App\Models\Country;
use App\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Country::paginate(10);
        }
        return Country::get();
    }

    public function store($request)
    {
        $country = Country::create([
            'name'=>$request->name
        ]);
        return $country;
    }

    public function update($request,$country)
    {
        $country->update([
            'name'=>$request->name
        ]);
        return $country;
    }

    public function destroy($country)
    {
        $country->delete();
    }
}
