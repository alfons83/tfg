@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My account</div>
                    <div class="panel-body">
                        @include('partials/success')
                        <h1>Laravel 5</h1>
                       <ul>
                           <li><a href="{{ route('admin.users.edit') }}">Edit profile</a></li>
                           <li><a href="{{ url('account/password') }}">Change password</a></li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection