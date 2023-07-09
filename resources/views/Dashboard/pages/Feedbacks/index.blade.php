@extends('Dashboard.inc.master')

@section('title','feedbacks')
@section('pageName','feedbacks')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">feedbacks table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>name</th>
            <th>image</th>
            <th>email</th>
            <th>title</th>
            <th>description</th>
            <th>rate</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{$feedback->id}}</td>
                <td>{{$feedback->user->name}}</td>
                <td>
                    @if (File::exists('Uploads/Users/'.$feedback->user->image))
                    <img src="{{asset('Uploads/Users/'.$feedback->user->image)}}" class="img-fluid" width="100" height="100" alt="">
                    @endif
                </td>
                <td>{{$feedback->user->email}}</td>
                <td>{{$feedback->title}}</td>
                <td>{{$feedback->description}}</td>
                <td>{{$feedback->rate}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        {{-- <a class="btn btn-success btn-sm" href="{{route('dashboard.feedback.edit',['feedback'=>$feedback->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> --}}
                        <form action="{{route('dashboard.feedback.delete',['feedback'=>$feedback->id])}}" method="POST">
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
    {{$feedbacks->links('pagination::bootstrap-4')}}
  </div>
@endsection
