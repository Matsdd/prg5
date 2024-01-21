@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h1 class="mb-4">All Posts</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h1>{{ $post->title }}</h1>
                                    <h4>By {{ $post->user->name}}</h4>
                                </div>
                                @auth
                                    <form method="POST" action="{{ route('posts.toggleFavorite', $post->id) }}">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ auth()->user()->hasFavorited($post) ? 'Unfavorite' : 'Favorite' }}
                                        </button>
                                    </form>
                                    @if(auth()->user()->id === $post->user->id)
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                                        <form method="POST" action="{{ route('posts.delete', $post->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    {{ auth()->user()->admin_rights == 1 || ($post->updated_at != $post->created_at && auth()->user()->id == $post->user->id) ? '' : 'disabled' }}
                                                    title="{{ $post->updated_at != $post->created_at ? '' : 'Edit post first!' }}">
                                                Delete
                                            </button>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $post->picture) }}" class="img-fluid" alt="Post Picture">
                            <p class="mt-2">{{ $post->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
