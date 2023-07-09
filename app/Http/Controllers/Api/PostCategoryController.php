<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostCategoryStoreRequest;
use App\Interfaces\PostCategoryRepositoryInterface;
use App\Http\Requests\Api\PostCategoryUpdateRequest;

class PostCategoryController extends Controller
{
    use ApiResponse;

    private PostCategoryRepositoryInterface $postCategoryRepository;

    public function __construct(PostCategoryRepositoryInterface $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->postCategoryRepository->index(false));
    }

    public function store(PostCategoryStoreRequest $request)
    {
        return $this->apiResponse('PostCategory added successfully',$this->postCategoryRepository->store($request),null,201);
    }

    public function update(PostCategoryUpdateRequest $request,PostCategory $postCategory)
    {
        return $this->apiResponse('PostCategory updated successfully',$this->postCategoryRepository->update($request,$postCategory));
    }

    public function destroy(PostCategory $postCategory)
    {
        $this->postCategoryRepository->destroy($postCategory);
        return $this->apiResponse('PostCategory deleted successfully');
    }
}
