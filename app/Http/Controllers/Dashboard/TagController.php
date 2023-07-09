<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\TagRepositoryInterface;
use App\Http\Requests\Dashboard\TagStoreRequest;
use App\Http\Requests\Dashboard\TagUpdateRequest;

class TagController extends Controller
{
    private TagRepositoryInterface $TagRepository;

    public function __construct(TagRepositoryInterface $TagRepository)
    {
        $this->TagRepository = $TagRepository;
    }

    public function index()
    {
        $tags = $this->TagRepository->index(true);
        return view('Dashboard.pages.Tags.index',compact('tags'));
    }

    public function create()
    {
        return view('Dashboard.pages.Tags.create');
    }

    public function store(TagStoreRequest $request)
    {
        $this->TagRepository->store($request);
        toast('Tag added successfully','success');
        return redirect()->back();
    }

    public function edit(Tag $tag)
    {
        return view('Dashboard.pages.Tags.edit',compact('tag'));
    }

    public function update(TagUpdateRequest $request,Tag $tag)
    {
        $this->TagRepository->update($request,$tag);
        toast('Tag updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Tag $tag)
    {
        $this->TagRepository->destroy($tag);
        toast('Tag deleted successfully','success');
        return redirect()->back();
    }
}
