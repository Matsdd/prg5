@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h1 class="mb-4">Edit Post</h1>

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

    </div>

@endsection
