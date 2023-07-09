<?php

namespace App\Repositories;

use App\Models\setting;
use App\Interfaces\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Setting::paginate(10);
        }
        return Setting::get();
    }

    public function store($request)
    {
        $setting = Setting::create([
            'name'=>$request->name,
            'value'=>$request->value,
        ]);
        return $setting;
    }

    public function update($request,$setting)
    {
        $setting->update([
            'name'=>$request->name,
            'value'=>$request->value,
        ]);
        return $setting;
    }

    public function destroy($setting)
    {
        $setting->delete();
    }
}
