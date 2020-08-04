<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{

    protected $fillable = ['name', 'county_id', 'description'];


    /**
     * Relationships
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function vyings()
    {
        return $this->morphMany(Vie::class, 'vieable');
    }
    

    /**
     * Utilities and helpers
     * 
     */
    public function path()
    {
        return "/admin/constituencies/" . $this->id;
    }
}
