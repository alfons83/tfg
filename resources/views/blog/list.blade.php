@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><a href="{{ route('post', [$post->slug]) }}"> {{ $post->title }}</a></td>
                            <td>{{ $post->slug }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection