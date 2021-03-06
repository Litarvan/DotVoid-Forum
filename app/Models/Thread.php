<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for information common to basic threads and blog articles. Both
 * the basic threads and the blog articles *are threads*, since they have
 * a title, a main content, several comments and can be locked and pinned.
 *
 * @property timestamp created_at
 * @property timestamp updated_at
 * @property timestamp deleted_at
 * @property int id
 * @property string title
 * @property string content Mardown content
 * @property boolean is_draft true if unpublished draft
 * @property boolean is_article true if article, false if basic thread
 * @property timestamp locked_at null if not locked
 * @property int locker_id
 * @property string lock_message
 * @property timestamp pinned_at null if not pinned
 * @property int pinner_id
 * @property string poll_question null if there's no poll
 * @property boolean is_poll_multiple_choice true if the user can choose multiple answers
 */
class Thread extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'is_draft', 'is_article',
        'poll_question', 'is_poll_multiple_choice'
    ];

    /**
     * Gets the basic thread information, or null if it's an article.
     */
    public function basic()
    {
        return $this->hasOne('App\Models\BasicThread', 'id');
    }

    /**
     * Gets the article information, or null if it's a basic thread.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Article', 'id');
    }
    /**
     * Gets the thread's direct comments.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Gets the admin that locked the thread, or null if it's not locked.
     */
    public function locker()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     * Returns true iff the thread is currently locked.
     */
    public function isLocked()
    {
        return $this->locked_at !== null;
    }

    /**
     * Gets the user that pinned the thread, or null if it's not pinned.
     */
    public function pinner()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     * Returns true iff the thread has been pinned.
     */
    public function isPinned()
    {
        return $this->pinned_at !== null;
    }

    /**
     * Gets the thread's tags.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'threads_tags', 'thread_id', 'tag_id');
    }

    /**
     * Gets the thread's poll entries, or none if it has no poll.
     */
    public function pollEntries()
    {
        return $this->hasMany('App\Models\PollEntry');
    }

    /**
     * Returns true iff the thread offers a poll.
     */
    public function isPoll()
    {
        return $this->poll_question !== null;
    }

    /**
     * Gets all the users who liked the thread.
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'threads_likes', 'thread_id', 'user_id');
    }

    /**
     * Gets the users who subscribed to the thread to receive notifications.
     */
    public function subscribers()
    {
        return $this->belongsToMany('App\Models\User', 'threads_subscriptions', 'thread_id', 'user_id');
    }
}
