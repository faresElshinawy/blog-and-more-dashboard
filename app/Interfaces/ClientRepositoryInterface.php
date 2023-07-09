<?php

namespace App\Interfaces;


interface ClientRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$client);
    public function destroy($client);
}
