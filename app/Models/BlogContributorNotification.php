<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for notifications addressed to blogs contributors.
 *
 * @property timestamp created_at
 * @property timestamp deleted_at
 * @property int id
 * @property int blog_id
 * @property int user_id
 * @property int other_user_id
 * @property enum type APPROVAL, REJECT, CONTRIBUTOR, NOT_CONTRIBUTOR, NEW_COLLEAGUE, BYE_COLLEAGUE
 */
class BlogContributorNotification extends Model
{
    // The notification is soft-deleted when it's read by the user
    use SoftDeletes;

    const UPDATED_AT = null;
    protected $table = 'blogs_contributors_notifications';

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
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    /**
     * Gets the other user that the notification relates to, never null.
     * If type APPROVAL: the user who approved the blog
     * If type REJECT: the user who rejected the blog
     * If type CONTRIBUTOR: the user who made user() a contributor
     * If type NOT_CONTRIBUTOR: the user who revoked your contributor access
     * If type NEW_COLLEAGUE: the new blog contributor
     * If type BYE_COLLEAGUE: the former blog contributor
     */
    public function otherUser()
    {
        return $this->belongsTo('App\Models\User', 'other_user_id');
    }
}
