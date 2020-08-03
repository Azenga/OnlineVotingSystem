<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{

    protected $fillable = ['name', 'county_id', 'description'];

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
    
    public function path()
    {
        return "/admin/constituencies/" . $this->id;
    }
}
