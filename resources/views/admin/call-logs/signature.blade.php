<!DOCTYPE html>
<html>

<head>
    <title>After Hours Service Request Acknowledgment</title>
</head>

<body style="font-family: 'Arial', sans-serif; line-height: 1.6; color: #333; background-color: #f8f8f8; padding: 40px 10px 20px 10px; margin: 0;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @if (session('success'))
    <div style="max-width: 600px; margin: 20px auto;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div style="max-width: 600px; margin: 20px auto;">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <form action="{{ route('signature.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="signature_token" value="{{$data['token']}}" />
        <div style="max-width: 600px; background: #fff; padding: 25px; margin: auto; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); font-size: 16px;">
            <p style="margin-bottom: 15px;">
                This document serves as formal acknowledgment that the undersigned resident has requested assistance from the After Hours Team for an urgent issue that cannot be delayed until the next business day.
            </p>

            <ul style="margin-bottom: 15px;">
                <li>If the issue is found to be unrelated to common property or is the responsibility of the lot owner, the resident who requested the service will be responsible for the contractor’s call-out fee and any related charges.</li>
                <li>Common property typically includes shared infrastructure and areas maintained by the owners corporation or body corporate. Items within the lot—such as internal plumbing, electrical systems, or fixtures—are usually the responsibility of the lot owner.</li>
                <li>This policy helps ensure after-hours resources are used responsibly and prevent unnecessary costs to the owners corporation.</li>
            </ul>

            <p style="margin-bottom: 15px;">
                By signing this form, the resident confirms and agrees to the following:
            </p>

            <ol style="margin-bottom: 15px;">
                <li>I acknowledge that the issue I am reporting requires urgent attention and cannot be postponed until the next business day.</li>
                <li>I authorize the After Hours Management Team to engage a contractor to attend and investigate/rectify the issue.</li>
                <li>I accept full responsibility for any associated costs if the issue is determined not to be a common property matter.</li>
            </ol>

            <p style="margin-bottom: 15px;"><strong>Resident Details (To be completed by the caller):</strong></p>
            <p>
                Full Name: <input name="email_agent_names" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 200px;"> <br><br>
                Apartment Number: <input name="email_aprtment_no" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 150px;"> <br><br>
                Lot Number: <input name="email_lot_no" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 100px;">
            </p>

            <p style="margin-top: 30px;"><strong>Resident Declaration:</strong></p>
            <p>
                I have read and understood the terms outlined above and agree to be personally responsible for the contractor costs if the issue reported is not the responsibility of the owners corporation or body corporate.
            </p>

            <p>
                Signature: <input name="email_agent_name" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 250px;"> <br><br>
                Date: <input disabled readonly type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 150px;" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </p>

            <div style="text-align: center; margin-top: 30px;">
                <button style="display: inline-block; background: #007BFF; color: #ffffff; text-decoration: none; padding: 12px 20px; font-size: 16px; border-radius: 5px; font-weight: bold;" type="submit" class="btn btn-primary w-md">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
<!-- ✅ jQuery (Load Before DataTables JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toaster script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if (Session::has('success'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('success') }}")
</script>
@endif

@if (Session::has('error'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}")
</script>
@endif