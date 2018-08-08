<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for punishments which can be given to the bad guys.
 *
 * @property timestamp created_at
 * @property timestamp updated_at
 * @property timestamp deleted_at
 * @property int id
 * @property timestamp ends_at
 * @property int user_id
 * @property int punisher_id
 * @property string reason
 * @property enum type MUTE, BAN, WARN
 */
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
