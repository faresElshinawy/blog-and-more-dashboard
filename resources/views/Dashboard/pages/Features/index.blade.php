@extends('Dashboard.inc.master')

@section('title','features')
@section('pageName','features')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">features table</h3>
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
          @foreach ($features as $feature)
            <tr>
                <td>{{$feature->id}}</td>
                <td>{{$feature->name}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.feature.edit',['feature'=>$feature->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.feature.delete',['feature'=>$feature->id])}}" method="POST">
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
    {{$features->links('pagination::bootstrap-4')}}
  </div>
@endsection
