<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vie extends Model
{
    protected $fillable = ['candidature_id'];

    public function vieable()
    {
        return $this->morphTo();
    }
}
