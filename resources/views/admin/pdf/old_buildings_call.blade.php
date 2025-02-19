<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildings & Call Logs Report</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 20px; padding: 0; background-color: #f8f9fa;">

    <!-- Buildings Table -->
    <div style="width: 100%; margin-bottom: 20px; background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; background: #007bff; color: white; padding: 10px; border-radius: 5px;">Buildings Table</h2>
        <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; border-radius: 5px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #343a40; color: white;">
                        <th style="padding: 8px;">Client Name</th>
                        <th style="padding: 8px;">Building Name</th>
                        <th style="padding: 8px;">Company</th>
                        <th style="padding: 8px;">Mobile</th>
                        <th style="padding: 8px;">Email</th>
                        <th style="padding: 8px;">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buildings as $building)
                    <tr style="border-bottom: 1px solid #ddd; background: #f9f9f9;">
                        <td style="padding: 8px;">{{ $building->user->name }}</td>
                        <td style="padding: 8px;">{{ $building->name }}</td>
                        <td style="padding: 8px;">{{ $building->company }}</td>
                        <td style="padding: 8px;">{{ $building->mobile }}</td>
                        <td style="padding: 8px;">{{ $building->email }}</td>
                        <td style="padding: 8px;">{{ $building->category }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Call Logs Table -->
    <div style="width: 100%; background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; background: #28a745; color: white; padding: 10px; border-radius: 5px;">Call Logs Table</h2>
        <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; border-radius: 5px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #343a40; color: white;">
                        <th style="padding: 8px;">Name</th>
                        <th style="padding: 8px;">Building Name</th>
                        <th style="padding: 8px;">Number</th>
                        <th style="padding: 8px;">Building Manager</th>
                        <th style="padding: 8px;">Strata Manager</th>
                        <th style="padding: 8px;">Contractor</th>
                        <th style="padding: 8px;">Summary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($callLogs as $call_log)
                    <tr style="border-bottom: 1px solid #ddd; background: #f9f9f9;">
                        <td style="padding: 8px;">{{ $call_log->name }}</td>
                        <td style="padding: 8px;">{{ $call_log->building->name }}</td>
                        <td style="padding: 8px;">{{ $call_log->number }}</td>
                        <td style="padding: 8px;">{{ $call_log->building_manager }}</td>
                        <td style="padding: 8px;">{{ $call_log->strata_manager }}</td>
                        <td style="padding: 8px;">{{ $call_log->contractor->name ?? '' }}</td>
                        <td style="padding: 8px;">{{ $call_log->summary ?? '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>