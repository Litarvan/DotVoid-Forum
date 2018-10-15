<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for the front-end themes which the users can choose.
 *
 * @property int id
 * @property string name
 * @property string css_url URL to the css file
 */
class Theme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'css_url'];

    /**
     * Gets the users who use this theme.
     */
    public function users()
    {
      return $this->hasMany('Apps\Models\User', 'setting_theme_id');
    }
}
