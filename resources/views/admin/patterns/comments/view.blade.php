@extends('admin._includes.layout')
@section('content')
    <h1>hello</h1>

    <pre>
{{$patterns}}
    </pre>
<pre>
    Usuario logueado: {{Auth::user()}}

</pre>

   CATEGORIAS
    <pre>
            {{$patterns->cate->name}}

       </pre>



@stop
