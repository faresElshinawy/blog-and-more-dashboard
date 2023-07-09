<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PostCategoryRepositoryInterface;
use App\Http\Requests\Dashboard\PostCategoryStoreRequest;
use App\Http\Requests\Dashboard\PostCategoryUpdateRequest;

class PostCategoryController extends Controller
{
    private PostCategoryRepositoryInterface $postCategoryRepository;

    public function __construct(PostCategoryRepositoryInterface $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        return view('Dashboard.pages.PostCategories.index',['postCategories'=>$this->postCategoryRepository->index(true)]);
    }

    public function create()
    {
        return view('Dashboard.pages.PostCategories.create');
    }

    public function store(PostCategoryStoreRequest $request)
    {
        $this->postCategoryRepository->store($request);
        toast('PostCategory added successfully','success');
        return redirect()->back();
    }

    public function edit(PostCategory $postCategory)
    {
        return view('Dashboard.pages.PostCategories.edit',compact('postCategory'));
    }

    public function update(PostCategoryUpdateRequest $request,PostCategory $postCategory)
    {
        $this->postCategoryRepository->update($request,$postCategory);
        toast('PostCategory updated successfully','success');
        return redirect()->back();
    }

    public function destroy(PostCategory $postCategory)
    {
        $this->postCategoryRepository->destroy($postCategory);
        toast('PostCategory deleted successfully','success');
        return redirect()->back();
    }
}
