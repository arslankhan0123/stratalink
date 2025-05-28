<!DOCTYPE html>
<html>

<head>
    <title>New Call Log Entry</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

    <div style="width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; margin: auto; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <div style="background: #007BFF; color: #ffffff; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; border-radius: 8px 8px 0 0;">
            New Call Log Entry
        </div>

        <!-- Content -->
        <div style="padding: 20px 10px;">

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Caller Name:</strong>
                {{ $data['name'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Caller Email:</strong>
                {{ $data['email'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Summary:</strong>
                {{ $data->summary }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Name:</strong>
                {{ $data->building->name }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Email:</strong>
                {{ $data->building->email }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Address:</strong>
                {{ $data->building->address }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Contractor:</strong>
                {{ $data->contractor->name }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Contractor Phone:</strong>
                {{ $data->contractor->phone }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Caller Phone:</strong>
                {{ $data->number }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Manager:</strong>
                {{ optional($data->building->buildingManager)->name ?? 'N/A' }}
            </div>

            <!-- <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Manager Number:</strong>
                {{ optional($data->building->strataManager)->phone_number ?? 'N/A' }}
            </div> -->

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Strata Manager:</strong>
                {{ optional($data->building->strataManager)->name ?? 'N/A' }}
            </div>

            @if ($concentForm == 'yes')
                @if ($data['email_file'])
                    <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                        <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Signed Consent Form:</strong>
                        <a href="{{ asset('pdfs/' . $data['email_file']) }}" target="_blank">View Signed Consent Form</a>
                    </div>
                @endif
            @endif

            <!-- <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Strata Manager Number:</strong>
                {{ optional($data->building->strataManager)->phone_number ?? 'N/A' }}
            </div> -->

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Created At:</strong>
                {{ \Carbon\Carbon::parse($data['created_at'])->format('F d, Y h:i A') }}
            </div>


        </div>

        <!-- Footer -->
        <div style="text-align: center; padding: 10px; font-size: 12px; color: #666; border-top: 1px solid #ddd; margin-top: 20px;">
            This is an automated email. Please do not reply.
        </div>

    </div>

</body>

</html>
