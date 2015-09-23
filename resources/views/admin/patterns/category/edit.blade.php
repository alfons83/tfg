@extends('admin._includes.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="box box-info">
                <div class="box-header ">Editar Categoría: <strong>{{ $category->name }}</strong> </div>
                <div class="box-body pad">
                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                    {!! Form::Model($category, ['route' => ['admin.patterns-category.update', $category->id], 'method' => 'PUT']) !!}

                    {!! Field::text('name') !!}

                    {!! Field::text('description') !!}


                    <button type="submit" class="btn btn-primary">Actualizar Categoria</button>

                    {!! Form::Close() !!}

{{--
                    {!!   Form::open(['route'=>['admin.patterns-category.destroy',$category], 'method' => 'DELETE']) !!}

                    <button type="submit" class="btn btn-danger ">Eliminar</button>

                    {!! Form::close()  !!}--}}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection