<?php

namespace App\Http\Controllers\Api;

use App\Models\Feature;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FeatureStoreRequest;
use App\Interfaces\FeatureRepositoryInterface;
use App\Http\Requests\Api\FeatureUpdateRequest;

class FeatureController extends Controller
{
    use ApiResponse;

    private FeatureRepositoryInterface $featureRepository;

    public function __construct(FeatureRepositoryInterface $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->featureRepository->index(false));
    }

    public function store(FeatureStoreRequest $request)
    {
        return $this->apiResponse('feature created successfully',$this->featureRepository->store($request),null,201);
    }

    public function update(FeatureUpdateRequest $request,Feature $feature)
    {
        return $this->apiResponse('feature updated successfully',$this->featureRepository->update($request,$feature));
    }

    public function destroy(Feature $feature)
    {
        $this->featureRepository->destroy($feature);
        return $this->apiResponse('feature deleted successfully');
    }
}
