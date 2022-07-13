@extends('layouts.app')

@section('title', 'Company')


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
                        <label>Name:</label>
                        <p>{{ $company->name }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Email:</label>
                        <p>{{ $company->email }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Website:</label>
                        <p>{{ $company->website }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Created At:</label>
                        <p>{{ date('M j, Y H:i:s', strtotime($company->created_at)) }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>
                        @if(empty($company->updated_at))
                            <p>Never</p>
                        @else
                            <p>{{ date('M j, Y H:i:s', strtotime($company->updated_at)) }}</p>
                        @endif

                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('companies.edit', 'Edit', array($company->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('companies.index', '<< See All Companies', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="container" style="max-width: 400px; max-height: 400px">
                    <img class="img-responsive" src="{{asset('storage/'.$company->logo)}}" style="height: auto; width: auto;"
                         alt="{{$company->name. ' image'}}"/>
                </div>
            </div>
        </div>
    </div>
@stop
