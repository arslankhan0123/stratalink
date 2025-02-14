<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contractor extends Model
{
    protected $fillable = [
        'name',
        'company',
        'phone',
        'email',
        'category',
        'building_id',
        'created_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($building) {
            $building->created_by = Auth::user()->id;
        });
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
