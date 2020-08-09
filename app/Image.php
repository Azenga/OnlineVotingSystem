<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    
    protected $fillable = ['imageable_id', 'imageable_type', 'path'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function deleteFilesFromStorage()
    {
        //Delete the file from storage
    }
}
