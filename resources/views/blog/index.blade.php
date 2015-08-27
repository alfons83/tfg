<html>
<head>
    <title>{{ config('blog.title') }}</title>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>{{ config('blog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }}} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ url('/blog/{ $post->slug'}) }}">{{ $post->title }}</a>
                <em>({{ $post->published_at->format('m d Y H:ia') }})</em>
                <p>{{($post->content ) }}</p>
            </li>
            @endforeach
    </ul>
    <hr>
  {{--  {!!  $post->render() !!}}--}}
</div>
</body>
</html>