@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Subcategory</div>
                    <div class="box-body pad">


                        <div class="box-footer clearfix">
                            <a class="btn btn-info pull-right" href="{{ route('admin.patterns-subcategory.create') }}"
                               role="button">
                                New Subcategory
                            </a>
                        </div>
                        <div class="panel-body">
                            <table id="subcategory" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($subcategory as $subcategory)
                                    <tr data-id="{{ $subcategory->id }}">
                                        <td>{{ $subcategory->id }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->description }}</td>
                                        <td>
                                            <a href="{{route('admin.patterns-category.show', ['subcategory_id' =>$subcategory->categories->id])}}">{{ $subcategory->categories->name}}</a>
                                        </td>

                                        <td>

                                            <a class="btn btn-success btn-xs"
                                               href="{{ route ('admin.patterns-subcategory.destroy', $subcategory->id) }}"><i
                                                        class="fa fa-info-circle"></i></a>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ route ('admin.patterns-subcategory.edit', $subcategory->id) }}"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger btn-xs btn-delete"
                                               href="{{ route ('admin.patterns-subcategory.destroy', $subcategory->id) }}"><i
                                                        class="fa fa-trash-o"></i></a>


                                            {{--<a class="btn btn-primary btn-xs" href="{{ route ('admin.patterns-subcategory.edit', $subcategory->id) }}">Editar</a>
                                            <a class="btn btn-danger btn-xs" href="{{ route ('admin.patterns-subcategory.destroy', $subcategory->id) }}" class="btn-delete">Eliminar</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {!! $subcategory->render() !!}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!!   Form::open(['route'=>['admin.patterns-subcategory.destroy',':SUBCATEGORY_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



        {!! Form::close()  !!}

        @endsection



        @section('scripts')

            @parent
            <script>
                $(document).ready(function () {
                    $('#subcategory').DataTable({
                        paging: false
                    });
                });


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
                            toastr.success('Subcategoria eliminada.');
                        });


                    });
                });
            </script>
@endsection