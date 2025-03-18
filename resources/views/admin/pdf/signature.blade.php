<!DOCTYPE html>
<html>

<head>
    <title>Authorization Email</title>
</head>

<body style="font-family: 'Arial', sans-serif; line-height: 1.6; color: #333; background-color: #f8f8f8; padding: 40px 10px 20px 10px; margin: 0;">
    <div style="max-width: 550px; background: #fff; padding: 25px; margin: auto; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); font-size: 16px;">
        <form action="{{ route('signature.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="signature_token" value="{{$data['token']}}" />
            <p style="margin-bottom: 15px;">
                I
                <input type="text" style="border: none; border-bottom: 2px solid #000; padding: 5px; width: 180px; outline: none; font-size: 15px; font-family: 'Arial', sans-serif;" value="{{ $data['email_agent_name'] }}" name="email_agent_name" placeholder="Your Name">,
                the Real estate agent/Owner of apartment
                <input type="text" style="border: none; border-bottom: 2px solid #000; padding: 5px; width: 180px; outline: none; font-size: 15px; font-family: 'Arial', sans-serif;" value="{{ $data['email_aprtment_no'] }}" name="email_aprtment_no" placeholder="Apartment No">,
                Lot no
                <input type="text" style="border: none; border-bottom: 2px solid #000; padding: 5px; width: 80px; outline: none; font-size: 15px; font-family: 'Arial', sans-serif;" value="{{ $data['email_lot_no'] }}" name="email_lot_no" placeholder="Lot No">
                authorise the building manager to organise the contractor for us to investigate the reported issue from us.
            </p>
            <p style="margin-bottom: 15px;">
                We acknowledge that if the issue does not fall under the Owners corporation responsibility to rectify,
                we will have to pay the outcall service charge out of our pocket,
                or the service charges will be added to the Owners levy account.
            </p>
            <p>
                We acknowledge and understand this statement and would like the building manager to organise the inspection/repair for us.
            </p>
        </form>
    </div>
</body>

</html>