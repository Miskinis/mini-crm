@extends('layouts.app')

@section('title', 'Mini-CRM')

@section('content')
    <div class="container">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="col-md-8">
                <div class="row mb-3">

                    <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="card-body">
                            <i class="fas fa-building fa-7x"></i>
                            <h3 class="font-weight-bold text-capitalize p-3">Companies</h3>
                            <a href="{{route('companies.index')}}" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="card col-xl-3 col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="card-body">
                            <i class="fas fa-person fa-7x"></i>
                            <h3 class="font-weight-bold text-capitalize p-3">Employees</h3>
                            <a href="{{route('employees.index')}}" class="stretched-link"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
