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
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                           {{--<th>Categoria</th>--}}
                            {{--<th>Patron</th>--}}
                            {{--<th>slug</th>--}}
                            <th>Active</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr data-id="{{ $comment->id }}">
                                <td>{{ $comment->id }}</td>
                                <td>
                                    <a href="{{route('admin.comments.show', ['comments' => $comment->id])}}">{{ $comment->comment }}</a>
                                </td>
                              {{-- @foreach($pattern->categorys as $category)
                                <td>{{ $category->name }}</td>
                                @endforeach--}}
                                {{--<td>{{ $pattern->comment }}</td>--}}
                              {{--  <td>{{ $pattern->slug }}</td>--}}

                                <td>{{ $comment->active }}</td>
                                <td>
                                    <a class="btn btn-success btn-xs"
                                       href="{{route('admin.comments.show', ['comments' => $comment->id])}}"><i
                                                class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-xs"
                                       href="{{route('admin.comments.edit', ['comments' => $comment->id])}}"><i
                                                class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{route('admin.comments.destroy',['commens' => $comment->id])}}" class="btn-delete"><i
                                                class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class=" pull-right">
                        {!!  $comments->render() !!}
                    </div>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </div>

    {!!   Form::open(['route'=>['admin.comments.destroy',':COMMENT_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



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
                var url = form.attr('action').replace(':COMMENT_ID', id);
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