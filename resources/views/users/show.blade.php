    @extends('layouts.app')
    @section('title')
        Show
    @endsection
    @section('content')
        <div class="container">
            <div class="card mt-4">
                <h5 class="card-header">Post info</h5>
                <div class="card-body">
                    <h5 class="card-title">Title: {{ $post->title }}</h5>
                    <p class="card-text">Description: {{ $post->description }}</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card mt-5">
                <h5 class="card-header">Post creator info</h5>
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $post->user ? $post->user->name : 'not found' }}</h5>
                    <p class="card-text">Email: {{ $post->user ? $post->user->email : 'not found' }}</p>
                    <p class="card-text">{{ $post->user ? $post->user->created_at->format('Y-M-d') : 'not found' }}</p>
                </div>
            </div>
        </div>
    @endsection
