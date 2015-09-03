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
                <a href="{{ route ('admin.users.edit', $user) }}">Editar</a>
                <a href="{{ route ('admin.users.destroy', $user) }}">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>