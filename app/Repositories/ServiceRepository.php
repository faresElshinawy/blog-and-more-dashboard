<?php

namespace App\Repositories;

use App\Models\service;
use App\Interfaces\ServiceRepositoryInterface;
use App\Traits\ImageUpload;

class ServiceRepository implements ServiceRepositoryInterface
{

    use ImageUpload;

    public function index($paginate = false)
    {
        if($paginate)
        {
            return service::paginate(10);
        }
        return Service::get();
    }

    public function store($request)
    {
        $service = Service::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$this->imageUpload($request,Service::$uploadPath)
        ]);
        return $service;
    }

    public function update($request,$service)
    {
        $service->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$this->imageUpload($request,Service::$uploadPath,$service->image)
        ]);
        return $service;
    }

    public function destroy($service)
    {
        $this->remove(Service::$uploadPath,$service->image);
        $service->delete();
    }
}
