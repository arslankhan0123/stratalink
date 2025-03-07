<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Building extends Model
{
    // protected $fillable = [
    //     'user_id',
    //     'contractor_id',
    //     'name',
    //     'company',
    //     'mobile',
    //     'email',
    //     'category',
    //     'created_by',
    //     'manager_id',
    //     'building_manager_id',
    //     'strata_manager_id',
    //     'sp_no',
    // ];

    protected $fillable = [
        'user_id',
        'created_by',
        'manager_id',
        'building_manager_id',
        'strata_manager_id',
        'sp_no',
        'name',
        'mobile',
        'address',
        'lots',
        'total_lots',
        'commercial_lots',
        'amenities',
        'visitors_parking',
        'gymnasium',
        'tennis_court',
        'other',
        'waste_management',
        'resident_garbage',
        'green_waste',
        'spare_keys',
        'registered_keys',
        'lock_out',
        'no_lifts',
        'contractor_keys',
        'hours_keys',
        'gas_meter_location',
        'electricity_meter_location',
        'site_hours',
        'company',
        'email',
        'category',
    ];    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($building) {
            $building->created_by = Auth::user()->id;
        });
    }

    /**
     * Get all of the callLogs for the Building
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function callLogs()
    {
        return $this->hasMany(CallLog::class, 'building_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contractors()
    {
        return $this->hasMany(Contractor::class, 'building_id');
    }

    public function scopeApplyFilter(
        $query,
        array $filters
    ) {
        $filters = collect($filters);
        if (auth()->user()->role()->first()->name === 'staff')
            $query->WhereUser(auth()->user()->id);
        // if ($filters->get('company'))
        //     $query->WhereCompanyUuid($filters->get('company'));
    }

    public function scopeWhereUser(
        $query,
        $user_id
    ) {
        $query->where('user_id', $user_id);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }
}
