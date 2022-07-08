@extends('layouts.app')

@section('content')
<div class="container">


    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->content}}</p>
            <h5 class="card-title">{{$post->category ? $post->category->name:'No category for this post'}}</h5>

            <div class="d-flex flex-row-reverse">
                <a class="btn btn-outline-secondary" href="{{route('admin.posts.edit', $post)}}">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger d-line" type="submit">Delete</button>
                </form>
                <a class="btn btn-outline-secondary" href="{{route('admin.index')}}">Back</a>
            </div>


        </div>
    </div>

</div>
@endsection