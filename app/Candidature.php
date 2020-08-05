<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'user_id',
        'position_id', 
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

    public function where()
    {
        switch ($this->position->level_id) {
            case 1:
                return $this->user->ward->constituency->county->country->name;

            case 2;
                return $this->user->ward->constituency->county->name;

            case 3;
                return $this->user->ward->constituency->name;

            case 4;
                return $this->user->ward->name;
            
            default:
                return $this->user->ward->name;
                break;
        }
    }
}
