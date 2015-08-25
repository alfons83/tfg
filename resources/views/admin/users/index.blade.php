@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    @if(Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                    <div class="panel-body">

                        <p>
                            <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">
                                Nuevo usuario
                            </a>
                        </p>

@include('admin.users.partials.table')

                        <p>Hay {{ $users->total() }} usuarios </p>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"  href="{{ route ('admin.users.edit', $user->id) }}">Editar</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route ('admin.users.destroy', $user->id) }}" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!!  $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!   Form::open(['route'=>['admin.users.destroy',':USER_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



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
                var url = form.attr('action').replace(':USER_ID', id);
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