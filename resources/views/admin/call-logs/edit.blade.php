@extends('layouts.main')
@section('title', 'Update Call Log')
@section('breadcrumbTitle', 'Update Call Log')
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
<li class="breadcrumb-item active">Update Call Log</li>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title shine">Call Log Update</h4>
                <a href="{{ route('call-logs.index') }}" class="btn btn-sm btn-secondary-subtle"><i
                        class="mdi mdi-arrow-right align-middle"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('call-logs.update', ['id' => $call_log->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-name-input">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $call_log->name }}" id="formrow-name-input" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $call_log->email ?? '' }}" id="formrow-email-input" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Select Building</label>
                                    <select class="form-select mb-3" name="building_id"
                                        @error('building_id') is-invalid @enderror aria-label="Default select example"
                                        id="buildingSelect" required>
                                        <option selected disabled>Select a building</option>
                                        @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}"
                                            {{ $call_log->building_id == $building->id ? 'selected' : '' }}>
                                            {{ $building->name }}
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
                                    <input type="hidden" id="selectedContractorId"
                                        value="{{ $call_log->contractor_id }}">
                                    <select class="form-select mb-3" name="contractor_id" id="contractorSelect"
                                        aria-label="Default select example" required>
                                        <option selected disabled>Select a contractor</option>
                                    </select>
                                    @error('contractor_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Manager</label>
                                    <input type="hidden" id="selectedManagerId" value="{{ $call_log->building->manager->id }}">
                                    <select class="form-select mb-3" name="manager_id" id="managerSelect"
                                        aria-label="Default select example" required>
                                        <option selected disabled>Select a Manager</option>
                                    </select>
                                    @error('manager_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Building Manager</label>
                                    <input type="text"
                                        class="form-control @error('building_manager') is-invalid @enderror"
                                        name="building_manager" value="{{ $call_log->building_manager }}"
                                        id="formrow-email-input" required>
                                    @error('building_manager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Strata Manager</label>
                                    <input type="text"
                                        class="form-control @error('strata_manager') is-invalid @enderror"
                                        name="strata_manager" value="{{ $call_log->strata_manager }}"
                                        id="formrow-category-input" required>
                                    @error('strata_manager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Number</label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        name="number" value="{{ $call_log->number }}" id="formrow-mobile-input" required>
                                    @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Select Status</label>
                                    <select class="form-select mb-3" name="status"
                                        @error('status') is-invalid @enderror aria-label="Default select example"
                                        id="statusSelect" required>
                                        <option disabled>Select a Status</option>
                                        <option value="Pending" {{ $call_log->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $call_log->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="Rejected" {{ $call_log->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="audio_attachment">Upload Audio</label>
                                    <input type="file" name="audio_attachment" id="audio_attachment"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea name="summary" id="summary" class="form-control" rows="4" placeholder="Enter summary or description">{{ $call_log->summary}}</textarea>
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
@section('scripts')
<script>
    $(document).ready(function() {
        var buildingId = $('#buildingSelect').val();
        var selectedContractorId = $('#selectedContractorId').val();
        var selectedManagerId = $('#selectedManagerId').val();

        $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

        if (buildingId) {
            $.ajax({
                url: '/buildings/get-contractors',
                type: 'GET',
                data: {
                    building_id: buildingId
                },
                success: function(response) {
                    if (response.contractors.length > 0) {
                        $.each(response.contractors, function(index, contractor) {
                            $('#contractorSelect').append(
                                `<option value="${contractor.id}" ${contractor.id == selectedContractorId ? 'selected' : ''}>${contractor.name}</option>`
                            );
                        });
                    } else {
                        $('#contractorSelect').append(
                            `<option disabled>No contractors found</option>`
                        );
                    }

                    if (response.managers.length > 0) {
                        $.each(response.managers, function(index, manager) {
                            $('#managerSelect').append(
                                `<option value="${manager.id}" ${manager.id == selectedManagerId ? 'selected' : ''}>${manager.name}</option>`
                            );
                        });
                    } else {
                        $('#managerSelect').append(
                            `<option disabled>No managers found</option>`
                        );
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
        $('#buildingSelect').on('change', function() {
            var buildingId = $(this).val();
            var selectedContractorId = $('#selectedContractorId').val();
            console.log('here');

            $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

            if (buildingId) {
                $.ajax({
                    url: '/buildings/get-contractors',
                    type: 'GET',
                    data: {
                        building_id: buildingId
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $.each(response, function(index, contractor) {

                                $('#contractorSelect').append(
                                    `<option value="${contractor.contractor_id}" ${contractor.contractor_id == selectedContractorId ? 'selected' : ''}>${contractor.contractor.name}</option>`
                                );
                            });
                        } else {
                            $('#contractorSelect').append(
                                `<option disabled>No contractors found</option>`
                            );
                        }
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