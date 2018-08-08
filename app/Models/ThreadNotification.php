<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** Model for notifications related to threads (basic or articles). */
class ThreadNotification extends Model
{
    // The notification is soft-deleted when it's read by the user
    use SoftDeletes;

    const UPDATED_AT = null;
    protected $table = 'threads_notifications';

    /**
     * Gets the user that received the notification.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Gets the thread this notification is about.
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread');
    }
}
