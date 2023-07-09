@extends('Dashboard.inc.master')

@section('title', 'Departments')
@section('pageName', 'Departments')
@section('pageAction', 'create')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Department</h5>
                </div>
                <div class="card-body">
                    <form method='POST' action="{{ route('dashboard.department.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Department Name</label>
                                    <input type="text" class="form-control" name="name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dashboard.department.all') }}" class="btn btn-light">Cencel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
