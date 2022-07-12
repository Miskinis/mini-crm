@extends('layouts.app')

@section('title', '| Edit Companies')

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
                {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('website', 'Website:') }}
                {{ Form::text('website', null, ["class" => 'form-control input-lg']) }}

                 <hr>
                {{ Form::label('logo', 'Upload a Logo') }}
                {{ Form::file('logo') }}
                <hr>

                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i:s', strtotime($company->created_at)) }}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            @if(empty($company->updated_at))
                                <dd>Never</dd>
                            @else
                                <dd>{{ date('M j, Y H:i:s', strtotime($company->updated_at)) }}</dd>
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('companies.index', 'Cancel', array($company->id), array('class' => 'btn btn-danger btn-block')) !!}
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
