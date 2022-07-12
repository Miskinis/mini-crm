@extends('layouts.app')

@section('title', '| Create New Employee')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Create New Employee</h1>

                <hr>

                {!! Form::open(array('route' => 'employees.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                {{ Form::label('firstname', 'Firstname:') }}
                {{ Form::text('firstname', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('lastname', 'Lastname:') }}
                {{ Form::text('lastname', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('phone', 'Phone:') }}
                {{ Form::text('phone', null, ["class" => 'form-control input-lg']) }}


                {{ Form::label('company_id', 'Company:') }}
                <select class="form-control" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>

                <hr>

                {{ Form::submit('Create Employee', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
