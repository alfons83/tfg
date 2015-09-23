@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Editar Comentario: <strong>{{ $comments->name }}</strong></div>
                    <div class="box-body pad">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($comments, ['route' => ['admin.patterns-comments.update', $comments->id], 'method' => 'PUT']) !!}

                        {!! Field::textarea('comment') !!}



                        <button type="submit" class="btn btn-primary">Actualizar comentario</button>

                        {!! Form::Close() !!}

                 {{--       {!!   Form::open(['route'=>['admin.patterns-comments.destroy',$patterns], 'method' => 'DELETE']) !!}

                        <button type="submit" class="btn btn-danger ">Eliminar</button>

                        {!! Form::close()  !!}--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

    CKEDITOR.replace( 'comment' );

</script>
@endsection