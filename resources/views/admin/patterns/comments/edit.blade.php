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

                        {!! Form::Model($patterns, ['route' => ['admin.patterns-comments.update', $patterns->id], 'method' => 'PUT']) !!}

                        {!! Field::text('title') !!}

                        {!! Field::textarea('content') !!}

                        {!! Field::text('slug') !!}

                        {!! Field::text('active') !!}

                        <button type="submit" class="btn btn-default">Actualizar usuario</button>

                        {!! Form::Close() !!}

                        {!!   Form::open(['route'=>['admin.patterns-comments.destroy',$patterns], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    $('.textarea').wysihtml5();

</script>