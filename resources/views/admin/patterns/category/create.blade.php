@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nueva Categoria</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.category.store' , 'method' => 'POST']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}

                        {!! Field::number('post_id') !!}



                        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection