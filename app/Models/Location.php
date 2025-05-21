<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->hasMany(Location::class, 'project_id', 'id');
    } // End Method

    public function projectUnit()
    {
        return $this->hasMany(ProjectUnit::class, 'location_id', 'id');
    } // End Method
}
