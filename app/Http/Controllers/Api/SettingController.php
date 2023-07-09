<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SettingStoreRequest;
use App\Interfaces\SettingRepositoryInterface;
use App\Http\Requests\Api\SettingUpdateRequest;

class SettingController extends Controller
{
    use ApiResponse;

    private SettingRepositoryInterface $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->settingRepository->index(false));
    }

    public function store(SettingStoreRequest $request)
    {
        return $this->apiResponse('setting created successfully',$this->settingRepository->store($request),null,201);
    }

    public function update(SettingUpdateRequest $request,Setting $setting)
    {
        return $this->apiResponse('setting updated successfully',$this->settingRepository->update($request,$setting));
    }

    public function destroy(Setting $setting)
    {
        $this->settingRepository->destroy($setting);
        return $this->apiResponse('setting deleted successfully');
    }
}
