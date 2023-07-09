<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Traits\ImageUpload;
use App\Interfaces\PlanRepositoryInterface;

class PlanRepository implements PlanRepositoryInterface
{
    use ImageUpload;

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Plan::paginate(10);
        }
        return Plan::get();
    }

    public function store($request)
    {
        $plan = Plan::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$this->imageUpload($request,Plan::$uploadPath)
        ]);
        return $plan;
    }

    public function update($request,$plan)
    {
        $plan->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$this->imageUpload($request,Plan::$uploadPath) ?? $plan->image
        ]);
        return $plan;
    }

    public function destroy($plan)
    {
        $this->remove($plan->image);
        $plan->delete();
    }
}
