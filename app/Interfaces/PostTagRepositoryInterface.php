<?php

namespace App\Interfaces;

interface PostTagRepositoryInterface
{
    public function index($post);
    public function create($request,$post);
    public function addTag($request,$post);
    public function destroy($post);
}
