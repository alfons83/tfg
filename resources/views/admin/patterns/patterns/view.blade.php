@extends('admin._includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <div class="col-md-12">

                       <br/>
                        <br/>
                        <label>Titulo</label>
                        <p class="lead">{!! $patterns->title !!}</p>


                        @foreach($patterns->photos as $photo)
                            <img src="{{ asset($photo->path) }}">
                        @endforeach
                        <label>Problem</label>

                        {!!  $patterns->problem !!}


                            <label>Usage</label>
                            <p class="lead">{!! $patterns->usage!!}</p>

                            <label>Solution</label>
                            <p class="lead">{!!  $patterns->solution!!}</p>


                    </div>
                    {{--<div class="col-md-6">
                        <div class="alert alert-info">
                            <h2>User Bio : </h2>
                            <h4>{{ $user->first_name . '' .$user->last_name}}</h4>
                            <p>
                                {{$user->profile->bio }}
                            </p>
                        </div>
                        <div>
                            <a href="{{$user->profile->twitter }}" class="btn btn-social btn-twitter">
                                <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        </div>
                    </div>--}}
                </div>
            </section>
        </div>
    </div>
@stop