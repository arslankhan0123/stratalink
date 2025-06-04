<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CallLog extends Model
{
    protected $fillable = [
        'name',
        'email',
        'building_id',
        'contractor_id',
        'number',
        'building_manager',
        'strata_manager',
        'contractor',
        'send_email',
        'signature',
        'email_file',
        'token',
        'audio_attachment',
        'summary',
        'created_by',
        'status',
        'manager_id',
        'building_manager_id',
        'strata_manager_id',
        'call_time',
        'total_time_spent_on_call',
        'call_date',
        'category',
        'email_agent_name',
        'email_aprtment_no',
        'email_lot_no',
        'consent_form_email_sent',
        'customer_details_email_sent',
        'building_manager_email_sent',
        'strata_manager_email_sent',
        'contractor_details_email_sent',
        'send_sms_contractor',
        'contractor_notes',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($building) {
            $building->created_by = Auth::user()->id;
        });
    }


    /**
     * Get the user associated with the CallLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function building()
    {
        return $this->hasOne(Building::class, 'id', 'building_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function scopeApplyFilter(
        $query,
        array $filters
    ) {
        $filters = collect($filters);
        if (auth()->user()->role()->first()->name === 'staff')
            $query->WhereUser(auth()->user()->id);
    }

    public function scopeWhereUser(
        $query,
        $user_id
    ) {
        $query->whereHas('building', function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        });
    }
}
