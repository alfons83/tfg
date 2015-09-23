@extends('admin._includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-info">
                    <div class="box-header ">New Pattern</div>
                    <div class="box-body pad">

                        @if(Session::has('message'))

                            <p class="alert alert-success">{{ Session::get('message') }}</p>

                        @endif

                        {!! Form::Model($patterns, ['route' => ['admin.patterns.update', $patterns->id], 'method' => 'PUT', 'files' => true]) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Field::text('title') !!}

                        {!! Field::textarea('problem') !!}

                        @foreach($patterns->photos as $photo)
                            <img src="{{ asset($photo->path) }}">
                        @endforeach

                        {!! Form::file('image') !!}

                        {!! Field::textarea('usage') !!}

                        {!! Field::textarea('solution') !!}

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control input-sm" name="status">
                                        <option value="Open" {{ $patterns->status === 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="Closed" {{ $patterns->status === 'Closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>

                            </div>

                           {{-- <div class="col-md-4">

                                <div class="form-group">
                                    <label for="">Nielsen Rules Usability</label>
                                    <select class="form-control input-sm" name="rule_id">
                                        @foreach($patterns->rule as $rule)
                                            <option value="{{ $rule->id }}">{{ $rule->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>--}}

                        <button type="submit" class="btn btn-default">Actualizar usuario</button>

                        {!! Form::Close() !!}

                        {{--{!!   Form::open(['route'=>['admin.patterns.destroy',$patterns], 'method' => 'DELETE']) !!}

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


        CKEDITOR.replace( 'problem' );
        CKEDITOR.replace( 'usage' );
        CKEDITOR.replace( 'solution' );

    </script>
@stop