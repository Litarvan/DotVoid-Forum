<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for permissions.
 *
 * @property int id
 * @property string description
 */
class Permission extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    /**
     * Gets the roles that have this permission.
     */
    public function roles()
    {
      return $this->belongsToMany('App\Models\Role', 'roles_permissions', 'perm_id', 'role_id');
    }
}
