@extends('layouts.app')

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>All Companies</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route('companies.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Company</a>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div> <!-- end of .row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach ($companies as $company)

                        <tr>
                            <th>{{ $company->id }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ date('M j, Y', strtotime($company->created_at)) }}</td>
                            <td>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {!! $companies->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
