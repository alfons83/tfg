@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuario: <strong>{{ $user->getFullName() }} </strong></div>
                    <div class="panel-body">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

                        {!! Field::text('first_name') !!}

                        {!! Field::text('last_name') !!}

                        {!! Field::email('email') !!}

                        {!! Field::password('password') !!}

                        {!! Field::password('password_confirmation') !!}

                        <button type="submit" class="btn btn-primary">Actualizar usuario</button>

                        {!! Form::Close() !!}

                       {{-- {!!   Form::open(['route'=>['admin.users.destroy',$user], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection