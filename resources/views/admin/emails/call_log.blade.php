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
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Name:</strong>
                {{ $data['name'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Email:</strong>
                {{ $data['email'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building ID:</strong>
                {{ $data['building_id'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Contractor:</strong>
                {{ $data['contractor'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Building Manager:</strong>
                {{ $data['building_manager'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Strata Manager:</strong>
                {{ $data['strata_manager'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Number:</strong>
                {{ $data['number'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Send Email:</strong>
                {{ $data['send_email'] }}
            </div>

            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-left: 4px solid #007BFF;">
                <strong style="color: #333; display: block; margin-bottom: 5px; font-size: 14px;">Created At:</strong>
                {{ \Carbon\Carbon::parse($data['created_at'])->format('F d, Y h:i A') }}
            </div>

            <!-- Button -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('call-logs.signature', ['token' => $data['token']]) }}" style="display: inline-block; background: #007BFF; color: #ffffff; text-decoration: none; padding: 12px 20px; font-size: 16px; border-radius: 5px; font-weight: bold;">
                    View Details
                </a>
            </div>

        </div>

        <!-- Footer -->
        <div style="text-align: center; padding: 10px; font-size: 12px; color: #666; border-top: 1px solid #ddd; margin-top: 20px;">
            This is an automated email. Please do not reply.
        </div>

    </div>

</body>

</html>
