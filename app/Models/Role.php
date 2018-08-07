<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    
    /**
     * Gets the users with this role.
     */
    public function users()
    {
      return $this->hasMany('Apps\Models\User');
    }

    /**
     * Gets the role's permissions.
     */
    public function permissions()
    {
      return $this->belongsToMany('App\Models\Permission', 'roles_permissions', 'role_id', 'perm_id');
    }
}
