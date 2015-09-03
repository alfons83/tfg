@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">

                        <p>
                            <a class="btn btn-info" href="#" role="button">
                                Nuevo usuario
                            </a>
                        </p>

                        <p>Hay {{ $users->total() }} usuarios </p>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->active }}</td>
                                <td>
                                    <a href="">Editar</a>
                                    <a href="">Eliminar</a>
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
@endsection