<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['name', 'region'];

    /**
     * Relationships
     */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function constituencies()
    {
        return $this->hasMany(Constituency::class);
    }

    public function vyings()
    {
        return $this->morphMany(Vie::class, 'vieable');
    }


    /**
     * Helpers and utils
     */
    public function path()
    {
        return '/admin/counties/' . $this->id;
    }    
    
}
