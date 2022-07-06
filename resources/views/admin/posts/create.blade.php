@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Post content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" value="">
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection