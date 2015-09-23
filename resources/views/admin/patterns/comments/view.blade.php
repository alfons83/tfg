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
                        {{--<p class="lead">{!! $comments->user->first_name !!}</p>--}}



                        <label>Comentario</label>

                        {!!  $comments->comment !!}


                        <label>Patron</label>
                        {{--<p class="lead">{!! $comments->pattern->title!!}</p>--}}




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