<?php

namespace App;

use App\StationWorker;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'ward_id'];


    /**
     * Relationships
     */
    public function workers()
    {
        return $this->hasMany(StationWorker::class, 'station_id');
    }

    /**
     * Utilities and helpers
     *
     */


    public function path()
    {
        return '/admin/stations/' . $this->id;
    }
}
