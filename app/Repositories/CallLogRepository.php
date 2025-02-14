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
        $audioPath = $request->file('audio_attachment')->store('public/audio');
        $data = CallLog::create($request->all(), [
            'audio_attachment' => Storage::url($audioPath),
            'summary' => $request->input('summary'),
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
        return CallLog::with('building:id,name')->find($id);
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
        $audioPath = $request->file('audio_attachment')->store('public/audio');
        $call_log = CallLog::find($id);
        return $call_log->update($request->all(), [
            'audio_attachment' => Storage::url($audioPath),
            'summary' => $request->input('summary'),
        ]);
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
