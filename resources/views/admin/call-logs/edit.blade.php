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
                                    <label class="form-label" for="formrow-category-input">Building Manager</label>
                                    <input type="hidden" id="selectedBuildingManagerId" value="{{ $call_log->building_manager_id }}">
                                    <select class="form-select mb-3" name="building_manager_id" id="buildingManagerSelect"
                                        aria-label="Default select example" required>
                                        <option selected disabled>Select a Building Manager</option>
                                    </select>
                                    @error('building_manager_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Strata Manager</label>
                                    <input type="hidden" id="selectedStrataManagerId" value="{{ $call_log->strata_manager_id }}">
                                    <select class="form-select mb-3" name="strata_manager_id" id="strataManagerSelect"
                                        aria-label="Default select example" required>
                                        <option selected disabled>Select a Strata Manager</option>
                                    </select>
                                    @error('strata_manager_id')
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
                                    <label class="form-label" for="formrow-mobile-input">Call Date</label>
                                    <input type="date" class="form-control @error('call_date') is-invalid @enderror"
                                        name="call_date" value="{{ $call_log->call_date }}" id="formrow-mobile-input" required>
                                    @error('call_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Call Time</label>
                                    <input type="text" class="form-control @error('call_time') is-invalid @enderror"
                                        name="call_time" value="{{ $call_log->call_time }}" id="formrow-mobile-input" required>
                                    @error('call_time')
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
                                        <option value="Contractor Engaged" {{ $call_log->status == 'Contractor Engaged' ? 'selected' : '' }}>Contractor Engaged</option>
                                        <option value="Non emergency" {{ $call_log->status == 'Non emergency' ? 'selected' : '' }}>Non emergency</option>
                                        <option value="Completed" {{ $call_log->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Contractor already engaged" {{ $call_log->status == 'Contractor already engaged' ? 'selected' : '' }}>Contractor already engaged</option>
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
        var selectedBuildingManagerId = $('#selectedBuildingManagerId').val();
        var selectedStrataManagerId = $('#selectedStrataManagerId').val();


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

                    if (response.buildingManagers.length > 0) {
                        $.each(response.buildingManagers, function(index, buildingManager) {
                            $('#buildingManagerSelect').append(
                                `<option value="${buildingManager.id}" ${buildingManager.id == selectedBuildingManagerId ? 'selected' : ''}>${buildingManager.name}</option>`
                            );
                        });
                    } else {
                        $('#buildingManagerSelect').append(
                            `<option disabled>No building managers found</option>`
                        );
                    }

                    if (response.strataManagers.length > 0) {
                        $.each(response.strataManagers, function(index, strataManager) {
                            $('#strataManagerSelect').append(
                                `<option value="${strataManager.id}" ${strataManager.id == selectedStrataManagerId ? 'selected' : ''}>${strataManager.name}</option>`
                            );
                        });
                    } else {
                        $('#strataManagerSelect').append(
                            `<option disabled>No strata managers found</option>`
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


                        if (response.buildingManagers.length > 0) {
                            $.each(response.buildingManagers, function(index, buildingManager) {
                                $('#buildingManagerSelect').append(
                                    `<option value="${buildingManager.id}" ${buildingManager.id == selectedBuildingManagerId ? 'selected' : ''}>${buildingManager.name}</option>`
                                );
                            });
                        } else {
                            $('#buildingManagerSelect').append(
                                `<option disabled>No building managers found</option>`
                            );
                        }

                        if (response.strataManagers.length > 0) {
                            $.each(response.strataManagers, function(index, strataManager) {
                                $('#strataManagerSelect').append(
                                    `<option value="${strataManager.id}" ${strataManager.id == selectedStrataManagerId ? 'selected' : ''}>${strataManager.name}</option>`
                                );
                            });
                        } else {
                            $('#strataManagerSelect').append(
                                `<option disabled>No strata managers found</option>`
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