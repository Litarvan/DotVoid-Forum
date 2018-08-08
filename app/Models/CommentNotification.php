<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for notifications related to comments.
 *
 * @property timestamp created_at
 * @property timestamp deleted_at
 * @property int id
 * @property int user_id
 * @property int comment_id
 * @property enum type LIKE, RESPONSE, PIN, DELETION, MENTION
 */
class CommentNotification extends Model
{
    // The notification is soft-deleted when it's read by the user
    use SoftDeletes;

    const UPDATED_AT = null;
    protected $table = 'comments_notifications';

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
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }
}
