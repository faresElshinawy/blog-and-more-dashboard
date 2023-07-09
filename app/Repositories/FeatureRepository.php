<?php

namespace App\Repositories;

use App\Models\Feature;
use App\Interfaces\FeatureRepositoryInterface;

class FeatureRepository implements FeatureRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Feature::paginate(10);
        }
        return Feature::get();
    }

    public function store($request)
    {
        $Feature = Feature::create([
            'name'=>$request->name
        ]);
        return $Feature;
    }

    public function update($request,$feature)
    {
        $feature->update([
            'name'=>$request->name
        ]);
        return $feature;
    }

    public function destroy($feature)
    {
        $feature->delete();
    }
}
