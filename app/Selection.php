<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    protected $fillable = ['vote_id', 'position_id', 'location_id', 'candidature_id'];

    /**
     * Relationships
     */
    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidature::class, 'candidature_id');
    }
}
