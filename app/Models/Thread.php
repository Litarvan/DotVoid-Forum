<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for information common to basic threads and blog articles. Both
 * the basic threads and the blog articles *are threads*, since they have
 * a title, a main content, several comments and can be locked and pinned.
 */
class Thread extends Model
{
    use SoftDeletes;

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
}
