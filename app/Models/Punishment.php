<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Punishment extends Model
{
    use SoftDeletes;

    /**
     * Gets the punished user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Gets the punisher.
     */
    public function punisher()
    {
      return $this->belongsTo('App\Models\User');
    }
}
