@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $pattern->title }}
                @include('home/partials/status', compact('pattern'))
            </h2>
            <p class="date-t">
                <span class="fa fa-clock-o"></span> {{ $pattern->created_at->format('d/m/y h:ia') }}
            </p>
            <h4 class="label label-info news">
                {{ count($pattern->voters) }} votos
            </h4>

            <p class="vote-users">
                @foreach($pattern->voters as $user)
                    <span class="label label-info">{{ $user->username }}</span>
                @endforeach
            </p>

            @foreach($pattern->categorys as $category)
                <span class="label label-primary">{{ $category->name }}</span>
            @endforeach

            @foreach($pattern->tags as $tag)
                <span class="label label-danger">{{ $tag->name }}</span>
            @endforeach

            <form method="POST" action="http://laravel.app/votar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
                <!--button type="submit" class="btn btn-primary">Votar</button-->
                <button type="submit" class="btn btn-primary">
                    <span class="fa fa-thumbs-o-up"></span> Votar
                </button>
            </form>




            <h3>Nuevo Comentario</h3>


            <form method="POST" action="http://laravel.app/comentar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </form>

            <h3>Comentarios ({{ count($pattern->comments) }})</h3>

            @foreach ($pattern->comments as $comment)
                <div class="well well-sm">
                    <p><strong>{{ $comment->user->first_name .' '. $comment->user->last_name}}</strong></p>
                    <p>{{ $comment->comment }}</p>
                    <p class="date-t">
                        <span class="fa fa-clock-o"></span>
                        {{ $comment->created_at->format('d/m/Y h:ia') }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection