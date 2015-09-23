@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Editar Subcategoria: <strong>{{ $subcategory->name }}</strong></div>
                    <div class="box-body pad">


                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($subcategory, ['route' => ['admin.patterns-subcategory.update', $subcategory->id], 'method' => 'PUT']) !!}

                        {!! Field::text('name') !!}

                        {!! Field::text('description') !!}

                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control input-sm" id="category">
                                <option>--- Seleccionar ---</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Actualizar Subcategoria</button>

                        {!! Form::Close() !!}
{{--
                        {!!   Form::open(['route'=>['admin.patterns-subcategory.destroy',$subcategory], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection