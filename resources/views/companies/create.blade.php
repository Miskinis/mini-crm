@extends('layouts.app')

@section('title', '| Create New Company')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Create New Company</h1>

                <hr>

                {!! Form::open(array('route' => 'companies.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('website', 'Website:') }}
                {{ Form::text('website', null, ["class" => 'form-control input-lg']) }}

                 <hr>
                {{ Form::label('logo', 'Upload a Logo') }}
                {{ Form::file('logo') }}
                <hr>

                {{ Form::submit('Create Company', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
