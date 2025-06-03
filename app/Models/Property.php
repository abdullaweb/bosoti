<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    } // End Method

    public function propertyUnit()
    {
        return $this->hasOne(PropertyUnit::class);
    }
}
