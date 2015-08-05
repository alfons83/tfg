@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }} </p>
            </div>
        </div>
    </div>
@endsection