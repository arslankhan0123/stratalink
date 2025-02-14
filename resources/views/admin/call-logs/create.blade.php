@extends('layouts.main')
@section('title', 'Create Call Log')
@section('breadcrumbTitle', 'Create Call Log')
<link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
<link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tmp/css/mermaid.min.css') }}" />
<script src="{{ asset('tmp/js/3.7.1-jquery.min.js') }}"></script>
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Create Call Log</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-h-100">
                <div class="card-header justify-content-between d-flex align-items-center">
                    <h4 class="card-title shine">Call Log Create</h4>
                    <a href="{{ route('call-logs.index') }}" class="btn btn-sm btn-secondary-subtle"><i
                            class="mdi mdi-arrow-right align-middle"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="">
                        <form action="{{ route('call-logs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
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
                                        <label class="form-label" for="formrow-email-input">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="formrow-email-input">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-company-input">Select Building</label>
                                        <select class="form-select mb-3" name="building_id"
                                            @error('building_id') is-invalid @enderror aria-label="Default select example"
                                            id="buildingSelect">
                                            <option selected disabled>Select a building</option>
                                            @foreach ($buildings as $building)
                                                <option value="{{ $building->id }}">{{ $building->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('building_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-category-input">Contractor</label>
                                        {{-- <input type="text" class="form-control @error('contractor') is-invalid @enderror"
                                        name="contractor" id="formrow-category-input"> --}}
                                        <select class="form-select mb-3" name="contractor_id" id="contractorSelect"
                                            aria-label="Default select example">
                                            <option selected disabled>Select a contractor</option>
                                        </select>
                                        @error('contractor_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">Building Manager</label>
                                        <input type="text"
                                            class="form-control @error('building_manager') is-invalid @enderror"
                                            name="building_manager" id="formrow-email-input">
                                        @error('building_manager')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-category-input">Strata Manager</label>
                                        <input type="text"
                                            class="form-control @error('strata_manager') is-invalid @enderror"
                                            name="strata_manager" id="formrow-category-input">
                                        @error('strata_manager')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-mobile-input">Number</label>
                                        <input type="number" class="form-control @error('number') is-invalid @enderror"
                                            name="number" id="formrow-mobile-input">
                                        @error('number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="audio_attachment">Upload Audio</label>
                                        <input type="file" name="audio_attachment" id="audio_attachment"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="summary">Summary</label>
                                        <textarea name="summary" id="summary" class="form-control" rows="4" placeholder="Enter summary or description"></textarea>
                                    </div>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="sendEmailCheckbox"
                                        name="send_email" value="yes">
                                    <label class="form-check-label" for="sendEmailCheckbox">
                                        Send email notification
                                    </label>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#buildingSelect').on('change', function() {
                var buildingId = $(this).val();

                $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

                if (buildingId) {
                    $.ajax({
                        url: '/buildings/get-contractors',
                        type: 'GET',
                        data: {
                            building_id: buildingId
                        },
                        success: function(response) {
                            $('#contractorSelect').empty(); // Clear previous options

                            if (response.length > 0) {
                                $.each(response, function(index, contractor) {
                                    $('#contractorSelect').append(
                                        `<option value="${contractor.id}">${contractor.name}</option>`
                                    );
                                });
                            } else {
                                $('#contractorSelect').append(
                                    `<option disabled>No contractors found</option>`
                                );
                            }
                            // if (response.length > 0) {
                            //     $.each(response, function(index, contractor) {

                            //         $('#contractorSelect').append(
                            //             `<option value="${contractor.contractor_id}">${contractor.contractor.name}</option>`
                            //         );
                            //     });
                            // } else {
                            //     $('#contractorSelect').append(
                            //         `<option disabled>No contractors found</option>`
                            //     );
                            // }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
