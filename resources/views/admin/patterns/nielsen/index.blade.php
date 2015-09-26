@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">New Nielsen</div>
                    <div class="box-body pad">

                        <div class="box-footer clearfix">
                            <a class="btn btn-info pull-right" href="{{ route('admin.patterns-nielsen.create') }}"
                               role="button">
                                Nueva Regla
                            </a>
                        </div>
                        <div class="panel-body">
                            <table id="nielsen" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($nielsen as $nielsen)
                                    <tr data-id="{{ $nielsen->id }}">
                                        <td>{{ $nielsen->id }}</td>
                                        <td>{{ $nielsen->name }}</td>


                                        <td>

                                            <a class="btn btn-success btn-xs"
                                               href="{{ route ('admin.patterns-nielsen.show', $nielsen->id) }}"><i
                                                        class="fa fa-info-circle"></i></a>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ route ('admin.patterns-nielsen.edit', $nielsen->id) }}"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger btn-xs btn-delete"
                                               href="{{ route ('admin.patterns-nielsen.destroy', $nielsen->id) }}"><i
                                                        class="fa fa-trash-o"></i></a>
                                            {{--

                                                                                    <a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-nielsen.edit', $nielsen->id) }}">Editar</a>
                                                                                    <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-nielsen.destroy', $nielsen->id) }}" class="btn-delete">Eliminar</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
            @parent
            <script>
                $(document).ready(function () {
                    $('#nielsen').DataTable({
                        paging: false
                    });
                });


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
                            toastr.success('Regla de Nielsen eliminada.')
                        });


                    });
                });
            </script>
@endsection
