<?php

namespace App\Interfaces;


interface TagRepositoryInterface
{

    public function index($paginate);
    public function store($request);
    public function update($request,$tag);
    public function destroy($tag);
}
