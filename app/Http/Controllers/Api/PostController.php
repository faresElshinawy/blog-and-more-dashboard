<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostStoreRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Http\Requests\Api\PostUpdateRequest;

class PostController extends Controller
{
    use ApiResponse;

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->postRepository->index(false));
    }

    public function myPosts()
    {
        return $this->apiResponse('success',$this->postRepository->myPosts(false));
    }

    public function store(PostStoreRequest $request)
    {
        return $this->apiResponse('post created successfully',$this->postRepository->store($request),null,201);
    }

    public function update(PostUpdateRequest $request,Post $post)
    {
        return $this->apiResponse('post updated successfully',$this->postRepository->update($request,$post));
    }

    public function destroy(Post $post)
    {
        $this->postRepository->destroy($post);
        return $this->apiResponse('post deleted successfully');
    }
}
