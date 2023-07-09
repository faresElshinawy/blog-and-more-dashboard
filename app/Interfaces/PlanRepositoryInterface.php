<?php

namespace App\Interfaces;

interface PlanRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$plan);
    public function destroy($plan);
}
