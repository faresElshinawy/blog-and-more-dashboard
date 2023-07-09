@extends('Dashboard.inc.master')

@section('title','services')
@section('pageName','services')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">services table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($services as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->title}}</td>
                <td>{{$service->description}}</td>
                <td>
                    @if (File::exists('Uploads/Services/'.$service->image))
                    <img src="{{asset('Uploads/Services/'.$service->image)}}" class="img-fluid" width="90" height="90" alt="">
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.service.edit',['service'=>$service->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.service.delete',['service'=>$service->id])}}" method="POST">
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
    {{$services->links('pagination::bootstrap-4')}}
  </div>
@endsection
