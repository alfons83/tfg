@extends('admin._includes.layout')
@section('content')
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Patterns</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="{{route('admin.patterns.create')}}" class="btn btn-sm btn-info btn-flat pull-right"> New Pattern</a>
            </div>
            <!-- /.box-footer -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="patterns" class="table no-margin">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($patterns as $pattern)
                            <tr data-id="{{ $pattern->id }}">
                                <td>{{ $pattern->id }}</td>
                                <td>
                                    <a href="{{route('admin.patterns.show', ['patterns' => $pattern->id])}}">{{ $pattern->title }}</a>
                                </td>
                              {{-- @foreach($pattern->categorys as $category)
                                <td>{{ $category->name }}</td>
                                @endforeach--}}
                                {{--<td>{{ $pattern->comment }}</td>--}}
                              {{--  <td>{{ $pattern->slug }}</td>--}}
                                    <td>
                                        <a href="{{route('admin.users.show', ['patterns' => $pattern->author->id])}}">{{ $pattern->author->first_name.' '.$pattern->author->last_name }}</a>
                                    </td>
                                @if ($pattern->status === 'Open')

                                    <td><span class="label label-success">Open</span></td>


                                @else ($pattern->status === 'Closed')

                                    <td><span class="label label-danger">Closed</span></td>

                                @endif

                                <td>
                                    <a class="btn btn-success btn-xs"
                                       href="{{route('admin.patterns.show', ['patterns' => $pattern->id])}}"><i
                                                class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-xs"
                                       href="{{route('admin.patterns.edit', ['patterns' => $pattern->id])}}"><i
                                                class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{route('admin.patterns.destroy',['patterns' => $pattern->id])}}" class="btn-delete"><i
                                                class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class=" pull-right">
                       {{-- {!!  $patterns->render() !!}--}}
                    </div>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </div>

    {!!   Form::open(['route'=>['admin.patterns.destroy',':PATTERN_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



    {!! Form::close()  !!}

@endsection

@section('scripts')
    <script>

        $(document).ready(function () {
            $('#patterns').DataTable({
                paging: true
            });
        });


        $(document).ready(function () {
            $('.btn-delete').click(function (e) {

                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':PATTERN_ID', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function (result) {
                    toastr.success('Patron eliminado.');
                });





            });
        });
    </script>
@endsection