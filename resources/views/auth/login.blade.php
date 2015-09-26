@extends('auth.layout')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('http://laravel.app/')}}"><b>Admin</b>Pattern</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Inicia tu sesión</p>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <div class=" checkbox">
                        <label>
                            <input type="checkbox"> @lang('auth.remember')
                        </label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"> @lang('auth.login_button')</button>
                </div>
            </div>
        </form>

       {{-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="{{url('http://laravel.app/facebook/authorize')}}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="{{url('http://laravel.app/github/authorize')}}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i> Sign in using Github</a>
        </div><!-- /.social-auth-links -->--}}

        <a href="{{ url('password/email') }}">@lang('auth.forgot_link')</a><br>
        <a href="{{ url('register') }}" class="text-center">Registrar a un nuevo usuario</a>

    </div>
</div>
@endsection
