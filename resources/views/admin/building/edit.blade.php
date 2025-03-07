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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Building Manager</label>
                                    <select class="form-select" aria-label="Default select example" name="building_manager_id">
                                        <option selected>Select a Building Manager</option>
                                        @foreach ($buildingManagers as $manager)
                                        <option value="{{ $manager->id }}"
                                            {{ $building->building_manager_id == $manager->id ? 'selected' : '' }}>
                                            {{ ucfirst($manager->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('managers.create', ['type' => 'Building Manager', 'buildingId' => $building->id]) }}" class="btn btn-link">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>

                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Select Strata Manager</label>
                                    <select class="form-select" aria-label="Default select example" name="strata_manager_id">
                                        <option selected>Select a Strata Manager</option>
                                        @foreach ($strataManagers as $manager)
                                        <option value="{{ $manager->id }}"
                                            {{ $building->strata_manager_id == $manager->id ? 'selected' : '' }}>
                                            {{ ucfirst($manager->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <a href="{{route('managers.create', ['type' => 'Strata Manager', 'buildingId' => $building->id])}}" class="btn btn-link">
                                    <i class="fas fa-plus"></i> <!-- Font Awesome + icon -->
                                </a>
                            </div>
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
                            <!-- <div class="col-md-6">
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
                            </div> -->
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
                                    <label class="form-label" for="formrow-sp_no-input">Sp.No</label>
                                    <input type="text" class="form-control @error('sp_no') is-invalid @enderror"
                                        name="sp_no" value="{{ $building->sp_no }}" id="formrow-sp_no-input">
                                    @error('sp_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                                    <label class="form-label" for="formrow-email-input">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $building->address }}" name="address" id="formrow-address-input">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Lots</label>
                                    <input type="text" class="form-control @error('lots') is-invalid @enderror"
                                        value="{{ $building->lots }}" name="lots" id="formrow-lots-input">
                                    @error('lots')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Total Lots</label>
                                    <input type="text" class="form-control @error('total_lots') is-invalid @enderror"
                                        value="{{ $building->total_lots }}" name="total_lots" id="formrow-total_lots-input">
                                    @error('total_lots')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Commercial Lots</label>
                                    <input type="text" class="form-control @error('commercial_lots') is-invalid @enderror"
                                        value="{{ $building->commercial_lots }}" name="commercial_lots" id="formrow-commercial_lots-input">
                                    @error('commercial_lots')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Amenities</label>
                                    <input type="text" class="form-control @error('amenities') is-invalid @enderror"
                                        value="{{ $building->amenities }}" name="amenities" id="formrow-amenities-input">
                                    @error('amenities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Visitors Parking</label>
                                    <input type="text" class="form-control @error('visitors_parking') is-invalid @enderror"
                                        value="{{ $building->visitors_parking }}" name="visitors_parking" id="formrow-visitors_parking-input">
                                    @error('visitors_parking')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Gymnasium</label>
                                    <input type="text" class="form-control @error('gymnasium') is-invalid @enderror"
                                        value="{{ $building->gymnasium }}" name="gymnasium" id="formrow-gymnasium-input">
                                    @error('gymnasium')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Tennis Court</label>
                                    <input type="text" class="form-control @error('tennis_court') is-invalid @enderror"
                                        value="{{ $building->tennis_court }}" name="tennis_court" id="formrow-tennis_court-input">
                                    @error('tennis_court')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Other</label>
                                    <input type="text" class="form-control @error('other') is-invalid @enderror"
                                        value="{{ $building->other }}" name="other" id="formrow-other-input">
                                    @error('other')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Waste Management</label>
                                    <input type="text" class="form-control @error('waste_management') is-invalid @enderror"
                                        value="{{ $building->waste_management }}" name="waste_management" id="formrow-waste_management-input">
                                    @error('waste_management')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Resident Garbage</label>
                                    <input type="text" class="form-control @error('resident_garbage') is-invalid @enderror"
                                        value="{{ $building->resident_garbage }}" name="resident_garbage" id="formrow-resident_garbage-input">
                                    @error('resident_garbage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Green Waste</label>
                                    <input type="text" class="form-control @error('green_waste') is-invalid @enderror"
                                        value="{{ $building->green_waste }}" name="green_waste" id="formrow-green_waste-input">
                                    @error('green_waste')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Spare Keys</label>
                                    <input type="text" class="form-control @error('spare_keys') is-invalid @enderror"
                                        value="{{ $building->spare_keys }}" name="spare_keys" id="formrow-spare_keys-input">
                                    @error('spare_keys')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Registered Keys</label>
                                    <input type="text" class="form-control @error('registered_keys') is-invalid @enderror"
                                        value="{{ $building->registered_keys }}" name="registered_keys" id="formrow-registered_keys-input">
                                    @error('registered_keys')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Lock Out</label>
                                    <input type="text" class="form-control @error('lock_out') is-invalid @enderror"
                                        value="{{ $building->lock_out }}" name="lock_out" id="formrow-lock_out-input">
                                    @error('lock_out')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">No Lifts</label>
                                    <input type="text" class="form-control @error('no_lifts') is-invalid @enderror"
                                        value="{{ $building->no_lifts }}" name="no_lifts" id="formrow-no_lifts-input">
                                    @error('no_lifts')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Contractor Keys</label>
                                    <input type="text" class="form-control @error('contractor_keys') is-invalid @enderror"
                                        value="{{ $building->contractor_keys }}" name="contractor_keys" id="formrow-contractor_keys-input">
                                    @error('contractor_keys')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Hours Keys</label>
                                    <input type="text" class="form-control @error('hours_keys') is-invalid @enderror"
                                        value="{{ $building->hours_keys }}" name="hours_keys" id="formrow-hours_keys-input">
                                    @error('hours_keys')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Gas Meter Location</label>
                                    <input type="text" class="form-control @error('gas_meter_location') is-invalid @enderror"
                                        value="{{ $building->gas_meter_location }}" name="gas_meter_location" id="formrow-gas_meter_location-input">
                                    @error('gas_meter_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Electricity Meter Location</label>
                                    <input type="text" class="form-control @error('electricity_meter_location') is-invalid @enderror"
                                        value="{{ $building->electricity_meter_location }}" name="electricity_meter_location" id="formrow-electricity_meter_location-input">
                                    @error('electricity_meter_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Site Hours</label>
                                    <input type="text" class="form-control @error('site_hours') is-invalid @enderror"
                                        value="{{ $building->site_hours }}" name="site_hours" id="formrow-site_hours-input">
                                    @error('site_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-company-input">Company</label>
                                    <input type="text" class="form-control @error('company') is-invalid @enderror"
                                        name="company" value="{{ $building->company }}" id="formrow-company-input">
                                    @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
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