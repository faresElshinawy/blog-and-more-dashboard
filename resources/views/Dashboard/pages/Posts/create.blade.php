@extends('Dashboard.inc.master')

@section('title', 'posts')
@section('pageName', 'posts')
@section('pageAction', 'edit')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add post</h5>
                </div>
                <div class="card-body">
                    <form method='POST' action="{{ route('dashboard.post.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value='{{ old('title') }}'>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
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
                                        <option value="{{ $category->id }}" @selected(old('category_id'))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">tags</label>
                                <select name="tags[]"  multiple="" class="custom-select form-control">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                            <div class="form-group fallback w-100">
                                <input type="file" class="p1 my-2" name='image'>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.post.all') }}" class="btn btn-light">Cencel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
