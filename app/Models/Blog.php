<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** Model for blogs which contains articles */
class Blog extends Model
{
    use SoftDeletes;

    /**
     * Gets the blog's articles.
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    /**
     * Gets the blog's allowed contributors.
     */
    public function contributors()
    {
        return $this->belongsToMany('App\Models\User', 'blogs_contributors', 'blog_id', 'contributor_id');
    }

    /**
     * Returns true if the blog's creation request has been reviewed.
     * Pending blogs should not be displayed in the forum's blog list.
     */
    public function is_reviewed()
    {
        return $this->status != 'PENDING';
    }

    /**
     * Returns true if the blog's creation has been approved.
     * Returns false if the creation request is pending or rejected.
     */
    public function is_approved()
    {
        return $this->status == 'APPROVED';
    }

    /**
     * Returns the user that approved or rejected the blog's creation request.
     */
    public function reviewer()
    {
        return $this->belongsTo('App\Models\User', 'reviewer_id');
    }
}
