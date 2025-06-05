<?php

namespace App\Http\Controllers;

use App\Mail\CallLogConsentMail;
use App\Mail\CallLogContractorMail;
use App\Models\CallLog;
use App\Models\Manager;
use App\Repositories\CallLogRepository;
use App\Repositories\DashboardRepository;
use Exception;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Twilio\Rest\Client;
use App\Mail\CallLogMail;
use App\Models\Building;
use App\Models\Contractor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CallLogsController extends Controller
{
    protected $callLogRepo, $dashboardRepo;

    /**
     * Method __construct
     *
     * @param CallLogRepository $callLogRepo [explicite description]
     *
     * @return void
     */
    public function __construct(CallLogRepository $callLogRepo, DashboardRepository $dashboardRepo)
    {
        $this->callLogRepo = $callLogRepo;
        $this->dashboardRepo = $dashboardRepo;
    }

    /**
     * Method index
     *
     * @return void
     */
    public function index(Request $request)
    {
        try {
            $call_logs = $this->callLogRepo->all($request);
            return view('admin.call-logs.index', compact('call_logs'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        try {
            $buildings = $this->dashboardRepo->fetchBuildings();
            return view('admin.call-logs.create', compact('buildings'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'audio_attachments' => 'nullable|array',
                'audio_attachments.*' => 'file|mimes:mp3,wav|max:10240', // Each file must meet the rules
            ]);
            $data = $this->callLogRepo->store($request);
            if ($request->send_email == 'yes') {
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'customer_details_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                $this->callLogRepo->sendEmail($data, $concentForm = 'no');
            }

            if ($request->send_building_manager_email == 'yes') {
                $buildingManager = Manager::where('id', $data['building_manager_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'building_manager_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($buildingManager->email)->send(new CallLogMail($data, $concentForm = 'no'));
            }

            if ($request->send_strata_manager_email == 'yes') {
                $buildingManager = Manager::where('id', $data['strata_manager_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);

                DB::table('call_logs')->where('id', $data['id'])->update([
                    'strata_manager_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($buildingManager->email)->send(new CallLogMail($data, $concentForm = 'yes'));
            }

            if ($request->send_contractor_email == 'yes') {
                $contractor = Contractor::where('id', $data['contractor_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);

                DB::table('call_logs')->where('id', $data['id'])->update([
                    'contractor_details_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($contractor->email)->send(new CallLogMail($data, $concentForm = 'no'));
            }

            if ($request->send_concent_email == 'yes') {
                $contractor = Contractor::where('id', $data['contractor_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                $data['token'] = $id_token;
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'token' => $id_token,
                    'updated_at' => now(),
                ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'consent_form_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($data['email'])->send(new CallLogConsentMail($data));
            }

            try {
                $to = '+923044627900';
                // $to = '+61451125816';
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_AUTH_TOKEN');
                $from = env('TWILIO_PHONE_NUMBER');

                $twilio = new Client($sid, $token);

                // If contractor SMS is enabled, prepare message
                if ($request->send_sms_contractor == 'yes') {
                    $contractorNotes = $request->contractor_notes;
                    $callerName = $data['name'];
                    $buildingName = $data['building']['name'];
                    $buildingAddress = $data['building']['address'];
                    $callerPhone = $data['number'];

                    // Format SMS body
                    $message = "Contractor Notification:\n";
                    $message .= "Caller: $callerName\n";
                    $message .= "Phone: $callerPhone\n";
                    $message .= "Building: $buildingName\n";
                    $message .= "Address: $buildingAddress\n";
                    $message .= "Notes: $contractorNotes";
                } else {
                    $message = 'This is a test SMS from your Laravel app.';
                }

                // Send SMS
                $twilio->messages->create($to, [
                    'from' => $from,
                    'body' => $message
                ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'send_sms_contractor' => 'yes',
                    'contractor_notes' => $contractorNotes,
                ]);
                // return back()->with('success', 'SMS sent successfully!');
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
            }


            return redirect()->route('call-logs.index')->with('success', 'Call log created successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Method edit
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function edit($id)
    {
        try {
            $buildings = $this->dashboardRepo->fetchBuildings();
            $call_log = $this->callLogRepo->show($id);
            return view('admin.call-logs.edit', compact('call_log', 'buildings'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    /**
     * Method update
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $this->callLogRepo->update($request, $id);
            if ($request->send_email == 'yes') {
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'customer_details_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                $this->callLogRepo->sendEmail($data, $concentForm = 'no');
            }

            if ($request->send_building_manager_email == 'yes') {
                $buildingManager = Manager::where('id', $data['building_manager_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'building_manager_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($buildingManager->email)->send(new CallLogMail($data, $concentForm = 'no'));
            }

            if ($request->send_strata_manager_email == 'yes') {
                $buildingManager = Manager::where('id', $data['strata_manager_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'strata_manager_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($buildingManager->email)->send(new CallLogMail($data, $concentForm = 'yes'));
            }

            if ($request->send_contractor_email == 'yes') {
                $contractor = Contractor::where('id', $data['contractor_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                // $data['token'] = $id_token;
                // DB::table('call_logs')->where('id', $data['id'])->update([
                //     'token' => $id_token,
                //     'updated_at' => now(),
                // ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'contractor_details_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($contractor->email)->send(new CallLogMail($data, $concentForm = 'no'));
            }

            if ($request->send_concent_email == 'yes') {
                $contractor = Contractor::where('id', $data['contractor_id'])->first();
                $token = Str::uuid()->toString();
                $id_token = $data['id'] . '_' . $token;
                $data['token'] = $id_token;
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'token' => $id_token,
                    'updated_at' => now(),
                ]);
                DB::table('call_logs')->where('id', $data['id'])->update([
                    'consent_form_email_sent' => 'yes',
                    'updated_at' => now(),
                ]);
                Mail::to($data['email'])->send(new CallLogConsentMail($data));
            }

            if ($request->send_sms_contractor == 'yes') {
                try {
                    $to = '+923044627900';
                    // $to = '+61451125816';
                    $sid = env('TWILIO_SID');
                    $token = env('TWILIO_AUTH_TOKEN');
                    $from = env('TWILIO_PHONE_NUMBER');

                    $twilio = new Client($sid, $token);

                    // If contractor SMS is enabled, prepare message
                    if ($request->send_sms_contractor == 'yes') {
                        $contractorNotes = $request->contractor_notes;
                        $callerName = $data['name'];
                        $buildingName = $data['building']['name'];
                        $buildingAddress = $data['building']['address'];
                        $callerPhone = $data['number'];

                        // Format SMS body
                        $message = "Contractor Notification:\n";
                        $message .= "Caller: $callerName\n";
                        $message .= "Phone: $callerPhone\n";
                        $message .= "Building: $buildingName\n";
                        $message .= "Address: $buildingAddress\n";
                        $message .= "Notes: $contractorNotes";
                    } else {
                        $message = 'This is a test SMS from your Laravel app.';
                    }

                    // Send SMS
                    $twilio->messages->create($to, [
                        'from' => $from,
                        'body' => $message
                    ]);
                    DB::table('call_logs')->where('id', $data['id'])->update([
                        'send_sms_contractor' => 'yes',
                        'contractor_notes' => $contractorNotes,
                    ]);
                    // return back()->with('success', 'SMS sent successfully!');
                } catch (\Exception $e) {
                    return back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
                }
            }
            return redirect()->route('call-logs.index')->with('success', 'Call log updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Method destroy
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function destroy($id)
    {
        try {
            $this->callLogRepo->destroy($id);
            return redirect()->route('call-logs.index')->with('success', 'Call log deleted successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed.' . $exception->getMessage());
        }
    }

    public function signature($token)
    {
        try {
            $data = CallLog::where('token', $token)->first();
            return view('admin.call-logs.signature', compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to retrieve call log.' . $exception->getMessage());
        }
    }

    public function signatureUpdate(Request $request)
    {
        $data = CallLog::where('token', $request->signature_token)->first();
        if ($data->signature) {
            return redirect()->back()->with('error', 'Your details already submitted.');
        }
        // dd($request->signature, $data, $request->signature_token);
        try {
            $data->signature = $request->email_agent_name;
            $data->email_lot_no = $request->email_lot_no;
            $data->email_aprtment_no = $request->email_aprtment_no;
            $data->email_agent_name = $request->email_agent_name;
            $data->save();
            $html = view('admin.pdf.signature', compact('data'))->render();


            // Instantiate Dompdf
            $dompdf = new Dompdf();
            // Load HTML content
            $dompdf->loadHtml($html);
            // Set paper size and orientation (optional)
            $dompdf->setPaper('A4', 'portrait');
            // Render the HTML as PDF
            $dompdf->render();
            // Generate filename
            // Generate filename
            $filename = 'Signature_' . $data->id . '_' . time() . '.pdf';

            // Define path to save the file
            $path = public_path('pdfs/' . $filename);

            // Ensure the directory exists
            if (!File::exists(public_path('pdfs'))) {
                File::makeDirectory(public_path('pdfs'), 0777, true, true);
            }

            // Save the PDF file in the public folder
            file_put_contents($path, $dompdf->output());

            // Save filename in the database
            // if (Auth::user()->role_id == 3) {
            //     $data->contractor_email_file = $filename;
            //     // $data->contractor_email_status = 'Accepted';
            //     // Mail::to($data->email)->send(new CallLogContractorMail());
            // } else {
            //     $data->email_file = $filename;
            // }

            $data->email_file = $filename;
            $data->save();

            return redirect()->back()->with('success', 'Thank you for submitting your details.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to update signature.' . $exception->getMessage());
        }
    }

    public function view($id)
    {
        try {
            $buildings = $this->dashboardRepo->fetchBuildings();
            $call_log = $this->callLogRepo->show($id);
            return view('admin.call-logs.view', compact('call_log', 'buildings'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to execute the cron job.' . $exception->getMessage());
        }
    }

    public function deleteAudio($id, $index)
    {
        $callLog = CallLog::findOrFail($id);
        $audioFiles = json_decode($callLog->audio_attachment, true);

        if (is_array($audioFiles) && isset($audioFiles[$index])) {
            $filePath = $audioFiles[$index];

            // Delete file from storage (if exists and using local filesystem)
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }

            // Remove from array and reindex
            unset($audioFiles[$index]);
            $audioFiles = array_values($audioFiles);

            // Update DB
            $callLog->audio_attachment = json_encode($audioFiles);
            $callLog->save();

            return back()->with('success', 'Audio file deleted successfully.');
        }

        return back()->with('error', 'Audio file not found.');
    }

    public function sendSms(Request $request, $id)
    {
        $to = '+923044627900';

        // Twilio credentials from .env
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_PHONE_NUMBER');

        try {
            $twilio = new Client($sid, $token);

            $twilio->messages->create($to, [
                'from' => $from,
                'body' => 'This is a test SMS from your Laravel app.'
            ]);

            return back()->with('success', 'SMS sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            CallLog::whereIn('id', $ids)->delete();
            return back()->with('success', 'Selected call logs deleted successfully.');
        }

        return back()->with('error', 'No call logs selected.');
    }
}
