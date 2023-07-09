<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\SettingRepositoryInterface;
use App\Http\Requests\Dashboard\SettingStoreRequest;
use App\Http\Requests\Dashboard\SettingUpdateRequest;

class SettingController extends Controller
{
    private SettingRepositoryInterface $SettingRepository;

    public function __construct(SettingRepositoryInterface $SettingRepository)
    {
        $this->SettingRepository = $SettingRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Settings.index',['settings'=>$this->SettingRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Settings.create');
    }

    public function store(SettingStoreRequest $request)
    {
        $this->SettingRepository->store($request);
        toast('setting created successfully','success');
        return redirect()->back();
    }

    public function edit(Setting $setting)
    {
        return view('Dashboard.pages.Settings.edit',compact('setting'));
    }

    public function update(SettingUpdateRequest $request,Setting $setting)
    {
        $this->SettingRepository->update($request,$setting);
        toast('setting updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Setting $setting)
    {
        $this->SettingRepository->destroy($setting);
        toast('setting deleted successfully','success');
        return redirect()->back();
    }
}
