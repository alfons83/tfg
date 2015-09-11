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
      {{--  @foreach($patterns->categorys as $category)
            {{$category->name}}
        @endforeach--}}
       </pre>

    <h1>Listas vinculadas</h1>

    {{ Form::open() }}
    <select id="category_id" name="category_id">
        <option>Seleccione una empresa</option>
        <option value="1">Empresa 1</option>
        <option value="2">Empresa 2</option>
        <option value="3">Empresa 3</option>
    </select>
    <br>
    <select id="subcategory_id" name="subcategory_id">
        <option>Debe escoger una empresa primero</option>
    </select>
    {{ Form::close()}}

@stop



@section('scripts')
@endsection