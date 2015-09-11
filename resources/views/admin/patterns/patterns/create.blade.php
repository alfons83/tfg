@extends('admin._includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Pattern</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.patterns.store' , 'method' => 'POST' , 'files' => true]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        {!! Field::text('title') !!}


                        {!! Field::textarea('content') !!}

                        {!! Field::text('slug') !!}

                        {!! Form::file('image') !!}


                                                <div class="col-lg-4">

                                                    <div class="form-group">
                                                        <label for="">Nielsen Rules Usability</label>
                                                        <select class="form-control input-sm" name="rule_id">
                                                            @foreach($rules as $rule)
                                                                <option value="{{ $rule->id }}">{{ $rule->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                        <div class="col-lg-4">


                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control input-sm" id="category">
                                    <option>--- Seleccionar ---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Subcategories</label>
                                <select class="form-control input-sm" id ="subcategory" name="subcategory_id" disabled>
                                    <option value="">Seleccione categoria primero</option>
                                </select>
                            </div>


                        </div>


                        {!! Form::submit('Send', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

$(function() {
    $('#category').change(function() {
        var category_id = $(this).val();

        $.get('/admin/patterns-category-subcategories?category_id=' + category_id)
            .done(function(result) {
                if(result) {
                    var innerHTML = '';
                    $.each(result, function(index, value) {
                        innerHTML += "<option value='" + value.id + "'>" + value.name + "</option>";
                    });

                    $('#subcategory').html(innerHTML);
                    $('#subcategory').removeAttr('disabled');
                }
            });
    });
});

</script>
@endsection