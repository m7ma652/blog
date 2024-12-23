    @extends('admins.layouts.app')
    @section('title')
        Create new post
    @endsection

    @section('content')

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
            <!-- Create Post Form -->
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input name="description" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Post creator</label>
                    <select name="post_creator" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    @endsection
