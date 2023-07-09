@extends('Dashboard.inc.master')

@section('title','plans')
@section('pageName','plans')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">plans table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($plans as $plan)
            <tr>
                <td>{{$plan->id}}</td>
                <td>{{$plan->title}}</td>
                <td>{{$plan->description}}</td>
                <td>{{$plan->price}}</td>
                <td>
                    @if (File::exists('Uploads/Plans/'.$plan->image))
                    <img src="{{asset('Uploads/Plans/'.$plan->image)}}" class="img-fluid" width="90" height="90" alt="">
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.plan.edit',['plan'=>$plan->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.plan.delete',['plan'=>$plan->id])}}" method="POST">
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
    {{$plans->links('pagination::bootstrap-4')}}
  </div>
@endsection
