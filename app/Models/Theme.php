<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
     * Gets the users who use this theme.
     */
    public function users()
    {
      return $this->hasMany('Apps\Models\User', 'setting_theme_id');
    }
}
