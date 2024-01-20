@extends('layouts.app')

@section('content')
    <h2>Create a New Post</h2>

    <p>Logged in as: {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture">

        <button type="submit">Create Post</button>
    </form>
@endsection
