<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\PostTag;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostTagStoreRequest;
use App\Interfaces\PostTagRepositoryInterface;

class PostTagController extends Controller
{

    use ApiResponse;

    private PostTagRepositoryInterface $postTagRepository;

    public function __construct(PostTagRepositoryInterface $postTagRepository)
    {
        $this->postTagRepository = $postTagRepository;
    }


    public function index(Post $post)
    {
        return $this->apiResponse('success',$this->postTagRepository->index($post));
    }

    public function store(PostTagStoreRequest $request,Post $post)
    {
        return $this->apiResponse('tag added successfully',$this->postTagRepository->addTag($request,$post),null,201);
    }

    public function storeTags(PostTagStoreRequest $request,Post $post)
    {
        return $this->apiResponse('tag added successfully',$this->postTagRepository->create($request,$post),null,201);
    }

    public function destroy(PostTag $postTag)
    {
        $this->postTagRepository->destroy(null,$postTag);
        return $this->apiResponse('deleted successfully');
    }
}
