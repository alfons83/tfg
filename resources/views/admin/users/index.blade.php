@extends('admin._includes.layout')
@section('content')
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-info btn-flat pull-right"> New User</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="users" class="table no-margin">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="{{route('admin.users.show', ['users' => $user->id])}}">{{ $user->username }}</a>
                                </td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                @if ($user->active === 1)
                                    <td><span class="label label-info">Si</span></td>
                                @else
                                    <td><span class="label label-default">No</span></td>
                                @endif
                                <td>
                                    <a class="btn btn-success btn-xs"
                                       href="{{ route ('admin.users.show', $user->id) }}"><i
                                                class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-xs"
                                       href="{{ route ('admin.users.edit', $user->id) }}"><i
                                                class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger btn-xs btn-delete"
                                       href="{{ route ('admin.users.destroy', $user->id) }}"><i
                                                class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class=" pull-right">
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
    @parent
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                paging: false
            });
        });

        $(document).ready(function () {
            $('.btn-delete').click(function (e) {
                e.preventDefault();

                var row = $(this).closest('tr');
                var id = row.data('data-id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function (result) {

                });


            });
        });
    </script>
@endsection