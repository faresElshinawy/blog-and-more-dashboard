<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TagStoreRequest;
use App\Interfaces\TagRepositoryInterface;
use App\Http\Requests\Api\TagUpdateRequest;

class TagController extends Controller
{
    use ApiResponse;

    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        return $this->apiResponse('success',$this->tagRepository->index(false));
    }

    public function store(TagStoreRequest $request)
    {
        return $this->apiResponse('tag created successfully',$this->tagRepository->store($request),null,201);
    }

    public function update(TagUpdateRequest $request,Tag $tag)
    {
        return $this->apiResponse('tag updated successfully',$this->tagRepository->update($request,$tag));
    }

    public function destroy(Tag $tag)
    {
        $this->tagRepository->destroy($tag);
        return $this->apiResponse('tag deleted successfully');
    }
}
