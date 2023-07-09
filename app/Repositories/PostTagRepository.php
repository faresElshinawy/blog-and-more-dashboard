<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Models\PostTag;
use App\Interfaces\PostTagRepositoryInterface;


class PostTagRepository implements PostTagRepositoryInterface
{

    public function index($post)
    {
        return PostTag::with('tag')->where('post_id',$post->id)->get();
    }

    public function create($request,$post)
    {
        $postTag = $request->tag;
        if($request->tags)
        {
            foreach($request->tags as $tag)
            {
                $postTag = PostTag::create([
                    'tag_id'=>$tag,
                    'post_id'=>$post->id
                ]);
            }
        }
        return $postTag;
    }

    public function addTag($request,$post)
    {
        if($request->tag)
        {
            $tag = Tag::where('name',$request->tag)->first();
            if(!$tag)
            {
                $tag = Tag::create([
                    'name'=>$request->tag
                ]);
            }
            $postTag = PostTag::create([
                'tag_id'=>$tag->id,
                'post_id'=>$post->id
            ]);
            return $postTag;
        }
    }

    public function destroy($post,$postTag = null)
    {
        if(!$postTag)
        {
            return PostTag::where('post_id',$post->id)->delete();
        }
        return $postTag->delete();

    }
}
