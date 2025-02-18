@extends('layouts.main')
@section('title', 'Update Building')
@section('breadcrumbTitle', 'Update Buildings')
<link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
<link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tmp/css/mermaid.min.css') }}" />
<script src="{{ asset('tmp/js/3.7.1-jquery.min.js') }}"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" /> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Update Building</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-h-100">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title shine">Building Update</h4>
                    <a href="{{ route('buildings.index') }}" class="btn btn-sm btn-secondary-subtle"><i
                            class="mdi mdi-arrow-right align-middle"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="">
                        <form action="{{ route('buildings.update', ['id' => $building->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-client-input">Select Client</label>
                                        <select class="form-select" aria-label="Default select example" name="user_id"
                                            id="formrow-client-input">
                                            <option disabled>Select a Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    {{ $building->user_id == $client->id ? 'selected' : '' }}>
                                                    {{ ucfirst($client->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-password-input">Select Manager</label>
                                        <select class="form-select" aria-label="Default select example" name="manager_id">
                                            <option selected>Select a Manager</option>
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}"
                                                    {{ $building->manager_id == $manager->id ? 'selected' : '' }}>
                                                    {{ ucfirst($manager->name) }}
                                                </option>
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
                                                <option value="{{ $contractor->id }}"
                                                    {{ $building->contractor_id == $contractor->id ? 'selected' : '' }}>
                                                    {{ $contractor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-name-input">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $building->name }}" id="formrow-name-input">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-mobile-input">Mobile</label>
                                        <input type="number" class="form-control @error('mobile') is-invalid @enderror"
                                            name="mobile" value="{{ $building->mobile }}" id="formrow-mobile-input">
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $building->email }}" id="formrow-email-input">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-company-input">Company</label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            name="company" value="{{ $building->company }}" id="formrow-company-input">
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-category-input">Category</label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror"
                                            name="category" value="{{ $building->category }}"
                                            id="formrow-category-input">
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
