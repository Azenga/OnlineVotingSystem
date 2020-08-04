<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    
    protected $fillable = ['name', 'constituency_id', 'description'];


    /**
     * Relationships
     */

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function vyings()
    {
        return $this->morphMany(Vie::class, 'vieable');
    }


    /**
     * Utility methods
     */
    public function path()
    {
        return '/admin/wards/' . $this->id;
    }
    
}
