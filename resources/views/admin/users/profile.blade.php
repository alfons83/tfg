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

                        {{-- <div class="radio">
                             <div class="col-lg-4">
                                 {!!  Form::open(array('url'=>'','files'=>true)) !!}
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                 <div class="form-group">
                                     <label for="">Gender</label>
                                     <select class="form-control input-sm" name="">
                                         @foreach($user  as $user)
                                             <option value="{{ $user->id }}">{{ $user->gender }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 {{ Form::close() }}
                             </div>
                         </div>
                         <div class="radio">
                             <div class="col-lg-4">
                                 {!!  Form::open(array('url'=>'','files'=>true)) !!}
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                 <div class="form-group">
                                     <label for="">Type</label>
                                     <select class="form-control input-sm" name="">
                                         @foreach($user as $user)
                                             <option value="{{ $user->id }}">{{ $user->type }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 {{ Form::close() }}
                             </div>
                         </div>--}}

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
    <div class="row">
@stop
