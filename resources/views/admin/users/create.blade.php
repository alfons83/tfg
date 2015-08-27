@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.users.store' , 'method' => 'POST']) !!}

                        {!! Field::text('username') !!}

                        {!! Field::email('email') !!}

                        {!! Field::password('password') !!}

                        {!! Field::password('password_confirmation') !!}

                        {!! Form::submit('Send', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection