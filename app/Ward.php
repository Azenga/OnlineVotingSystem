<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['name', 'constituency_id', 'description'];

    public function path()
    {
        return '/admin/wards/' . $this->id;
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
    
}
