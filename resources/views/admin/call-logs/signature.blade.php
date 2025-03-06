<!DOCTYPE html>
<html>
<!-- Bootstrap 4 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 4 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<head>
    <title>New Call Log Entry</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

    <div style="width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; margin: auto; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <!-- Success and Error Alerts -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

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

            <!-- Signature Form -->
            <form action="{{ route('signature.store') }}" method="POST">
                @csrf
                <input type="hidden" name="signature_token" value="{{$data['token']}}" />
                <div class="form-group">
                    <label for="signature" class="form-label" style="font-weight: bold;">Signature:</label>
                    <input type="text" class="form-control" id="signature" name="signature" placeholder="Enter your signature" required>
                </div>

                <!-- <p style="font-size: 50px; font-weight:700; text-align:center">OR</p> -->

                <!-- Signature Pad -->
                <!-- <div class="form-group">
                    <label for="signature-pad" class="form-label" style="font-weight: bold;">Signature Pad:</label>
                    <canvas id="signature-pad" class="border border-dark" style="width: 100%; height: 150px;"></canvas>
                    <input type="hidden" name="signature_image" id="signature-data">
                </div> -->

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <!-- Include Signature Pad Script -->
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
        <script>
            var canvas = document.getElementById('signature-pad');
            var signaturePad = new SignaturePad(canvas);

            // Save Signature as Image Data
            document.getElementById('signature-data').value = signaturePad.toDataURL();
        </script>


    </div>

    <!-- Footer -->
    <div style="text-align: center; padding: 10px; font-size: 12px; color: #666; border-top: 1px solid #ddd; margin-top: 20px;">
        This is an automated email. Please do not reply.
    </div>

    </div>

</body>

</html>