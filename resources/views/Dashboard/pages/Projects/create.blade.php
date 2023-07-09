@extends('Dashboard.inc.master')

@section('title', 'projects')
@section('pageName', 'projects')
@section('pageAction', 'create')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Project Info</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.project.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value='{{ old('title') }}'>
                                </div>
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="client_name"
                                        value='{{ old('client_name') }}'>
                                </div>
                                @error('client_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                    <input name="date" type="date" class="form-control" value='{{ old('date') }}'>
                                </div>
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input name="price" type="number" class="form-control" value='{{ old('price') }}'>
                                </div>
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Starts At</label>
                                    <input name="starts_at" type="date" class="form-control"
                                        value='{{ old('starts_at') }}'>
                                </div>
                                @error('starts_at')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Ends At</label>
                                    <input name="ends_at" type="date" class="form-control" value='{{ old('ends_at') }}'>
                                </div>
                                @error('ends_at')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option selected disabled>select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id'))>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option selected disabled>select category</option>
                                        @foreach ($status as $st)
                                            <option value="{{ $st }}" @selected(old('status'))>
                                                {{ $st }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="form-label">Project Link</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="link" value='{{ old('link') }}'>
                                </div>
                                @error('link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="form-label">Description</label>
                                <div class="form-group">
                                    <textarea name="description" class='form-control' id="" cols="30" rows="10"
                                        value='{{ old('description') }}'></textarea>
                                </div>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dashboard.project.all') }}" class="btn btn-light">Cencel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
