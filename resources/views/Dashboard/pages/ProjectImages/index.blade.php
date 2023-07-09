@extends('Dashboard.inc.master')

@section('title','project images')
@section('pageName','project images')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">project images table</h3>
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
          @foreach ($projectImages as $projectImage)
            <tr>
                <td>{{$projectImage->id}}</td>
                <td>
                        @if (File::exists('Uploads/ProjectImages/'.$projectImage->image))
                        <img src="{{asset('Uploads/ProjectImages/'.$projectImage->image)}}" class="img-fluid rounded" width="200" height="200" alt="">
                        @endif
                    </div>
                </td>
                <td>
                        <form action="{{route('dashboard.project.image.delete',['projectImage'=>$projectImage->id])}}" method="POST">
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
