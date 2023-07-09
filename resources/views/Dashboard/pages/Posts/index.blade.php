@extends('Dashboard.inc.master')

@section('title','posts')
@section('pageName','posts')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">posts table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>title</th>
            <th>descriptoin</th>
            <th>date</th>
            <th>image</th>
            <th>category</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><textarea class="border-0 bg-white" disabled>{{$post->description}}</textarea></td>
                <td>{{$post->date}}</td>
                <td>
                    @if (File::exists('Uploads/Posts/'.$post->image))
                    <img src="{{asset('Uploads/Posts/'.$post->image)}}" class="img-fluid rounded" width="100" height="100" alt="">
                    @endif
                </td>
                <td>{{$post->category->name}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.post.edit',['post'=>$post->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.post.delete',['post'=>$post->id])}}" method="POST">
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
    {{$posts->links('pagination::bootstrap-4')}}
  </div>
@endsection
