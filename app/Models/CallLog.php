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
        'call_date',
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
