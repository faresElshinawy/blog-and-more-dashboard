@extends('Dashboard.inc.master')

@section('title','questions')
@section('pageName','questions')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">questions table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>title</th>
            <th>description</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->title}}</td>
                <td>{{$question->description}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        {{-- <a class="btn btn-success btn-sm" href="{{route('dashboard.question.edit',['question'=>$question->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> --}}
                        <form action="{{route('dashboard.question.delete',['question'=>$question->id])}}" method="POST">
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
    {{$questions->links('pagination::bootstrap-4')}}
  </div>
@endsection
