<?php

namespace App\Interfaces;


interface PostRepositoryInterface
{

    public function index($paginate);
    public function myPosts($paginate);
    public function store($request);
    public function update($request,$post);
    public function destroy($post);
}
