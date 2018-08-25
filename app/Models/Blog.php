<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model for blogs which contains articles
 *
 * @property timestamp created_at
 * @property timestamp deleted_at
 * @property int id
 * @property string name
 * @property string description
 * @property string logo_url
 * @property enum status PENDING, APPROVED, REJECTED
 * @property timestamp reviewed_at
 * @property int reviewer_id
 * @property string review_message
 */
class Blog extends Model
{
    use SoftDeletes;

    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'logo_url', 'status', 'reviewed_at',
        'reviewer_id', 'review_message'
    ];

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
    public function isReviewed()
    {
        return $this->status != 'PENDING';
    }

    /**
     * Returns true if the blog's creation has been approved.
     * Returns false if the creation request is pending or rejected.
     */
    public function isApproved()
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

    /**
     * Gets the users who subscribed to receive notifications about new articles.
     */
    public function subscribers()
    {
        return $this->belongsToMany('App\Models\User', 'blogs_subscriptions', 'blog_id', 'user_id');
    }
}
