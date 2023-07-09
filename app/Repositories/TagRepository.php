<?php

namespace App\Repositories;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function index($paginate = false)
    {
        if($paginate)
        {
            return Tag::withCount('posts')->paginate(10);
        }
        return Tag::withCount('posts')->get();
    }

    public function store($request)
    {
        $tag = Tag::create([
            'name'=>$request->name
        ]);
        return $tag;
    }

    public function update($request,$tag)
    {
        $tag->update([
            'name'=>$request->name
        ]);
        return $tag;
    }

    public function destroy($tag)
    {
        $tag->delete();
    }
}
