{{--
@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1> {{ $post->title   }} </h1>
                <p> {{  $post->content }} </p>

                <h1> {{ $post->active  }} </h1>
            </div>
        </div>
    </div>
@endsection--}}


<html>
<head>
    <title>{{ config('blog.title') }}</title>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>{{ config('blog.title') }}</h1>
    <h5>Page {{ $post->published_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! n12br(e($post->content)) !!}}
    <button class="btn btn-primary" onclick="history.go(-1)">
        &laquo; Back
    </button>
</div>
</body>
</html>