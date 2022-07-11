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

                    <ul>
                        @foreach ($posts as $post)
                        <li>
                            {{$post->title}}{{$post->category ? $post->category->name: 'No category'}}
                            {{$post->title}}{{$post->tags ? $post->tags->name: 'No tags'}}
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
