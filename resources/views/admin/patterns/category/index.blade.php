@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>

                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                    <div class="panel-body">

                        <p>
                            <a class="btn btn-info" href="{{ route('admin.patterns-category.create') }}" role="button">
                                Nueva Categoria
                            </a>
                        </p>

                        <p>Hay {{ $categories->total() }} Categorias </p>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripciones</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-category.edit', $category->id) }}">Editar</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-category.destroy', $category->id) }}" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $categories->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!   Form::open(['route'=>['admin.patterns-category.destroy',':CATEGORY_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



    {!! Form::close()  !!}

@endsection



@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {

                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':CATEGORY_ID', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function (result) {
                    alert(result);
                });


                alert(data);


            });
        });
    </script>
@endsection