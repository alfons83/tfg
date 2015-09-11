@extends('admin._includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pattern: {{ $patterns->title }} </div>
                    <div class="panel-body">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($patterns, ['route' => ['admin.patterns.update', $patterns->id], 'method' => 'PUT', 'files' => true]) !!}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Field::text('title') !!}

                        {!! Field::textarea('content') !!}

                        @foreach($patterns->photos as $photo)
                            <img src="{{ asset($photo->path) }}">
                        @endforeach

                        {!! Form::file('image') !!}

                        {!! Field::text('slug') !!}

                        {!! Field::text('active') !!}

                        <button type="submit" class="btn btn-default">Actualizar usuario</button>

                        {!! Form::Close() !!}

                        {!!   Form::open(['route'=>['admin.patterns.destroy',$patterns], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

    $(function() {
        $('.textarea').wysihtml5();
    });

</script>
@stop