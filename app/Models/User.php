<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Gets the user's current theme.
     */
    public function theme()
    {
        return $this->hasOne('App\Models\Theme', 'setting_theme_id');
    }

    /**
     * Gets the punishments received by the user.
     */
    public function received_punishments()
    {
        return $this->hasMany('App\Models\Punishment', 'user_id');
    }

    /**
     * Gets the punishments given by the user.
     */
    public function given_punishments()
    {
        return $this->hasMany('App\Models\Punishment', 'punisher_id');
    }

    /**
     * Gets the user's role, which determines its permissions.
     */
    public function role()
    {
      return $this->belongsTo('App\Models\Role');
    }
    // TODO function has_permission(perm_id)
}
