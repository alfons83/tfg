@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Editar Regla: <strong>{{ $nielsen->name }}</strong></div>
                    <div class="box-body pad">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($nielsen, ['route' => ['admin.patterns-nielsen.update', $nielsen->id], 'method' => 'PUT']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}


                        <button type="submit" class="btn btn-primary">Actualizar Regla</button>

                        {!! Form::Close() !!}


{{--                        {!!   Form::open(['route'=>['admin.patterns-nielsen.destroy',$nielsen], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection