@extends('Dashboard.inc.master')

@section('title','project team')
@section('pageName','project team')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">project team table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>Name</th>
            <th>description</th>
            <th>gender</th>
            <th>department</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projectTeam as $member)
            <tr>
                <td>{{$member->id}}</td>
                <td>{{$member->user->name}}</td>
                <td>{{$member->user->description}}</td>
                <td>{{$member->user->gender->name}}</td>
                <td>{{$member->user->department->name}}</td>
                <td>
                        <form action="{{route('dashboard.project.team.delete',['projectTeam'=>$member->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
