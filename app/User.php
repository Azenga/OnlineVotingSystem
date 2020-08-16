<?php

namespace App;

use App\Candidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }


    /**
     * Utility methods and helpers
     */
    public function path()
    {
        return '/admin/users/' . $this->id;
    }

    /**
     * Get the user profile pic or the default avatar
     */
    public function image():string
    {
        if(is_null($this->profile)){
            return "img/avatar.jpg";
        }else{
            if(is_null($this->profile->image)){
                return "img/avatar.jpg";
            }else{
                return $this->profile->image->path;
            }
        }
    }

    public function getCandidatesAtPosition(int $positionId)
    {
        $position = Position::findOrFail($positionId);

        $location_id = 0;

        switch ($position->level_id) {

            case 1:
                $location_id = $this->ward->constituency->county->country->id;
                break;
            case 2:
                $location_id = $this->ward->constituency->county->id;
                break;
            case 3:
                $location_id = $this->ward->constituency->id;
                break;
            case 4:
                $location_id = $this->ward->id;
                break;
            
            default:
                return;
        }

        return Candidature::with('user')
            ->position($positionId)
            ->where(function($query){
                $query->select('location_id')
                    ->from('users')
                    ->whereColumn('user_id', 'users.id')
                    ->take(1);
            }, $location_id)
            ->get();
    }
}
