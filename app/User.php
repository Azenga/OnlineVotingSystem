<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone_number', 'national_id_number',
        'isalive', 'isactive', 'hasvoted',
        'role_id', 'ward_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scopes
     */

     public function scopeRole($query, Role $role)
     {
         return $query->where('role_id', $role->id);
     }

     public function scopeWard($query, Ward $ward)
     {
         return $query->where('ward_id', $ward->id);
     }

    /**
     * 
     * Relationships
     * 
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function candidature()
    {
        return $this->hasOne(Candidature::class);
    }

    public function working()
    {
        return $this->hasOne(StationWorker::class);
    }

    public function workPlace()
    {
        return is_null($this->working) ? 'No Station' : $this->working->station->name;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    /**
     * Utility methods and helpers
     */
    public function path()
    {
        return '/admin/users/' . $this->id;
    }
}
