<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Plan;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PlanRepositoryInterface;
use App\Http\Requests\Dashboard\PlanStoreRequest;
use App\Http\Requests\Dashboard\PlanUpdateRequest;

class PlanController extends Controller
{
    use ImageUpload;

    private PlanRepositoryInterface $planRepository;

    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Plans.index',['plans'=>$this->planRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Plans.create');
    }

    public function store(PlanStoreRequest $request)
    {
        $this->planRepository->store($request);
        toast('plan created successfully','success');
        return redirect()->back();
    }

    public function edit(Plan $plan)
    {
        return view('Dashboard.pages.Plans.edit',compact('plan'));
    }

    public function update(PlanUpdateRequest $request,Plan $plan)
    {
        $this->planRepository->update($request,$plan);
        toast('plan updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Plan $plan)
    {
        $this->planRepository->destroy($plan);
        toast('plan deleted successfully','success');
        return redirect()->back();
    }
}
