<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id'];


    /**
     * Relationships
     */
    public function selections()
    {
        return $this->hasMany(Selection::class);
    }
}
