@extends('layouts.app')

@section('content')

@foreach ($posts as $post)

    <div class="container">
        <div class="mb-5"></div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between">
                            <h2>{{ $post->title }}</h2>

                                <h4>{{ $post->user->name}}</h4>

                                @auth
                                    <form method="POST" action="{{ route('posts.toggleFavorite', $post->id) }}">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ auth()->user()->hasFavorited($post) ? 'Unfavorite' : 'Favorite' }}
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-around">
                                <img src="{{ asset('storage/' . $post->picture) }}" alt="Post Picture">
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endforeach
@endsection
