<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'user_id',
        'position_id', 
        'location_id', 
        'running_mate_id', 
        'incumbent', 
        'party'
    ];
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getPosition()
    {
        return is_null($this->position) ? 'Not Set' : $this->position->title;
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function scopePosition($query, int $position)
    {
        return $query->where('position_id', $position);
    }

    public function scopeLocation($query, int $locationId)
    {
        return $query->where('location_id', $locationId);
    }

    public function where()
    {
        switch ($this->position->level_id) {
            case 1:
                return Country::findOrFail($this->location_id)->name;

            case 2;
                return County::findOrFail($this->location_id)->name;

            case 3;
                return Constituency::findOrFail($this->location_id)->name;

            case 4;
                return Ward::findOrFail($this->location_id)->name;
            
            default:
                return null;
        }
    }

    public function getColor(): string
    {
        switch ($this->position_id) {
            case 1: return 'bg-success text-white';
            case 2: return 'bg-primary text-white';
            case 3: return 'bg-info text-dark';
            case 4: return 'bg-warning text-dark';
            case 5: return 'bg-danger text-white';
            
            default: return 'bg-light text-dark';
        }
    }
}
