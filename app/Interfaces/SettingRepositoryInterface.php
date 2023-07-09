<?php

namespace App\Interfaces;


interface SettingRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$setting);
    public function destroy($setting);
}
