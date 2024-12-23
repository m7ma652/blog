@extends('admins.layouts.app')
@section('title')
    Home page
@endsection
@section('content')
    <div class="container mt-4">
        <div class="text-center">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create post</a>
        </div>
        <table class="mt-4 table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted by</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name:'not found'}}</td>
                    <td>{{$post->created_at->format('y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <form style="display: inline;" method="POST" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
