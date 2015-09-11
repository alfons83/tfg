@extends('admin._includes.layout')

@section('content')

    @include('admin.dashboard.stats')

    <div class="row">
        <div class="col-md-12">
            @include('admin.dashboard.patterns_latest')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('admin.dashboard.user_list')
        </div>
        <div class="col-md-6">
            @include('admin.dashboard.expert_list')
        </div>
    </div>


@endsection
