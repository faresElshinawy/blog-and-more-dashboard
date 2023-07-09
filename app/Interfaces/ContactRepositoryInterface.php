<?php

namespace App\Interfaces;


interface ContactRepositoryInterface
{
    public function index($paginate);
    public function store($request);
    public function update($request,$contact);
    public function destroy($contact);
}
