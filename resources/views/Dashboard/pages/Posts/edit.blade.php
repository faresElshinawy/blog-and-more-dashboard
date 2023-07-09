@extends('Dashboard.inc.master')

@section('title', 'posts')
@section('pageName', 'posts')
@section('pageAction', 'edit')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="container-fluid bg-white d-flex justify-content-between">
                        <div>
                            <label class="form-label text-muted d-inline-block mr-2">Tags :</label>
                            @foreach ($post->tags as $tag)
                                <span class="text-center text-success">{{ $tag->name }}</span>
                                <span class="mx-2">|</span>
                            @endforeach
                        </div>
                        <a href="{{ route('dashboard.post.postTag.all', ['post' => $post->id]) }}"
                            class="btn btn-warning btn-sm my-0">Tags Action</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit post</h5>
                </div>
                <div class="card-body">
                    <form method='POST' action="{{ route('dashboard.post.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value='{{ old('title') ?? $post->title }}'>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control border-0 bg-white" name="description">{{ old('description') ?? $post->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">category</label>
                                    <select name="category_id" class="form-control">
                                        <option selected disabled>post category</option>
                                        @foreach ($postCategories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id') ?? $post->category_id == $category->id)
                                                    {{'selected'}}
                                                @endif>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Add Tag</label>
                                    <input type="text" class="form-control" name="tag">
                                    @error('tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-5 d-flex justify-content-center">
                                @if (File::exists('Uploads/Posts/' . $post->image))
                                    <img src="{{ asset('Uploads/Posts/' . $post->image) }}" class="img-fluid rounded"
                                        width="200" height="200" alt="">
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <div class="form-group fallback w-100">
                                    <input type="file" class="p1 my-2" name='image'>
                                </div>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dashboard.post.all') }}" class="btn btn-light">Cencel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
