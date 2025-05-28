<!DOCTYPE html>
<html>

<head>
    <title>After Hours Service Request Acknowledgment</title>
</head>

<body style="font-family: 'Arial', sans-serif; line-height: 1.6; color: #333; background-color: #f8f8f8; padding: 40px 10px 20px 10px; margin: 0;">
    <form action="{{ route('signature.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
                Full Name: <input value="{{ $data['email_agent_name'] }}" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 200px;"> <br><br>
                Apartment Number: <input value="{{ $data['email_aprtment_no'] }}" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 150px;"> <br><br>
                Lot Number: <input value="{{ $data['email_lot_no'] }}" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 100px;">
            </p>

            <p style="margin-top: 30px;"><strong>Resident Declaration:</strong></p>
            <p>
                I have read and understood the terms outlined above and agree to be personally responsible for the contractor costs if the issue reported is not the responsibility of the owners corporation or body corporate.
            </p>

            <p>
                Signature: <input value="{{ $data['email_agent_name'] }}" type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 250px;"> <br><br>
                Date: <input type="text" style="border: none; border-bottom: 2px solid #000; padding: 4px; width: 150px;" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </p>
        </div>
    </form>
</body>

</html>