@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Category</div>
                    <div class="box-body pad">

                        <div class="box-footer clearfix">
                            <a class="btn btn-info pull-right" href="{{ route('admin.patterns-category.create') }}"
                               role="button">
                                New Category
                            </a>
                        </div>
                        <div class="panel-body">
                            <table id="category" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($categories as $category)
                                    <tr data-id="{{ $category->id }}">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>

                                        <td>
                                            <a class="btn btn-success btn-xs"
                                               href="{{ route ('admin.patterns-category.destroy', $category->id) }}"><i
                                                        class="fa fa-info-circle"></i></a>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ route ('admin.patterns-category.edit', $category->id) }}"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger btn-xs btn-delete"
                                               href="{{ route ('admin.patterns-category.destroy', $category->id) }}"><i
                                                        class="fa fa-trash-o"></i></a>


                                            {{--<a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-category.edit', $category->id) }}">Editar</a>
                                            <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-category.destroy', $category->id) }}" class="btn-delete">Eliminar</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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

            @parent
            <script>
                $(document).ready(function () {
                    $('#category').DataTable({
                        paging: false
                    });
                });


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
                            toastr.success('Categoria eliminada.');
                        });


                    });
                });
            </script>
@endsection