@extends('admin._includes.layout')
@section('content')
    <h1>hello</h1>

    <pre>
{{$user}}
    </pre>

    Usuario logueado: {{Auth::user()->type}}
<pre>

    {{$user->profile->birthdate }}

    {{$user->profile->website }}
    {{$user->profile->twitter }}

    {{$user->profile->bio }}


    {{$user->pattern->category}}

    </pre>
@stop
