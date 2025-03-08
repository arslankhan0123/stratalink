@extends('layouts.main')
@section('title', 'Update Contractor')
@section('breadcrumbTitle', 'Update Contractor')
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
<li class="breadcrumb-item active">Update Contractor</li>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title shine">Contractor Update</h4>
                <a href="{{ route('contractors.index') }}" class="btn btn-sm btn-secondary-subtle"><i
                        class="mdi mdi-arrow-right align-middle"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('contractors.update', ['id' => $contractor->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Building</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="building_id">
                                        <option selected>Select a Building</option>
                                        @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}"
                                            {{ $contractor->building_id == $building->id ? 'selected' : '' }}>
                                            {{ $building->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-name-input">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $contractor->name }}" id="formrow-name-input">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ $contractor->phone }}" id="formrow-mobile-input">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Email</label>
                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $contractor->email }}"
                                        id="formrow-email-input">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Company Name</label>
                                    <input type="text"
                                        class="form-control @error('company') is-invalid @enderror"
                                        name="company" value="{{ $contractor->company }}"
                                        id="formrow-company-input">
                                    @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category">
                                        <option disabled>Select a Category</option>
                                        <option value="Preferred" {{ $contractor->category == 'Preferred' ? 'selected' : '' }}>Preferred</option>
                                        <option value="Backup 1" {{ $contractor->category == 'Backup 1' ? 'selected' : '' }}>Backup 1</option>
                                        <option value="Backup 3" {{ $contractor->category == 'Backup 3' ? 'selected' : '' }}>Backup 3</option>
                                    </select>
                                    <!-- <input type="text"
                                            class="form-control @error('category') is-invalid @enderror"
                                            name="category" value="{{ $contractor->category }}"
                                            id="formrow-category-input"> -->
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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