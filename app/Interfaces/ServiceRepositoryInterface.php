<?php

namespace App\Interfaces;


interface ServiceRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$service);
    public function destroy($service);
}
