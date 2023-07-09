@extends('Dashboard.inc.master')

@section('title','settings')
@section('pageName','settings')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">settings table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>name</th>
            <th>value</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($settings as $setting)
            <tr>
                <td>{{$setting->id}}</td>
                <td>{{$setting->name}}</td>
                <td>{{$setting->value}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <a class="btn btn-success btn-sm" href="{{route('dashboard.setting.edit',['setting'=>$setting->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form action="{{route('dashboard.setting.delete',['setting'=>$setting->id])}}" method="POST">
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
    {{$settings->links('pagination::bootstrap-4')}}
  </div>
@endsection
