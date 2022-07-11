@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $exception->getMessage() }}</h1>
</div>
@endsection
