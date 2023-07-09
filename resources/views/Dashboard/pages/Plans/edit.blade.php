@extends('Dashboard.inc.master')

@section('title', 'plans')
@section('pageName', 'plans')
@section('pageAction', 'Edit')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Plan</h5>
            </div>
            <div class="card-body">
                <form method='POST' action="{{ route('dashboard.plan.update',['plan'=>$plan->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Plan Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title') ?? $plan->title}}">
                                @error('Tile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Plan Description</label>
                                <input type="text" class="form-control" name="description" value="{{old('description') ?? $plan->description}}">
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Plan Price</label>
                                <input type="text" class="form-control" name="price" value="{{old('price') ?? $plan->price}}">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-5 d-flex justify-content-center">
                            @if (File::exists('Uploads/Plans/'.$plan->image))
                            <img src="{{asset('Uploads/Plans/'.$plan->image)}}" class="img-fluid rounded" width="200" height="200" alt="">
                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                            <div class="form-group fallback w-100">
                                <input type="file" name='image'>
                            </div>
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.plan.all') }}" class="btn btn-light">Cencel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
