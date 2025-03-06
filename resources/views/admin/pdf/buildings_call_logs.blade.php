<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildings & Call Logs Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Buildings & Call Logs Report</h2>

    {{-- Buildings Table --}}
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

    {{-- Page Break for PDF --}}
    <!-- <div class="page-break"></div> -->

    {{-- Call Logs Table --}}
    <div class="section-title">Call Logs</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Building ID</th>
                <!-- <th>Contractor</th> -->
                <th>Number</th>
                <th>Summary</th>
                <th>Status</th>
                <th>Created By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($callLogs as $log)
            <tr>
                <td>{{ $log->name }}</td>
                <td>{{ $log->email }}</td>
                <td>{{ $log->building_id }}</td>
                <!-- <td>{{ $log->contractor }}</td> -->
                <td>{{ $log->number }}</td>
                <td>{{ $log->summary }}</td>
                <td>{{ $log->status }}</td>
                <td>{{ $log->created_by }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>