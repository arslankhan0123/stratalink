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
                                    <label class="form-label" for="formrow-name-input">Caller Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="formrow-name-input" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Caller Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="formrow-email-input" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-category-input">Category</label>
                                <!-- <input type="text" class="form-control @error('category') is-invalid @enderror"
                                            name="category" id="formrow-category-input"> -->
                                <select class="form-select" aria-label="Default select example"
                                    name="category" id="categorySelect">
                                    <option selected>Select a Category</option>
                                    <option value="Plumber">Plumber</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Lift Company">Lift Company</option>
                                    <option value="Garage Door Company">Garage Door Company</option>
                                    <option value="Access Control System">Access Control System</option>
                                    <option value="Fire Contractor">Fire Contractor</option>
                                    <option value="Cleaning Company">Cleaning Company</option>
                                    <!-- <option value="" selected>Select a Category</option>
                                    <option value="Plumber">Plumber</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="HVAC Technician">HVAC Technician</option>
                                    <option value="Carpenter">Carpenter</option>
                                    <option value="Mason">Mason</option>
                                    <option value="Painter">Painter</option>
                                    <option value="Roofer">Roofer</option>
                                    <option value="Welder/Fabricator">Welder/Fabricator</option>
                                    <option value="Pest Control Specialist">Pest Control Specialist</option>
                                    <option value="General Handyman">General Handyman</option>
                                    <option value="Elevator Technician">Elevator Technician</option>
                                    <option value="Fire Safety Technician">Fire Safety Technician</option>
                                    <option value="Security System Installer">Security System Installer</option>
                                    <option value="Flooring Specialist">Flooring Specialist</option>
                                    <option value="Glass & Window Installer">Glass & Window Installer</option>
                                    <option value="Waterproofing Specialist">Waterproofing Specialist</option>
                                    <option value="Landscaper/Gardener">Landscaper/Gardener</option>
                                    <option value="Cleaning & Janitorial Services">Cleaning & Janitorial Services</option> -->
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Select Building</label>
                                    <select class="form-select mb-3" name="building_id" id="buildingSelect" required>
                                        <option selected disabled>Select a building</option>
                                        @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}">{{ $building->address }}</option>
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
                                        aria-label="Default select example" required>
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
                                    <label class="form-label" for="formrow-category-input">Building Manager</label>
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
                                        name="building_manager" id="formrow-email-input">
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
                                        name="strata_manager" id="formrow-category-input">
                                    @error('strata_manager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Caller Number</label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        name="number" id="formrow-mobile-input" required>
                                    @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                @php
                                $today = \Carbon\Carbon::today()->format('Y-m-d');
                                @endphp

                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Call Date</label>
                                    <input type="date" class="form-control @error('call_date') is-invalid @enderror"
                                        name="call_date" id="formrow-mobile-input" required value="{{ old('call_date', $today) }}">
                                    @error('call_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Call Time</label>
                                    <input type="time" class="form-control @error('call_time') is-invalid @enderror"
                                        name="call_time" id="formrow-mobile-input" value="{{ \Carbon\Carbon::now('Australia/Sydney')->format('H:i') }}" required>
                                    @error('call_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-mobile-input">Total Time Spent on Call</label>
                                    <input type="text" class="form-control @error('total_time_spent_on_call') is-invalid @enderror"
                                        name="total_time_spent_on_call" id="formrow-mobile-input" value="{{ \Carbon\Carbon::now('Australia/Sydney')->format('H:i') }}" required>
                                    @error('total_time_spent_on_call')
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-company-input">Select Status</label>
                                        <select class="form-select mb-3" name="status"
                                            @error('status') is-invalid @enderror aria-label="Default select example"
                                            id="statusSelect">
                                            <option selected disabled>Select a Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Contractor Engaged">Contractor Engaged</option>
                                            <option value="Non emergency">Non emergency</option>
                                            <option value="Complete" id="completeOption" disabled>Complete</option>
                                            <option value="Contractor already engaged">Contractor already engaged</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea name="summary" id="summary" class="form-control" rows="4" placeholder="Enter summary or description"></textarea>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_concent_email" name="send_concent_email" value="yes">
                                <label class="form-check-label" for="send_concent_email">
                                    Send Consent Form to Caller
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_email" name="send_email" value="yes">
                                <label class="form-check-label" for="send_email">
                                    Details to Caller
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_building_manager_email" name="send_building_manager_email" value="yes">
                                <label class="form-check-label" for="send_building_manager_email">
                                    Details to building manager
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_strata_manager_email" name="send_strata_manager_email" value="yes">
                                <label class="form-check-label" for="send_strata_manager_email">
                                    Details to strata manager
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="send_contractor_email" name="send_contractor_email" value="yes">
                                <label class="form-check-label" for="send_contractor_email">
                                    Details to contractor
                                </label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                    <div class="mt-4">
                        <h4>Pending Calls</h4>
                        <!-- <table class="table table-bordered" id="pendingCallsTable"> -->
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
        $('#buildingSelect').on('change', function() {
            var buildingId = $(this).val();
            var categoryValue = $('#categorySelect').val();

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
</script>
<script>
    document.getElementById('audio_attachment').addEventListener('change', function() {
        let completeOption = document.getElementById('completeOption');
        if (this.files.length > 0) {
            completeOption.removeAttribute('disabled');
        } else {
            completeOption.setAttribute('disabled', 'disabled');
        }
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