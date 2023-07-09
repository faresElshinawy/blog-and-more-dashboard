<?php

namespace App\Interfaces;

interface CountryRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$country);
    public function destroy($country);
}
