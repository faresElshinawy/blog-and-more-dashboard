@extends('Dashboard.inc.master')

@section('title','projects')
@section('pageName','projects')
@section('pageAction','all')


@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">projects Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" wire:model='search'
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>description</th>
                                <th>price</th>
                                <th>category</th>
                                <th>date</th>
                                <th>starts_at</th>
                                <th>ends_at</th>
                                <th>link</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->price }}</td>
                                    <td>{{ $project->category->name }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>{{ $project->starts_at }}</td>
                                    <td>{{ $project->ends_at }}</td>
                                    <td>{{ $project->link }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>
                                        <div class="btn-group btn-sm">
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('dashboard.project.edit', ['project' => $project->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form
                                                action="{{ route('dashboard.project.delete', ['project' => $project->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
