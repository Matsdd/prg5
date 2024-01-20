@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Favorited Posts</h1>

        @if ($favoritedPosts->isEmpty())
            <p>No favorited posts yet.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($favoritedPosts as $favorite)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h2>{{ $favorite->post->title }}</h2>
                                        <h5>By {{ $favorite->post->user->name }}</h5>
                                    </div>
                                    <form method="POST" action="{{ route('posts.toggleFavorite', $favorite->post->id) }}">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $favorite->post->id }}">
                                        <button type="submit" class="btn btn-danger">
                                            Unfavorite
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <img src="{{ asset('storage/' . $favorite->post->picture) }}" alt="Post Picture" class="mb-2">
                                    <p>{{ $favorite->post->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
