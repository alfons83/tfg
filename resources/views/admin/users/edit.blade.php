@extends('admin._includes.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Editar Usuario: <strong>{{ $user->getFullName() }} </strong></div>
                    <div class="box-body pad">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Field::text('username') !!}
                        {!! Field::text('first_name') !!}

                        {!! Field::text('last_name') !!}

                        {!! Field::email('email') !!}

                        {!! Field::password('password') !!}

                        {!! Field::password('password_confirmation') !!}

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="">Tipo</label>
                                    <select class="form-control input-sm" name="type">
                                        <option value="admin" {{ $user->type === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="expert" {{ $user->type === 'expert' ? 'selected' : '' }}>Expert</option>
                                        <option value="user" {{ $user->type === 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>

                            </div>

                        <img src="{{ asset('uploads/users/user_'.$user->id.'/'.$user->profile->path) }}" alt="" class="img-responsive">

                        {!! Form::file('image') !!}

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                        </div>

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