@extends('layouts.app')

@section('content')
<div class="container">


    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->content}}</p>
            <h5 class="card-title">{{$post->category ? $post->category->name:'No category for this post'}}</h5>
        </div>
    </div>

</div>
@endsection