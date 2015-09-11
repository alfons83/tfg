@extends('admin._includes.layout')
@section('content')

    <div class="container">
        <div class="row">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/bower_components/admin-lte/dist/img/user1-128x128.jpg"
                             class="img-rounded img-responsive"/>
                        <br/>
                        <br/>
                        <label>Full Name</label>
                        <input type="text" class="form-control"
                               placeholder="{{ $user->first_name . ' ' .$user->last_name}}">

                        <label>UserName</label>
                        <input type="text" class="form-control" placeholder="{{ $user->username}}">

                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="{{ $user->email}}">
                        <label>Birthdate</label>
                        <input type="text" class="form-control" placeholder="{{ $user->profile->birthdate}}">

                    </div>
                    <div class="col-md-6">
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
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
