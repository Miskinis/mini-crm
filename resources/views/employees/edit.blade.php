@extends('layouts.app')

@section('title', '| Edit Employees')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Edit Company</h1>

                <hr>
                {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                {{ Form::label('firstname', 'Firstname:') }}
                {{ Form::text('firstname', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('lastname', 'Lastname:') }}
                {{ Form::text('lastname', null, ["class" => 'form-control input-lg']) }}

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

                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i:s', strtotime($employee->created_at)) }}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            @if(empty($employee->updated_at))
                                <dd>Never</dd>
                            @else
                                <dd>{{ date('M j, Y H:i:s', strtotime($employee->updated_at)) }}</dd>
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('employees.index', 'Cancel', array($employee->id), array('class' => 'btn btn-danger btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
