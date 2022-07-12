@extends('layouts.app')

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>All Employees</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route('employees.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Employee</a>
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
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Created At</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach ($employees as $employee)

                        <tr>
                            <th>{{ $employee->id }}</th>
                            <td>{{ $employee->firstname }}</td>
                            <td>{{ $employee->lastname }}</td>
                            <td>{{ date('M j, Y', strtotime($employee->created_at)) }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {!! $employees->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
