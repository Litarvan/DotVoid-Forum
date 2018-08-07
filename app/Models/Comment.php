<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * A comment under a thread. It may be an answer to another comment,
 * in which case it has a parent() and this parent has subs().
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
}
