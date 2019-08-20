<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN_ID = 1;
    const ORGANIZER_ID = 2;
    const USER_ID = 3;
    const DELIMITER = '|';

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
