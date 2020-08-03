<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['name', 'region'];


    public function path()
    {
        return '/admin/counties/' . $this->id;
    }

    public function constituencies()
    {
        return $this->hasMany(Constituency::class);
    }
    
}
