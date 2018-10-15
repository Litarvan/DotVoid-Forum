<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for user roles, which determines them their permissions.
 *
 * @property int id
 * @property string name
 */
class Role extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

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
