@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Nueva Subcategoria</div>
                    <div class="box-body pad">

                        {!! Form::open(['route' => 'admin.patterns-subcategory.store' , 'method' => 'POST']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}




                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection