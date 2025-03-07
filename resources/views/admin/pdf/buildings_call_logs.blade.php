<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call Logs Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .call-log-container {
            border: 2px solid #000;
            margin-bottom: 15px;
            padding: 10px;
        }

        .call-header {
            background-color: #004080;
            color: white;
            padding: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        .call-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            table-layout: fixed;
            word-wrap: break-word;
        }

        .call-details td,
        .call-details th {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        .status-section {
            background-color: #004080;
            color: white;
            padding: 5px;
            font-weight: bold;
            margin-top: 10px;
        }

        .status-box {
            padding: 5px;
            border: 1px solid #ddd;
        }

        .contractor-section {
            margin-top: 10px;
            padding: 5px;
            border: 1px solid #000;
            font-weight: bold;
        }

        .strata-manager {
            background-color: #004080;
            color: white;
            padding: 5px;
            font-weight: bold;
            margin-top: 10px;
        }

        .manager-name {
            padding: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <!-- <h2 style="text-align: center;">Buildings & Call Logs Report</h2>

    Buildings Table
    <div class="section-title">Buildings</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Category</th>
                <th>Manager ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
            <tr>
                <td>{{ $building->name }}</td>
                <td>{{ $building->company }}</td>
                <td>{{ $building->mobile }}</td>
                <td>{{ $building->email }}</td>
                <td>{{ $building->category }}</td>
                <td>{{ $building->manager_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    Page Break for PDF
    <div class="page-break"></div> -->





    <div class="header">Call Logs Report</div>

    @foreach ($callLogs as $log)
    <div class="call-log-container">
        <div class="call-header">Call #{{ $loop->iteration }}</div>

        <div class="table-container">
            <table class="call-details">
                <tr>
                    <th>Date</th>
                    <th>Building Name</th>
                    <th>Contact Person</th>
                    <th>Contact Email</th>
                    <th>Status</th>
                    <th>Numbers</th>
                    <th>Building Address</th>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y') }}</td>
                    <td>{{ $log->building->name }}</td>
                    <td>{{ $log->name }}</td>
                    <td>{{ $log->email }}</td>
                    <td>{{ $log->status }}</td>
                    <td>{{ $log->number }}</td>
                    <td>{{ $log->building->address }}</td>
                </tr>
            </table>
        </div>

        <!-- <div class="status-section">Status</div>
        <div class="status-box">
            ✅ {{ $log->status }}
        </div> -->

        <div class="status-section">Call Notes:</div>
        <div class="status-box">
            {{ $log->summary }}
        </div>

        <div class="contractor-section">Contractor Name: Chrome Plumbing</div>

        <div class="strata-manager">Strata Manager</div>
        <div class="manager-name">John XYZ</div>
    </div>
    @endforeach

</body>

</html>