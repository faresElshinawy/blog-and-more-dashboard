<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PostTagRepositoryInterface;

class PostTagController extends Controller
{
    private PostTagRepositoryInterface $postTagRepository;

    public function __construct(PostTagRepositoryInterface $postTagRepository)
    {
        $this->postTagRepository = $postTagRepository;
    }

    public function index(Post $post)
    {
        return view('Dashboard.pages.PostTags.index',['postTags'=>$this->postTagRepository->index($post),'post'=>$post]);
    }

    public function destroy(PostTag $postTag)
    {
        if($this->postTagRepository->destroy(null,$postTag))
        {
            toast('tag deleted successfully','success');
        }
        toast('request error','error');
        return redirect()->back();
    }
}
