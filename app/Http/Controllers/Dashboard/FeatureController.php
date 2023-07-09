<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feature;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\FeatureRepositoryInterface;
use App\Http\Requests\Dashboard\FeatureStoreRequest;
use App\Http\Requests\Dashboard\FeatureUpdateRequest;

class FeatureController extends Controller
{
    private FeatureRepositoryInterface $featureRepository;

    public function __construct(FeatureRepositoryInterface $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Features.index',['features'=>$this->featureRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Features.create');
    }

    public function store(FeatureStoreRequest $request)
    {
        $this->featureRepository->store($request);
        toast('feature created successfully','success');
        return redirect()->back();
    }

    public function edit(Feature $feature)
    {
        return view('Dashboard.pages.Features.edit',compact('feature'));
    }

    public function update(FeatureUpdateRequest $request,Feature $feature)
    {
        $this->featureRepository->update($request,$feature);
        toast('feature updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Feature $feature)
    {
        $this->featureRepository->destroy($feature);
        toast('feature deleted successfully','success');
        return redirect()->back();
    }
}
