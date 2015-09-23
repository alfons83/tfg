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

                       {{-- <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control input-sm" id="type">
                                <option>--- Seleccionar ---</option>
                                --}}{{--@foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->type}}</option>
                                @endforeach--}}{{--
                            </select>
                        </div>--}}

                        @foreach($user->photos as $profile)
                            <img src="{{ asset($profile->path) }}">
                        @endforeach

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