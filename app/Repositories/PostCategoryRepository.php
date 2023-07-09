<?php

namespace App\Repositories;

use App\Models\PostCategory;
use App\Interfaces\PostCategoryRepositoryInterface;

class PostCategoryRepository implements PostCategoryRepositoryInterface {

    public function index($paginate = false)
    {
        if($paginate)
        {
            return PostCategory::paginate(10);
        }
        return PostCategory::get();
    }

    public function store($request)
    {
        $postCategory = PostCategory::create([
            'name'=>$request->name
        ]);
        return $postCategory;
    }

    public function update($request,$postCategory)
    {
        $postCategory->update([
            'name'=>$request->name
        ]);
        return $postCategory;
    }

    public function destroy($postCategory)
    {
        $postCategory->delete();
    }
}
