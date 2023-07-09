@extends('Dashboard.inc.master')

@section('title','contacts')
@section('pageName','contacts')
@section('pageAction','all')


@section('content')
<div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">contacts table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th style="width: 50px">Id</th>
            <th>name</th>
            <th>email</th>
            <th>message</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        {{-- <a class="btn btn-success btn-sm" href="{{route('dashboard.contact.edit',['contact'=>$contact->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> --}}
                        <form action="{{route('dashboard.contact.delete',['contact'=>$contact->id])}}" method="POST">
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
    {{$contacts->links('pagination::bootstrap-4')}}
  </div>
@endsection
