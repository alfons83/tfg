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

                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control input-sm" id="category">
                                <option>--- Seleccionar ---</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection