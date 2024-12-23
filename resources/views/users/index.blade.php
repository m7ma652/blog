@extends('layouts.app')
@section('title')
    Home page
@endsection
@section('content')
    <div class="container mt-4">
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
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user ? $post->user->name : 'not found' }}</td>
                        <td>{{ $post->created_at->format('y-m-d') }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
