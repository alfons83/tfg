@extends('admin._includes.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">Nuevo  Comentario: </div>
                    <div class="box-body pad">

                        {!! Form::open(['route' => 'admin.patterns-comments.store' , 'method' => 'POST']) !!}


                        {!! Field::textarea('comment') !!}


                        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}



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