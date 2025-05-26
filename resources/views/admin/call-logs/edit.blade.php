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
                                    <label class="form-label" for="formrow-name-input">Caller Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $call_log->name }}" id="formrow-name-input" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Caller Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $call_log->email ?? '' }}" id="formrow-email-input" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-category-input">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category" id="categorySelect">
                                        <option disabled>Select a Category</option>
                                        <option value="Plumber" {{ $call_log->category == 'Plumber' ? 'selected' : '' }}>Plumber</option>
                                        <option value="Electrician" {{ $call_log->category == 'Electrician' ? 'selected' : '' }}>Electrician</option>
                                        <option value="Lift Company" {{ $call_log->category == 'Lift Company' ? 'selected' : '' }}>Lift Company</option>
                                        <option value="Garage Door Company" {{ $call_log->category == 'Garage Door Company' ? 'selected' : '' }}>Garage Door Company</option>
                                        <option value="Access Control System" {{ $call_log->category == 'Access Control System' ? 'selected' : '' }}>Access Control System</option>
                                        <option value="Fire Contractor" {{ $call_log->category == 'Fire Contractor' ? 'selected' : '' }}>Fire Contractor</option>
                                        <option value="Cleaning Company" {{ $call_log->category == 'Cleaning Company' ? 'selected' : '' }}>Cleaning Company</option>
                                        <!-- <option disabled>Select a Category</option>
                                        <option value="Plumber" {{ $call_log->category == 'Plumber' ? 'selected' : '' }}>Plumber</option>
                                        <option value="Electrician" {{ $call_log->category == 'Electrician' ? 'selected' : '' }}>Electrician</option>
                                        <option value="HVAC Technician" {{ $call_log->category == 'HVAC Technician' ? 'selected' : '' }}>HVAC Technician</option>
                                        <option value="Carpenter" {{ $call_log->category == 'Carpenter' ? 'selected' : '' }}>Carpenter</option>
                                        <option value="Mason" {{ $call_log->category == 'Mason' ? 'selected' : '' }}>Mason</option>
                                        <option value="Painter" {{ $call_log->category == 'Painter' ? 'selected' : '' }}>Painter</option>
                                        <option value="Roofer" {{ $call_log->category == 'Roofer' ? 'selected' : '' }}>Roofer</option>
                                        <option value="Welder/Fabricator" {{ $call_log->category == 'Welder/Fabricator' ? 'selected' : '' }}>Welder/Fabricator</option>
                                        <option value="Pest Control Specialist" {{ $call_log->category == 'Pest Control Specialist' ? 'selected' : '' }}>Pest Control Specialist</option>
                                        <option value="General Handyman" {{ $call_log->category == 'General Handyman' ? 'selected' : '' }}>General Handyman</option>
                                        <option value="Elevator Technician" {{ $call_log->category == 'Elevator Technician' ? 'selected' : '' }}>Elevator Technician</option>
                                        <option value="Fire Safety Technician" {{ $call_log->category == 'Fire Safety Technician' ? 'selected' : '' }}>Fire Safety Technician</option>
                                        <option value="Security System Installer" {{ $call_log->category == 'Security System Installer' ? 'selected' : '' }}>Security System Installer</option>
                                        <option value="Flooring Specialist" {{ $call_log->category == 'Flooring Specialist' ? 'selected' : '' }}>Flooring Specialist</option>
                                        <option value="Glass & Window Installer" {{ $call_log->category == 'Glass & Window Installer' ? 'selected' : '' }}>Glass & Window Installer</option>
                                        <option value="Waterproofing Specialist" {{ $call_log->category == 'Waterproofing Specialist' ? 'selected' : '' }}>Waterproofing Specialist</option>
                                        <option value="Landscaper/Gardener" {{ $call_log->category == 'Landscaper/Gardener' ? 'selected' : '' }}>Landscaper/Gardener</option>
                                        <option value="Cleaning & Janitorial Services" {{ $call_log->category == 'Cleaning & Janitorial Services' ? 'selected' : '' }}>Cleaning & Janitorial Services</option> -->
                                    </select>
                                    @error('category')
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
                                            {{ $building->name }} (Address: {{ $building->address }}) (Notes: {{ $building->building_notes }})
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
                                    <label class="form-label" for="formrow-mobile-input">Caller Number</label>
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
                                    <input type="time" class="form-control @error('call_time') is-invalid @enderror"
                                        name="call_time" value="{{ $call_log->call_time }}" id="formrow-mobile-input" required>
                                    @error('call_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Total Time Spent on Call</label>
                                    <input type="text" class="form-control @error('total_time_spent_on_call') is-invalid @enderror"
                                        name="total_time_spent_on_call" value="{{ $call_log->total_time_spent_on_call }}" id="formrow-mobile-input" value="{{ \Carbon\Carbon::now('Australia/Sydney')->format('H:i') }}" required>
                                    @error('total_time_spent_on_call')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="audio_attachment">Upload Audio</label>
                                    <input type="file" name="audio_attachment[]" id="audio_attachment" class="form-control" multiple>
                                </div>

                                @if (!empty($call_log->audio_attachment))
                                @php
                                $audioFiles = json_decode($call_log->audio_attachment, true);
                                @endphp

                                @if (is_array($audioFiles))
                                @foreach ($audioFiles as $file)
                                <audio controls style="display: block; margin-bottom: 8px;">
                                    <source src="{{ asset($file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                                @endforeach
                                @else
                                <p>Invalid audio data format.</p>
                                @endif
                                @else
                                <p>No audio attachment found.</p>
                                @endif
                            </div>

                            <script>
                                document.getElementById('audio_attachment').addEventListener('change', function() {
                                    let completeOption = document.getElementById('completeOption');
                                    if (this.files.length > 0) {
                                        completeOption.removeAttribute('disabled');
                                    } else {
                                        completeOption.setAttribute('disabled', 'disabled');
                                    }
                                });
                            </script>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Select Status</label>
                                    <select class="form-select mb-3" name="status"
                                        @error('status') is-invalid @enderror aria-label="Default select example" id="statusSelect" required>
                                        <!-- <option disabled>Select a Status</option> -->
                                        <option value="Pending" {{ $call_log->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Contractor Engaged" {{ $call_log->status == 'Contractor Engaged' ? 'selected' : '' }}>Contractor Engaged</option>
                                        <option value="Non emergency" {{ $call_log->status == 'Non emergency' ? 'selected' : '' }}>Non emergency</option>
                                        <!-- <option value="Completed" {{ $call_log->status == 'Completed' ? 'selected' : '' }}>Completed</option> -->
                                        <option value="Completed" id="completeOption"
                                            {{ $call_log->status == 'Completed' ? 'selected' : '' }}
                                            {{ $call_log->audio_attachment ? '' : 'disabled' }}>Completed
                                        </option>
                                        <option value="Contractor already engaged" {{ $call_log->status == 'Contractor already engaged' ? 'selected' : '' }}>Contractor already engaged</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="audio_attachment">Upload Audio</label>
                                    <input type="file" name="audio_attachment" id="audio_attachment"
                                        class="form-control">
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea name="summary" id="summary" class="form-control" rows="4" placeholder="Enter summary or description">{{ $call_log->summary}}</textarea>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_concent_email" name="send_concent_email" value="yes">
                                <label class="form-check-label" for="send_concent_email">
                                    Send Consent Form to Caller
                                    @if ($call_log->consent_form_email_sent)
                                    <span style="color: green;">(Already Sent)</span>
                                    @endif
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_customer_email" name="send_email" value="yes">
                                <label class="form-check-label" for="send_customer_email">
                                    Details to Caller
                                    @if ($call_log->customer_details_email_sent)
                                    <span style="color: green;">(Already Sent)</span>
                                    @endif
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_building_manager_email" name="send_building_manager_email" value="yes">
                                <label class="form-check-label" for="send_building_manager_email">
                                    Details to building manager
                                    @if ($call_log->building_manager_email_sent)
                                    <span style="color: green;">(Already Sent)</span>
                                    @endif
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_strata_manager_email" name="send_strata_manager_email" value="yes">
                                <label class="form-check-label" for="send_strata_manager_email">
                                    Details to strata manager
                                    @if ($call_log->strata_manager_email_sent)
                                    <span style="color: green;">(Already Sent)</span>
                                    @endif
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_contractor_email" name="send_contractor_email" value="yes">
                                <label class="form-check-label" for="send_contractor_email">
                                    Details to contractor
                                    @if ($call_log->contractor_details_email_sent)
                                    <span style="color: green;">(Already Sent)</span>
                                    @endif
                                </label>
                            </div>
                            <!-- <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sendEmailCheckbox" name="send_concent_email" value="yes"
                                    {{ $call_log->consent_form_email_sent ? 'checked' : '' }}>
                                <label class="form-check-label" for="sendEmailCheckbox">
                                    Send Consent form
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sendEmailCheckbox" name="send_email" value="yes" {{ $call_log->customer_details_email_sent ? 'checked' : '' }}>
                                <label class="form-check-label" for="sendEmailCheckbox">
                                    Details to Caller
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sendEmailCheckbox" name="send_building_manager_email" value="yes" {{ $call_log->building_manager_email_sent ? 'checked' : '' }}>
                                <label class="form-check-label" for="sendEmailCheckbox">
                                    Details to building manager
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sendEmailCheckbox" name="send_strata_manager_email" value="yes" {{ $call_log->strata_manager_email_sent ? 'checked' : '' }}>
                                <label class="form-check-label" for="sendEmailCheckbox">
                                    Details to strata manager
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sendEmailCheckbox" name="send_contractor_email" value="yes" {{ $call_log->contractor_details_email_sent ? 'checked' : '' }}>
                                <label class="form-check-label" for="sendEmailCheckbox">
                                    Details to contractor
                                </label>
                            </div> -->
                        </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                </div>
                </form>
                <div class="mt-4">
                    <h4>Pending Calls</h4>
                    <div class="table-responsive">
                        <table id="pendingCallsTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Caller Name</th>
                                    <th style="width: 300px;">Caller Summary</th>
                                    <th>Category</th>
                                    <th>Building Name</th>
                                    <!-- <th>Building Email</th> -->
                                    <th>Building Address</th>
                                    <th>Contractor Name</th>
                                    <th>Contractor Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be inserted dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
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
        var categoryValue = $('#categorySelect').val();


        $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

        if (buildingId) {
            $.ajax({
                url: '/buildings/get-contractors',
                type: 'GET',
                data: {
                    building_id: buildingId,
                    categoryValue: categoryValue
                },
                success: function(response) {
                    if (response.contractors.length > 0) {
                        $.each(response.contractors, function(index, contractor) {
                            $('#contractorSelect').append(
                                `<option value="${contractor.id}" ${contractor.id == selectedContractorId ? 'selected' : ''}>${contractor.name} (${contractor.phone}) (${contractor.assign})</option>`
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
            var categoryValue = $('#categorySelect').val();
            console.log('here');

            $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

            if (buildingId) {
                $.ajax({
                    url: '/buildings/get-contractors',
                    type: 'GET',
                    data: {
                        building_id: buildingId,
                        categoryValue: categoryValue
                    },
                    success: function(response) {
                        if (response.contractors.length > 0) {
                            $.each(response.contractors, function(index, contractor) {
                                $('#contractorSelect').append(
                                    `<option value="${contractor.id}">${contractor.name} (${contractor.phone}) (${contractor.assign})</option>`
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

                        // Populate pendingCalls table
                        if (response.pendingCalls.length > 0) {
                            $.each(response.pendingCalls, function(index, pendingCall) {
                                $('#pendingCallsTable tbody').append(
                                    `<tr>
                                        <td>${pendingCall?.id || 'N/A'}</td>
                                        <td>${pendingCall?.name || 'N/A'}</td>
                                        <td style="white-space: pre-wrap; max-width: 300px;">${pendingCall?.summary || 'N/A'}</td>
                                        <td>${pendingCall?.category || 'N/A'}</td>
                                        <td>${pendingCall?.building?.name || 'N/A'}</td>
                                        <td>${pendingCall?.building?.address || 'N/A'}</td>
                                        <td>${pendingCall?.contractor?.name || 'N/A'}</td>
                                        <td>${pendingCall?.contractor?.phone || 'N/A'}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm viewCallBtn" data-id="${pendingCall?.id}">View</button>
                                        </td>
                                    </tr>`
                                );
                            });
                        } else {
                            $('#pendingCallsTable tbody').append(
                                `<tr><td colspan="6" class="text-center">No pending calls found</td></tr>`
                            );
                        }

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#categorySelect').on('change', function() {
            var categoryValue = $(this).val();
            var buildingId = $('#buildingSelect').val();

            console.log("Building ID: ", buildingId);
            console.log("categoryValue ID: ", categoryValue);


            $('#contractorSelect').html('<option selected disabled>Select a contractor</option>');

            if (buildingId) {
                $.ajax({
                    url: '/buildings/get-contractors',
                    type: 'GET',
                    data: {
                        building_id: buildingId,
                        categoryValue: categoryValue
                    },
                    success: function(response) {
                        $('#contractorSelect').empty();
                        $('#buildingManagerSelect').empty();
                        $('#strataManagerSelect').empty();

                        if (response.contractors.length > 0) {
                            $.each(response.contractors, function(index, contractor) {
                                $('#contractorSelect').append(
                                    `<option value="${contractor.id}">${contractor.name} (${contractor.phone})</option>`
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
                                    `<option value="${buildingManager.id}">${buildingManager.name}</option>`
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
                                    `<option value="${strataManager.id}">${strataManager.name}</option>`
                                );
                            });
                        } else {
                            $('#strataManagerSelect').append(
                                `<option disabled>No strata managers found</option>`
                            );
                        }

                        // Populate pendingCalls table
                        if (response.pendingCalls.length > 0) {
                            $.each(response.pendingCalls, function(index, pendingCall) {
                                $('#pendingCallsTable tbody').append(
                                    `<tr>
                                        <td>${pendingCall?.id || 'N/A'}</td>
                                        <td>${pendingCall?.name || 'N/A'}</td>
                                        <td style="white-space: pre-wrap; max-width: 300px;">${pendingCall?.summary || 'N/A'}</td>
                                        <td>${pendingCall?.category || 'N/A'}</td>
                                        <td>${pendingCall?.building?.name || 'N/A'}</td>
                                        <td>${pendingCall?.building?.address || 'N/A'}</td>
                                        <td>${pendingCall?.contractor?.name || 'N/A'}</td>
                                        <td>${pendingCall?.contractor?.phone || 'N/A'}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm viewCallBtn" data-id="${pendingCall?.id}">View</button>
                                        </td>
                                    </tr>`
                                );
                            });
                        } else {
                            $('#pendingCallsTable tbody').append(
                                `<tr><td colspan="6" class="text-center">No pending calls found</td></tr>`
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
    $(document).on('click', '.viewCallBtn', function() {
        const callId = $(this).data('id');

        // Option 1: Redirect to a detailed view page
        window.location.href = `/call-logs/view/${callId}`;

        // OR Option 2: Open a modal (if you have one)
        // $('#callDetailsModal').modal('show');
        // fetchCallDetails(callId);
    });
</script>
@endsection