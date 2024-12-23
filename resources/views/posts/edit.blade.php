    @extends('admins.layouts.app')
    @section('title')
        Edit
    @endsection

    @section('content')
        <!-- /resources/views/post/create.blade.php -->
        <div class="text-center">This is edit page</div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <div class="container">
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @csrf
                {{-- @method('PUT') --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input name="title" type="text" value="{{ $post->title }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input name="description" type="text" value="{{ $post->description }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Post creator</label>
                    <select name="post_creator" class="form-control">
                        @foreach ($user as $user)
                            <option @if ($user->id == $post->user_id) selected @endif value="{{ $user->id }}">
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    @endsection
