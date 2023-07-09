@extends('Dashboard.inc.master')

@section('title', 'clients')
@section('pageName', 'clients')
@section('pageAction', 'create')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Client</h5>
            </div>
            <div class="card-body">
                <form method='POST' action="{{ route('dashboard.client.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">client Name</label>
                                <input type="text" class="form-control" name="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                            <a href="{{ route('dashboard.client.all') }}" class="btn btn-light">Cencel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
