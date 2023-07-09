<?php

namespace App\Interfaces;


interface FeatureRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$feature);
    public function destroy($feature);
}
