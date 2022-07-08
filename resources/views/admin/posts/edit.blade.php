@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title',$post->title)}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Post content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" value="{{ old('content',$post->content)}}">
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select name="category_id" id="category_id" class="form-select">
                <option value="" {{old('category_id', $post->category->id) == null ? 'selected' : ''}}> Category</option>
                @foreach ($categories as $category)
                <option value="" {{old('category_id', $post->category ? $post->category->id : '') == $category->id ? 'selected' : ''}}>
                    {{$category->name}}
                </option>
                @endforeach
            </select>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection