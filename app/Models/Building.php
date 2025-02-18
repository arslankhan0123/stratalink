<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Building extends Model
{
    protected $fillable = [
        'user_id',
        'contractor_id',
        'name',
        'company',
        'mobile',
        'email',
        'category',
        'created_by',
        'manager_id',
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
}
