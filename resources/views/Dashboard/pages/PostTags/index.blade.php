@extends('Dashboard.inc.master')

@section('title','Post Tags')
@section('pageName','Post Tags')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">Post Tags table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>Name</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($postTags as $postTag)
            <tr>
                <td>{{$postTag->id}}</td>
                <td>{{$postTag->tag->name}}</td>
                <td>
                        <form action="{{route('dashboard.post.postTag.delete',['postTag'=>$postTag->id])}}" method="POST">
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
