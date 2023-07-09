<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ServiceRepositoryInterface;
use App\Http\Requests\Dashboard\ServiceStoreRequest;
use App\Http\Requests\Dashboard\ServiceUpdateRequest;

class ServiceController extends Controller
{
    private ServiceRepositoryInterface $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Services.index',['services'=>$this->serviceRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Services.create');
    }

    public function store(ServiceStoreRequest $request)
    {
        $this->serviceRepository->store($request);
        toast('service created successfully','success');
        return redirect()->back();
    }

    public function edit(Service $service)
    {
        return view('Dashboard.pages.Services.edit',compact('service'));
    }

    public function update(ServiceUpdateRequest $request,Service $service)
    {
        $this->serviceRepository->update($request,$service);
        toast('service updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Service $service)
    {
        $this->serviceRepository->destroy($service);
        toast('service deleted successfully','success');
        return redirect()->back();
    }
}
