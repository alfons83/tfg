@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tag</div>

                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                    <div class="panel-body">

                        <p>
                            <a class="btn btn-info" href="{{ route('admin.tag.create') }}" role="button">
                                Nuevo Tag
                            </a>
                        </p>

                        <p>Hay {{ $tags->total() }} tag </p>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripciones</th>
                                <th>Post_Id</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($tags as $tag)
                                <tr data-id="{{ $tag->id }}">
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->description }}</td>
                                    <td>{{ $tag->post_id }}</td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route ('admin.tag.edit', $tag->id) }}">Editar</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route ('admin.tag.destroy', $tag->id) }}" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $tags->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!   Form::open(['route'=>['admin.tag.destroy',':TAG_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



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
                var url = form.attr('action').replace(':TAG_ID', id);
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