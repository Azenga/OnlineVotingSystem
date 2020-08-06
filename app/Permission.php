<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['title'];

    /**
     * Relationships
     */

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Utilities and Helpes
     */

    public function path()
    {
        return '/admin/permissions/' . $this->id;
    }
}
