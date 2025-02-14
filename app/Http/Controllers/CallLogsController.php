<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Repositories\CallLogRepository;
use App\Repositories\DashboardRepository;
use Exception;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
                'audio_attachment' => 'required|file|mimes:mp3,wav|max:10240',
            ]);
            $data = $this->callLogRepo->store($request);
            if ($request->send_email == 'yes') {
                $this->callLogRepo->sendEmail($data);
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
            $this->callLogRepo->update($request, $id);
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
            return redirect()->back()->with('error', 'Signature already exists.');
        }
        // dd($request->signature, $data, $request->signature_token);
        try {
            $data->signature = $request->signature;
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
            $data->email_file = $filename; // Save relative path
            $data->save();

            return redirect()->back()->with('success', 'Signature updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to update signature.' . $exception->getMessage());
        }
    }
}
