<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getPosition()
    {
        return is_null($this->position) ? 'Not Set' : $this->position->title;
    }
}
