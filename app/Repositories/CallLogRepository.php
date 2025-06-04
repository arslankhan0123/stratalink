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
            // $data = CallLog::whereIn('building_id', $buildingIds)->get();
            $query = CallLog::whereIn('building_id', $buildingIds);

            if (request()->has('status')) {

                if ($request->status == '1') {
                    $query->whereIn('status', ['Non emergency', 'Completed']);
                } else if ($request->status == '3') {
                    $query->where('status', 'Non emergency');
                } else if ($request->status == '2') {
                    $query->whereIn('status', ['Non emergency', 'Completed', 'Pending', 'Contractor Engaged', 'Contractor already engaged']);
                } else {
                    $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
                }
                // $query->where('status', $request->status);
            } else {
                $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
            }

            $data = $query->get();
        } elseif (Auth::user()->role_id == 2) {
            // $data = CallLog::where('created_by', Auth::user()->id)->get();
            $query = CallLog::where('created_by', Auth::id());
            if (request()->has('status')) {

                if ($request->status == '1') {
                    $query->whereIn('status', ['Non emergency', 'Completed']);
                } else if ($request->status == '3') {
                    $query->where('status', 'Non emergency');
                } else if ($request->status == '2') {
                    $query->whereIn('status', ['Non emergency', 'Completed', 'Pending', 'Contractor Engaged', 'Contractor already engaged']);
                } else {
                    $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
                }
                // $query->where('status', $request->status);
            } else {
                $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
            }

            $data = $query->get();
        } else {
            $query = CallLog::query();
            if (request()->has('status')) {

                if ($request->status == '1') {
                    $query->whereIn('status', ['Non emergency', 'Completed']);
                } else if ($request->status == '3') {
                    $query->where('status', 'Non emergency');
                } else if ($request->status == '2') {
                    $query->whereIn('status', ['Non emergency', 'Completed', 'Pending', 'Contractor Engaged', 'Contractor already engaged']);
                } else {
                    $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
                }
                // $query->where('status', $request->status);
            } else {
                $query->whereIn('status', ['Pending', 'Contractor Engaged', 'Contractor already engaged']);
            }

            $data = $query->get();
            // $data = CallLog::all();
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

        $audioPaths = [];
        if ($request->hasFile('audio_attachment')) {
            foreach ($request->file('audio_attachment') as $audioFile) {
                $audioName = time() . '_' . $audioFile->getClientOriginalName();
                $audioPath = 'audio/' . $audioName;

                // Move file to public/audio
                $audioFile->move(public_path('audio'), $audioName);

                // Collect file path
                $audioPaths[] = $audioPath;
            }
        }

        // Store as JSON in DB or handle differently
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
            'strata_manager_id' => $request->input('strata_manager_id'),
            'call_time' => $request->input('call_time'),
            'total_time_spent_on_call' => $request->input('total_time_spent_on_call'),
            'building_manager_id' => $request->input('building_manager_id'),
            'audio_attachment' => json_encode($audioPaths), // Store paths as JSON array
            'call_date' => $request->input('call_date'),
            'category' => $request->input('category'),
        ]);

        return $data;

        // if ($request->file('audio_attachment')) {
        //     $audioFile = $request->file('audio_attachment');
        //     $audioName = time() . '_' . $audioFile->getClientOriginalName();
        //     $audioPath = 'audio/' . $audioName; // Path relative to public

        //     // Move the file to the public/audio directory
        //     $audioFile->move(public_path('audio'), $audioName);
        // }

        // $data = CallLog::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'manager_id' => $request->input('manager_id'),
        //     'building_id' => $request->input('building_id'),
        //     'number' => $request->input('number'),
        //     'building_manager' => $request->input('building_manager'),
        //     'strata_manager' => $request->input('strata_manager'),
        //     'contractor_id' => $request->input('contractor_id'),
        //     'summary' => $request->input('summary'),
        //     'status' => $request->input('status'),
        //     'strata_manager_id' => $request->input('strata_manager_id'),
        //     'call_time' => $request->input('call_time'),
        //     'total_time_spent_on_call' => $request->input('total_time_spent_on_call'),
        //     'building_manager_id' => $request->input('building_manager_id'),
        //     'audio_attachment' => $audioPath ?? null, // Store the path in the database
        //     'call_date' => $request->input('call_date'),
        //     'category' => $request->input('category'),
        // ]);

        // return $data;
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
        // Find the call log
        $call_log = CallLog::find($id);

        if (!$call_log) {
            return response()->json(['error' => 'Call log not found'], 404);
        }

        // Update the base fields
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
            'status' => $request->status,
            'strata_manager_id' => $request->input('strata_manager_id'),
            'building_manager_id' => $request->input('building_manager_id'),
            'call_time' => $request->input('call_time'),
            'total_time_spent_on_call' => $request->input('total_time_spent_on_call'),
            'call_date' => $request->input('call_date'),
            'category' => $request->input('category'),
        ]);

        // Handle multiple audio attachments
        // if ($request->hasFile('audio_attachment')) {
        //     $call_log->audio_attachment = NULL;
        //     $call_log->save();
        //     $newAudioPaths = [];
        //     foreach ($request->file('audio_attachment') as $audioFile) {
        //         $audioName = time() . '_' . $audioFile->getClientOriginalName();
        //         $audioFile->move(public_path('audio'), $audioName);
        //         $newAudioPaths[] = 'audio/' . $audioName;
        //     }

        //     // Merge with existing attachments (if any)
        //     $existingAudioPaths = $call_log->audio_attachment ? json_decode($call_log->audio_attachment, true) : [];
        //     $mergedAudioPaths = array_merge($existingAudioPaths ?: [], $newAudioPaths);

        //     // Update field and save
        //     $call_log->audio_attachment = json_encode($mergedAudioPaths);
        //     $call_log->save();
        // }

        if ($request->hasFile('audio_attachment')) {
            $newAudioPaths = [];
            foreach ($request->file('audio_attachment') as $audioFile) {
                $audioName = time() . '_' . $audioFile->getClientOriginalName();
                // Ensure the directory exists
                $uploadPath = public_path('audio');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true); // Create directory if it doesn't exist
                }
                $audioFile->move($uploadPath, $audioName);
                $newAudioPaths[] = 'audio/' . $audioName; // Store path relative to public directory
            }

            // Get existing attachments (if any)
            $existingAudioPaths = []; // Initialize as an empty array by default

            if ($call_log->audio_attachment) { // Check if the database field is not null or empty
                $decodedPaths = json_decode($call_log->audio_attachment, true);
                // Ensure that json_decode actually returned an array (or not null)
                if (is_array($decodedPaths)) {
                    $existingAudioPaths = $decodedPaths;
                }
                // If json_decode returns null or false (invalid JSON), existingAudioPaths remains an empty array
            }

            // Merge new paths with existing paths
            // Both $existingAudioPaths and $newAudioPaths are now guaranteed to be arrays
            $mergedAudioPaths = array_merge($existingAudioPaths, $newAudioPaths);

            // Update field and save
            $call_log->audio_attachment = json_encode($mergedAudioPaths);
            $call_log->save();
        }

        return $call_log;
    }
    // public function update($request, $id)
    // {
    //     // Find the call log
    //     $call_log = CallLog::find($id);

    //     if ($call_log) {
    //         // Update the existing call log
    //         $call_log->update([
    //             'name' => $request->input('name'),
    //             'email' => $request->input('email'),
    //             'manager_id' => $request->input('manager_id'),
    //             'building_id' => $request->input('building_id'),
    //             'number' => $request->input('number'),
    //             'building_manager' => $request->input('building_manager'),
    //             'strata_manager' => $request->input('strata_manager'),
    //             'contractor_id' => $request->input('contractor_id'),
    //             'summary' => $request->input('summary'),
    //             'status' => $request->status,
    //             'strata_manager_id' => $request->input('strata_manager_id'),
    //             'building_manager_id' => $request->input('building_manager_id'),
    //             // 'audio_attachment' => $audioPath ?? $request->audio_attachment,
    //             'call_time' => $request->input('call_time'),
    //             'total_time_spent_on_call' => $request->input('total_time_spent_on_call'),
    //             'call_date' => $request->input('call_date'),
    //             'category' => $request->input('category'),
    //         ]);
    //         if ($request->file('audio_attachment')) {
    //             // $audioPath = $request->file('audio_attachment')->store('public/audio');
    //             $audioFile = $request->file('audio_attachment');

    //             $audioName = time() . '_' . $audioFile->getClientOriginalName();
    //             $audioPath = 'audio/' . $audioName; // Path relative to public

    //             // Move the file to the public/audio directory
    //             $audioFile->move(public_path('audio'), $audioName);
    //             $call_log->audio_attachment = $audioPath;
    //             $call_log->save();
    //         }
    //         return $call_log;
    //         // return response()->json(['message' => 'Call log updated successfully']);
    //     } else {
    //         return response()->json(['error' => 'Call log not found'], 404);
    //     }

    //     // $call_log->update([
    //     //     'audio_attachment' => $audioPath, // Storing relative path
    //     //     'summary' => $request->input('summary'),
    //     // ]);

    //     return response()->json(['message' => 'Call log updated successfully!']);
    // }


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

    public function sendEmail($data, $concentForm)
    {
        $email = $data['email'];
        $token = Str::uuid()->toString();
        $id_token = $data->id . '_' . $token;
        // $data['token'] = $id_token;
        // DB::table('call_logs')->where('id', $data->id)->update([
        //     'token' => $id_token,
        //     'updated_at' => now(),
        // ]);
        Mail::to($email)->send(new CallLogMail($data, $concentForm));
    }
}
