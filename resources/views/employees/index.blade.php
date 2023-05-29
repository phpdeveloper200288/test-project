@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Select XML file to import:</label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control-file" name="file" id="file">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">

                @include('employees.table')

                @include('components.pagination', ['entity' => $employees, 'routeUrl' => 'employees.index'])
            </div>

        </div>
    </div>

@endsection

