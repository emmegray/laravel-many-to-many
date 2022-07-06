@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a href="{{route('admin.posts.create')}}">
                        Create new post
                    </a>
                </div>

                <div class="container">
                    @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        @foreach ($posts as $post)
                        <li class="list-group-item">
                            <b>{{$post->title}}</b>
                            <div class="d-flex flex-row-reverse">

                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>

                                <a class="btn btn-outline-secondary" href="{{route('admin.posts.edit', $post)}}">Edit</a>
                                <a class="btn btn-outline-primary" href="{{route('admin.posts.show', $post->slug)}}">Show</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection