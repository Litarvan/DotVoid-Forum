<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model for the forum users.
 *
 * @property timestamp created_at
 * @property timestamp updated_at
 * @property date deleted_at
 * @property int id
 * @property string pseudo
 * @property string email
 * @property string avatar_url
 * @property string github_url
 * @property string website_url
 * @property string profile_description
 * @property int role_id ref to role()
 * @property string validation_token
 * @property timestamp validation_expires_at
 * @property string password (hashed of course)
 * @property string remember_token
 * @property boolean setting_subscribe_comments true to get notifications for comment answers
 * @property boolean setting_subscribe_likes true to get notifications for received likes
 * @property int setting_theme_id ref to theme()
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'email', 'avatar_url', 'github_url', 'website_url',
        'profile_description', 'role_id', 'password', 'setting_subscribe_comments',
        'setting_subscribe_likes', 'setting_theme_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Gets the user's current theme.
     */
    public function theme()
    {
        return $this->hasOne('App\Models\Theme', 'setting_theme_id');
    }

    /**
     * Gets the punishments received by the user.
     */
    public function punishmentsReceived()
    {
        return $this->hasMany('App\Models\Punishment', 'user_id');
    }

    /**
     * Gets the punishments given by the user.
     */
    public function punishmentsGiven()
    {
        return $this->hasMany('App\Models\Punishment', 'punisher_id');
    }

    /**
     * Gets the user's role, which determines its permissions.
     */
    public function role()
    {
      return $this->belongsTo('App\Models\Role');
    }
    // TODO function has_permission(perm_id)

    /**
     * Gets the basic threads written by the user.
     */
    public function basicThreads()
    {
        return $this->hasMany('App\Models\BasicThread', 'author_id');
    }

    /**
     * Gets the articles the user contributed to.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'articles_authors', 'author_id', 'article_id');
    }

    /**
     * Gets the articles reviewed by the user.
     */
    public function reviewedArticles()
    {
        return $this->hasMany('App\Models\Article', 'reviewer_id');
    }

    /**
     * Gets the blogs the user contributes to.
     */
    public function blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'blogs_contributors', 'contributor_id', 'blog_id');
    }

    /**
     * Gets the blogs reviewed by the user.
     */
    public function reviewedBlogs()
    {
        return $this->hasMany('App\Models\Blog', 'reviewer_id');
    }

    /**
     * Gets the comments written by the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'author_id');
    }

    /**
     * Gets the answers chosen by the user on threads' polls.
     */
    public function pollsAnswers()
    {
        return $this->belongsToMany('App\Models\PollEntry', 'polls_entries', 'user_id', 'entry_id');
    }

    /**
     * Gets the threads liked by the user.
     */
    public function likedThreads()
    {
        return $this->belongsToMany('App\Models\Thread', 'threads_likes', 'user_id', 'thread_id')
                    ->withPivot('created_at');
    }

    /**
     * Gets the comments liked by the user.
     */
    public function likedComments()
    {
        return $this->belongsToMany('App\Models\Comment', 'comments_likes', 'user_id', 'comment_id')
                    ->withPivot('created_at');
    }

    /**
     * Gets the categories the user subscribed to.
     */
    public function subscribedCategories()
    {
        return $this->belongsToMany('App\Models\Category', 'categories_subscriptions', 'user_id', 'category_id');
    }

    /**
     * Gets the threads the user subscribed to.
     */
    public function subscribedThreads()
    {
        return $this->belongsToMany('App\Models\Thread', 'threads_subscriptions', 'user_id', 'thread_id');
    }

    /**
     * Gets the blogs the user subscribed to.
     */
    public function subscribedBlogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'blogs_subscriptions', 'user_id', 'blog_id');
    }

    /**
     * Gets the threads notifications received by the user.
     * Read notifications are soft deleted.
     */
    public function notifiedThreads()
    {
        return $this->hasMany('App\Models\ThreadNotification', 'user_id');
    }

    /**
     * Gets the comments notifications received by the user.
     * Read notifications are soft deleted.
     */
    public function notifiedComments()
    {
        return $this->hasMany('App\Models\CommentNotification', 'user_id');
    }

    /**
     * Gets the blog contributions notifications received by the user.
     * Read notifications are soft deleted.
     */
    public function notifiedBlogContributions()
    {
        return $this->hasMany('App\Models\BlogContributorNotification', 'user_id');
    }
}
