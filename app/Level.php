<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['title'];

    public function path(): string
    {
        return '/admin/levels/' . $this->id;
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
