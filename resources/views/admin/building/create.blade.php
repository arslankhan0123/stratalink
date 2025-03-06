@extends('layouts.main')
@section('title', 'Create Building')
@section('breadcrumbTitle', 'Create Buildings')
<link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
<link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tmp/css/mermaid.min.css') }}" />
<script src="{{ asset('tmp/js/3.7.1-jquery.min.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" /> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Create Building</li>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title shine">Building Create</h4>
                <a href="{{ route('buildings.index') }}" class="btn btn-sm btn-secondary-subtle"><i
                        class="mdi mdi-arrow-right align-middle"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Building Manager</label>
                                    <select class="form-select" aria-label="Default select example" name="building_manager_id">
                                        <option selected>Select a Building Manager</option>
                                        @foreach ($buildingManagers as $manager)
                                        <option value="{{ $manager->id }}">{{ ucfirst($manager->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <a href="{{route('managers.create', ['type' => 'Building Manager'])}}" class="btn btn-link">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>

                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Strata Manager</label>
                                    <select class="form-select" aria-label="Default select example" name="strata_manager_id">
                                        <option selected>Select a Strata Manager</option>
                                        @foreach ($strataManagers as $manager)
                                        <option value="{{ $manager->id }}">{{ ucfirst($manager->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <a href="{{route('managers.create', ['type' => 'Strata Manager'])}}" class="btn btn-link">
                                    <i class="fas fa-plus"></i> <!-- Font Awesome + icon -->
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Client</label>
                                    <select class="form-select" aria-label="Default select example" name="user_id">
                                        <option selected>Select a Client</option>
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ ucfirst($client->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-password-input">Select Contractor</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="contractor_id">
                                            <option selected>Select a Contractor</option>
                                            @foreach ($contractors as $contractor)
                                                <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-name-input">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="formrow-name-input">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Mobile</label>
                                    <input type="number" class="form-control @error('mobile') is-invalid @enderror"
                                        name="mobile" id="formrow-mobile-input">
                                    @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="formrow-email-input">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-sp_no-input">Sp.No</label>
                                    <input type="text" class="form-control @error('sp_no') is-invalid @enderror"
                                        name="sp_no" id="formrow-sp_no-input">
                                    @error('sp_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Company</label>
                                    <input type="text" class="form-control @error('company') is-invalid @enderror"
                                        name="company" id="formrow-company-input">
                                    @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Category</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                                        name="category" id="formrow-category-input">
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection