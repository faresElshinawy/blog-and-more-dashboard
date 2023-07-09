@extends('Dashboard.inc.master')

@section('title', 'services')
@section('pageName', 'services')
@section('pageAction', 'edit')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add service</h5>
            </div>
            <div class="card-body">
                <form method='POST' action="{{ route('dashboard.service.update',['service'=>$service->id]) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value='{{old('title') ?? $service->title}}'>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" value='{{old('description') ?? $service->description}}'>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    @if (File::exists('Uploads/Services/'.$service->image))
                                    <img src="{{asset('Uploads/Services/'.$service->image)}}" class="img-fluid" width="90" height="90" alt="">
                                    @endif
                                </div>
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
                            <a href="{{ route('dashboard.service.all') }}" class="btn btn-light">Cencel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
