@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Tag: {{ $tag->name }} </div>
                    <div class="panel-body">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($tag, ['route' => ['admin.tag.update', $tag->id], 'method' => 'PUT']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}

                        {!! Field::number('post_id') !!}


                        <button type="submit" class="btn btn-default">Actualizar tag</button>

                        {!! Form::Close() !!}

                        {!!   Form::open(['route'=>['admin.tag.destroy',$tag], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection