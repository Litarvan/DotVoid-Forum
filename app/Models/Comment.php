<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * A comment under a thread. It may be an answer to another comment,
 * in which case it has a parent() and this parent has subs().
 *
 * @property timestamp created_at
 * @property timestamp updated_at
 * @property timestamp deleted_at
 * @property int id
 * @property string content Markdown content
 * @property int thread_id
 * @property int author_id
 * @property int parent_id
 * @property boolean is_pinned
 */
class Comment extends Model
{
    use SoftDeletes;

    /**
     * Gets the thread (basic thread or article) that owns the comment.
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread');
    }

    /**
     * Gets the user who wrote the comment.
     */
    public function author()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     * Gets the sub-comments, maybe none.
     */
    public function subs()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    /**
     * Gets the parent comment, maybe null.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent_id');
    }

    /**
     * Gets all the users who liked the comment.
     */
    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'comments_likes', 'comment_id', 'user_id');
    }
}
