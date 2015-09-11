@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Subcategoria</div>

                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                    <div class="panel-body">

                        <p>
                            <a class="btn btn-info" href="{{ route('admin.patterns-subcategory.create') }}" role="button">
                                Nueva Subcategoria
                            </a>
                        </p>

                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripciones</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($subcategories as $subcategory)
                                <tr data-id="{{ $tag->id }}">
                                    <td>{{ $subcategory->id }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $subcategory->description }}</td>
                                    <td>{{ $subcategory->post_id }}</td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-subcategory.edit', $subcategory->id) }}">Editar</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-subcategory.destroy', $subcategory->id) }}" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $subcategories->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!   Form::open(['route'=>['admin.patterns-subcategory.destroy',':SUBCATEGORY_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



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
                var url = form.attr('action').replace(':SUBCATEGORY_ID', id);
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