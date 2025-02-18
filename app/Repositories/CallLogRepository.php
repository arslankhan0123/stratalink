<?php

namespace App\Repositories;

use App\Mail\CallLogMail;
use App\Models\Building;
use App\Models\CallLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CallLogRepository
{
    /**
     * Method all
     *
     * @return void
     */
    public function all($request)
    {
        if (Auth::user()->role_id == 3) {
            $buildingIds = Building::where('user_id', Auth::user()->id)->pluck('id');
            $data = CallLog::whereIn('building_id', $buildingIds)->get();
        } else {
            $data = CallLog::all();
        }
        return $data;
        // return CallLog::with('contractor:id,name')->ApplyFilter(
        //     $request->only([''])
        // )->get();
    }

    /**
     * Method store
     *
     * @param $request $request [explicite description]
     *
     * @return void
     */
    public function store($request)
    {
        // $audioFile = $request->file('audio_attachment');
        // $audioName = time() . '_' . $audioFile->getClientOriginalName();
        // $audioPath = 'audio/' . $audioName; // Path relative to public

        // // Move the file to the public/audio directory
        // $audioFile->move(public_path('audio'), $audioName);

        $audioFile = $request->file('audio_attachment');
        $audioName = time() . '_' . $audioFile->getClientOriginalName();
        $audioPath = 'audio/' . $audioName; // Path relative to public

        // Move the file to the public/audio directory
        $audioFile->move(public_path('audio'), $audioName);

        $data = CallLog::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'manager_id' => $request->input('manager_id'),
            'building_id' => $request->input('building_id'),
            'number' => $request->input('number'),
            'building_manager' => $request->input('building_manager'),
            'strata_manager' => $request->input('strata_manager'),
            'contractor_id' => $request->input('contractor_id'),
            'summary' => $request->input('summary'),
            'status' => $request->input('status'),
            'audio_attachment' => $audioPath, // Store the path in the database
        ]);

        return $data;
    }

    /**
     * Method show
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function show($id)
    {
        return CallLog::with('building:id,name,manager_id')->find($id);
    }

    /**
     * Method update
     *
     * @param $request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function update($request, $id)
    {
        // $audioPath = $request->file('audio_attachment')->store('public/audio');
        $audioFile = $request->file('audio_attachment');

        if ($audioFile) {
            $audioName = time() . '_' . $audioFile->getClientOriginalName();
            $audioPath = 'audio/' . $audioName; // Path relative to public

            // Move the file to the public/audio directory
            $audioFile->move(public_path('audio'), $audioName);

            // Find the call log
            $call_log = CallLog::find($id);

            if ($call_log) {
                // Update the existing call log
                $call_log->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'manager_id' => $request->input('manager_id'),
                    'building_id' => $request->input('building_id'),
                    'number' => $request->input('number'),
                    'building_manager' => $request->input('building_manager'),
                    'strata_manager' => $request->input('strata_manager'),
                    'contractor_id' => $request->input('contractor_id'),
                    'summary' => $request->input('summary'),
                    'status' => $request->input('status'),
                    'audio_attachment' => $audioPath, // Make sure this variable has a value
                ]);

                return response()->json(['message' => 'Call log updated successfully']);
            } else {
                return response()->json(['error' => 'Call log not found'], 404);
            }

            // $call_log->update([
            //     'audio_attachment' => $audioPath, // Storing relative path
            //     'summary' => $request->input('summary'),
            // ]);
        }

        return response()->json(['message' => 'Call log updated successfully!']);
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
        CallLog::destroy($id);
    }

    public function sendEmail($data)
    {
        $email = $data['email'];
        $token = Str::uuid()->toString();
        $id_token = $data->id . '_' . $token;
        $data['token'] = $id_token;
        DB::table('call_logs')->where('id', $data->id)->update([
            'token' => $id_token,
            'updated_at' => now(),
        ]);
        Mail::to($email)->send(new CallLogMail($data));
    }
}
