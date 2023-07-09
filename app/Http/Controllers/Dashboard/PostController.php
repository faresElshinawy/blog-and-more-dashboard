<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PostRepositoryInterface;
use App\Http\Requests\Dashboard\PostStoreRequest;
use App\Http\Requests\Dashboard\PostUpdateRequest;
use App\Interfaces\PostCategoryRepositoryInterface;
use App\Interfaces\PostTagRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    private PostCategoryRepositoryInterface $postCategoryRepository;
    private TagRepositoryInterface $tagRepository;
    private PostTagRepositoryInterface $postTagRepository;

    public function __construct(PostRepositoryInterface $postRepository,PostCategoryRepositoryInterface $postCategoryRepository,TagRepositoryInterface $tagRepository,PostTagRepositoryInterface $postTagRepository)
    {
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->tagRepository = $tagRepository;
        $this->postTagRepository = $postTagRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.Posts.index',['posts'=>$this->postRepository->index(true)]);
    }

    public function myPosts()
    {
        return view('Dashboard.Pages.Posts.myPosts',['posts'=>$this->postRepository->myPosts(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.Posts.create',['postCategories'=>$this->postCategoryRepository->index(false),'tags'=>$this->tagRepository->index(false)]);
    }

    public function store(PostStoreRequest $request)
    {
        $post = $this->postRepository->store($request);
        $this->postTagRepository->create($request,$post);
        toast('post added successfully','success');
        return redirect()->back();
    }

    public function edit(Post $post)
    {
        return view('Dashboard.pages.Posts.edit',['postCategories'=>$this->postCategoryRepository->index(false),'tags'=>$this->tagRepository->index(false),'post'=>$post]);
    }

    public function update(PostUpdateRequest $request,Post $post)
    {
        $this->postRepository->update($request,$post);
        toast('post updated successfully','success');
        if($request->tag)
        {
            $this->postTagRepository->addTag($request,$post);
            toast('tag added successfully','success');
        }
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->postTagRepository->destroy($post);
        $this->postRepository->destroy($post);
        toast('Post deleted successfully','success');
        return redirect()->back();
    }
}
