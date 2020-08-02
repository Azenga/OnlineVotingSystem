<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['title', 'level_id', 'description'];


    public function path()
    {
        return '/admin/positions/' . $this->id;
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
