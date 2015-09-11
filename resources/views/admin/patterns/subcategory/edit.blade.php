@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Subcaetgoria: {{ $subcategory->name }} </div>
                    <div class="panel-body">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($tag, ['route' => ['admin.patterns-subcategory.update', $subcategory->id], 'method' => 'PUT']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}


                        <button type="submit" class="btn btn-default">Actualizar Subcategoria</button>

                        {!! Form::Close() !!}

                        {!!   Form::open(['route'=>['admin.patterns-subcategory.destroy',$subcategory], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection