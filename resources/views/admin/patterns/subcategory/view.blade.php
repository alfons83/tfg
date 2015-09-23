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
                        {!!  $subcategory->name!!}



                        <label>Description</label>

                        {!!  $subcategory->description !!}




                    </div>

                </div>
            </section>
        </div>
    </div>
@stop