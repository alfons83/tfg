@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                    {{$title = trans(Route::currentRouteName() . '_title') }}
                    <a href="{{--{{ route('patterns.create') }}--}}" class="btn btn-primary">
                        Nueva solicitud
                    </a>
                </h1>

               <p class="label label-info news">
                    {{ Lang::choice(Route::currentRouteName() . '_total', $patterns->total()) }}
                </p>

                @foreach($patterns as $pattern)
                    @include('home/partials/item', compact('pattern'))
                @endforeach

                {!! $patterns->render() !!}

            </div>

        </div>
    </div>
</div>

@endsection
