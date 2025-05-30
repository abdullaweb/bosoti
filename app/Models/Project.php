<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    } // End Method

    public function projectUnit()
    {
        return $this->hasMany(ProjectUnit::class, 'project_id', 'id');
    } // End Method
}
