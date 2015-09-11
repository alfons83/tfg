@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Tag</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.patterns-subcategory.store' , 'method' => 'POST']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}




                        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection