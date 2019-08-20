<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
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
     * Get user's role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get user owned events
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    /**
     * @param $role - string list of roles separated by |
     * @return bool
     */
    public function hasRole($role)
    {
        $roles = array_map(function($value) {
            return strtolower(trim($value));
        }, explode(ROLE::DELIMITER, $role));


        return in_array(strtolower($this->role->role), $roles);
    }
}
