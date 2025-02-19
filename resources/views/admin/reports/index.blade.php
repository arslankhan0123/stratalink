@extends('layouts.main')
{{-- <link rel="stylesheet" id="bootstrap-style" href="{{ asset('tmp/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/icons.min.css') }}">
<link rel="stylesheet" id="app-style" href="{{ asset('tmp/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('tmp/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tmp/css/mermaid.min.css') }}" /> --}}
{{-- <script src="{{ asset('tmp/js/3.7.1-jquery.min.js') }}"></script> --}}

@section('title', 'Reports')
@section('breadcrumbTitle', 'Reports')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Reports</li>
@endsection
@section('content')
@if (Auth::user()->role_id == 1)
<!-- Dropdown Section -->
<div class="d-flex justify-content-between align-items-center my-3">
    <!-- <label for="report-type" class="me-2 fw-bold">Select Report Type:</label> -->
    <select id="report-type" class="form-select" onchange="window.location.href=this.value">
        <option selected disabled>Select Client</option>
        @foreach ($clients as $client)
        <option value="{{ route('reports.index', ['client_id' => $client->id]) }}">
            {{ $client->name }}
        </option>
        @endforeach
    </select>
</div>
@endif
<!-- <div class="d-flex justify-content-between align-items-center my-3">
    <label for="report-type" class="me-2 fw-bold">Select Report Type:</label>
    <select id="report-type" class="form-select w-auto">
        <option value="summary">Summary Report</option>
        <option value="detailed">Detailed Report</option>
        <option value="monthly">Monthly Report</option>
        <option value="custom">Custom Report</option>
    </select>
</div> -->
<a href="{{ route('reports.export.pdf', ['buildings' => $buildings]) }}" class="btn btn-danger mb-2">Export PDF</a>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title shine">Buildings Table</h4>
            </div>
            <div class="card-body">
                <!-- Scrollable Table -->
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table id="custom-table" class="table table-striped table-bordered">
                        <thead class="table-header" style="position: sticky; top: 0; background: white; z-index: 2;">
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Client Name</th>
                                <th>Building Name</th>
                                <th>Company</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buildings as $building)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{$building->user->name}}</td>
                                <td>{{$building->name}}</td>
                                <td>{{$building->company}}</td>
                                <td>{{$building->mobile}}</td>
                                <td>{{$building->email}}</td>
                                <td>{{$building->category}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call Logs Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title shine">Call Logs Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table id="custom-table" class="table table-striped table-bordered">
                        <thead class="table-header" style="position: sticky; top: 0; background: white; z-index: 2;">
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Name</th>
                                <th>Building Name</th>
                                <th>Number</th>
                                <th>Building Manager</th>
                                <th>Strata Manager</th>
                                <th>Contractor</th>
                                <th>PDF File</th>
                                <th>Summary</th>
                                <th>Attachment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($call_logs as $call_log)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $call_log->name }}</td>
                                <td>{{ $call_log->building->name }}</td>
                                <td>{{ $call_log->number }}</td>
                                <td>{{ $call_log->building_manager }}</td>
                                <td>{{ $call_log->strata_manager }}</td>
                                <td>{{ $call_log->contractor->name ?? '' }}</td>
                                <td>
                                    @if ($call_log->email_file)
                                    <a href="{{ asset('pdfs/' . $call_log->email_file) }}" target="_blank">View PDF</a>
                                    @else
                                    No file available
                                    @endif
                                </td>
                                <td>{{ $call_log->summary ?? '' }}</td>
                                <td>
                                    @if ($call_log->audio_attachment)
                                    <audio controls>
                                        <source src="{{ asset('attachments/' . $call_log->audio_attachment) }}" type="audio/mpeg">
                                    </audio>
                                    @else
                                    No attachment
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('tmp/js/custom.js') }}"></script>
@endsection