@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Nuevo Usuario</div>
                    <div class="box-body pad">

                        {!! Form::open(['route' => 'admin.users.store' , 'method' => 'POST' , 'files' => true]) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        {!! Field::text('username') !!}

                        {!! Field::email('email') !!}

                        {!! Field::password('password') !!}

                        {!! Field::password('password_confirmation') !!}

                        {!! Form::file('image') !!}

                        {!! Field::select('Tipo',['admin','expert','user'] ,null, ['empty' => 'Selecciona el Tipo de Usuario' ]) !!}

                        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>


        
        
        
    </div>
@endsection