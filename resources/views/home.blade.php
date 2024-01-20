@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in succesfully!') }}


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-between">
                <div class="card">
                    <div class="card-body">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">{{ __('Click here to view posts!') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
