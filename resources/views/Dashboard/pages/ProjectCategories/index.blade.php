@extends('Dashboard.inc.master')

@section('title','projectCategories')
@section('pageName','projectCategories')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">projectCategories table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>name</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projectCategories as $projectCategory)
            <tr>
                <td>{{$projectCategory->id}}</td>
                <td>{{$projectCategory->name}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.projectCategory.edit',['projectCategory'=>$projectCategory->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.projectCategory.delete',['projectCategory'=>$projectCategory->id])}}" method="POST">
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
    {{$projectCategories->links('pagination::bootstrap-4')}}
  </div>
@endsection
