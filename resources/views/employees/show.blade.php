@extends('layouts.app')

@section('title', 'Employee')


@section('content')


    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="well">
                    <dl class="dl-horizontal">
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Firstname:</label>
                        <p>{{ $employee->firstname }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Lastname:</label>
                        <p>{{ $employee->lastname }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Company:</label>
                        <p>{{ $employee->company->name }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Email:</label>
                        <p>{{ $employee->email }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Phone:</label>
                        <p>{{ $employee->phone }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Created At:</label>
                        <p>{{ date('M j, Y H:i:s', strtotime($employee->created_at)) }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>
                        @if(empty($employee->updated_at))
                            <p>Never</p>
                        @else
                            <p>{{ date('M j, Y H:i:s', strtotime($employee->updated_at)) }}</p>
                        @endif

                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('employees.edit', 'Edit', array($employee->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('employees.index', '<< See All Companies', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
