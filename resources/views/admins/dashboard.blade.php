@extends('admins.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    Welcome to dashboard page : {{Auth::guard('admin')->user()->name}}
    <h1> created at : {{Auth::guard('admin')->user()->created_at}}</h1>
@endsection