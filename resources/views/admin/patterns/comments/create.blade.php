@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Pattern</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.patterns.store' , 'method' => 'POST']) !!}

                        {!! Field::text('title') !!}


                        {!! Field::textarea('content') !!}

                        {!! Field::text('slug') !!}

                        {!! Field::text('active') !!}

                        {!! Form::submit('Send', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    $('.textarea').wysihtml5();

</script>