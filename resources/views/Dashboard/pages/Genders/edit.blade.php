@extends('Dashboard.inc.master')

@section('title', 'genders')
@section('pageName', 'genders')
@section('pageAction', 'edit')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Gender</h5>
            </div>
            <div class="card-body">
                <form method='POST' action="{{ route('dashboard.gender.update',['gender'=>$gender->id]) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Gender Name</label>
                                <input type="text" class="form-control" name="name" value='{{ old('name') ?? $gender->name }}'>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard.gender.all') }}" class="btn btn-light">Cencel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
