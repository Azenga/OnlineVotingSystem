<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationWorker extends Model
{
    
    protected $fillable = ['user_id', 'station_id'];

    /**
     * Relationships
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
