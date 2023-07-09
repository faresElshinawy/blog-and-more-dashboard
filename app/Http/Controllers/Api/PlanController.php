<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlanStoreRequest;
use App\Interfaces\PlanRepositoryInterface;
use App\Http\Requests\Api\PlanUpdateRequest;

class PlanController extends Controller
{
    use ApiResponse;

    private PlanRepositoryInterface $planRepository;

    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->planRepository->index(false));
    }

    public function store(PlanStoreRequest $request)
    {
        return $this->apiResponse('plan created successfully',$this->planRepository->store($request),null,201);
    }

    public function update(PlanUpdateRequest $request,Plan $plan)
    {
        return $this->apiResponse('plan updated successfully',$this->planRepository->update($request,$plan));
    }

    public function destroy(Plan $plan)
    {
        $this->planRepository->destroy($plan);
        return $this->apiResponse('success');
    }
}
