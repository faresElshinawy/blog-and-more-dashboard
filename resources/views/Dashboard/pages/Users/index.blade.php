@extends('Dashboard.inc.master')

@section('title','users')
@section('pageName','users')
@section('pageAction','all')


@section('content')
    @livewire('user-search')
@endsection
