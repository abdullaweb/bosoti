<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyUnit extends Model
{
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    } // End Method

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    } // End Method
}
