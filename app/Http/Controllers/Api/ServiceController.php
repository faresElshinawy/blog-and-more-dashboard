<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ServiceStoreRequest;
use App\Interfaces\ServiceRepositoryInterface;
use App\Http\Requests\Api\ServiceUpdateRequest;

class ServiceController extends Controller
{
    use ApiResponse;

    private ServiceRepositoryInterface $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->serviceRepository->index(false));
    }

    public function store(ServiceStoreRequest $request)
    {
        return $this->apiResponse('service created successfully',$this->serviceRepository->store($request),null,201);
    }

    public function update(ServiceUpdateRequest $request,Service $service)
    {
        return $this->apiResponse('service updated successfully',$this->serviceRepository->update($request,$service));
    }

    public function destroy(Service $service)
    {
        $this->serviceRepository->destroy($service);
        return $this->apiResponse('service deleted successfully');
    }
}
