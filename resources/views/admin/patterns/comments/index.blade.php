@extends('admin._includes.layout')
@section('content')
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Comments</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="{{route('admin.patterns-comments.create')}}" class="btn btn-sm btn-info btn-flat pull-right">
                    New Comment</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="comments" class="table no-margin">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr data-id="{{ $comment->id }}">
                                <td>{{ $comment->id }}</td>
                                <td>
                                    <a href="{{route('admin.patterns-comments.show', ['comments' => $comment->id])}}">{{ $comment->comment }}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.users.show', ['user_id' =>$comment->user->id])}}">{{ $comment->user->first_name. ' '.$comment->user->last_name }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-xs"
                                       href="{{route('admin.patterns-comments.show', ['comments' => $comment->id])}}"><i
                                                class="fa fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-xs"
                                       href="{{route('admin.patterns-comments.edit', ['comments' => $comment->id])}}"><i
                                                class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger btn-xs"
                                       href="{{route('admin.patterns-comments.destroy',['comments' => $comment->id])}}"
                                       class="btn-delete">
                                        <i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class=" pull-right">
                        {!!  $comments->render() !!}
                    </div>
                </div>

            </div>


        </div>


    </div>

    {!!   Form::open(['route'=>['admin.patterns-comments.destroy',':COMMENT_ID'], 'method' => 'DELETE','id'=>'form-delete']) !!}



    {!! Form::close()  !!}

@endsection

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            $('#comments').DataTable({
                paging: false
            });
        });

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
                    toastr.success('Comentario eliminado.');
                });


            });
        });
    </script>
@endsection