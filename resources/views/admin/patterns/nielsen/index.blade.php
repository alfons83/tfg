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
                            <a class="btn btn-info" href="{{ route('admin.patterns-nielsen.create') }}" role="button">
                                Nueva Categoria
                            </a>
                        </p>

                        <p></p>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripciones</th>
                                <th>Post_Id</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($nielsen as $nielsen)
                                <tr data-id="{{ $nielsen->id }}">
                                    <td>{{ $nielsen->id }}</td>
                                    <td>{{ $nielsen->name }}</td>
                                    <td>{{ $nielsen->description }}</td>
                                    <td>{{ $nielsen->post_id }}</td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-nielsen.edit', $nielsen->id) }}">Editar</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-nielsen.destroy', $nielsen->id) }}" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!   Form::open(['route'=>['admin.patterns-nielsen.destroy',':NIELSEN_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



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
                var url = form.attr('action').replace(':NIELSEN_ID', id);
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