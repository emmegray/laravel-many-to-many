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
        <div class="mb-3">
            <select name="category_id" id="category_id" class="form-select">
                <option value="" {{old('category_id') == null ? 'selected' : ''}}>Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            @foreach ($tags as $tag)
                <label for="tag-{{$tag->slug}}">
                    <span>{{$tag->name}}</span>
                    <input
                        type="checkbox"
                        name="tags[]"
                        id="tag-{{$tag->slug}}"
                        value="{{$tag->id}}"
                        @if (in_array($tag->id, old('tags', [])))
                            checked
                        @endif
                    />
                </label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
