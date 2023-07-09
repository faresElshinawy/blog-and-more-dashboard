<?php

namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Interfaces\PostRepositoryInterface;
use App\Traits\ImageUpload;

class PostRepository implements PostRepositoryInterface
{

    use ImageUpload;

    public function index($paginate = false)
    {
        if($paginate)
        {
            return Post::with('category:id,name','tags:id,name','comments','user:id,name')->paginate(10);
        }
        return Post::with('category:id,name','tags:id,name','comments','user:id,name')->get();
    }

    public function myPosts($paginate = false)
    {
        if($paginate)
        {
            return Post::with('category:id,name','tags:name')->where('user_id',auth()->user()->id)->paginate(10);
        }
        return Post::with('category:id,name','tags:name')->where('user_id',auth()->user()->id)->get();
    }

    public function store($request)
    {
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'date'=>date('Y-m-d'),
            'image'=>$this->imageUpload($request,Post::$uploadPath)
        ]);
        return $post;
    }

    public function update($request,$post)
    {
        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'date'=>date('Y-m-d'),
            'image'=>$this->imageUpload($request,Post::$uploadPath,$post->image)
        ]);
        return $post;
    }

    public function destroy($post)
    {
        $this->remove($post->image);
        $post->delete();
    }
}
