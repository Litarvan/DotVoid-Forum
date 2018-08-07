<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'pseudo', 'email', 'password',
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
    public function received_punishments()
    {
        return $this->hasMany('App\Models\Punishment', 'user_id');
    }

    /**
     * Gets the punishments given by the user.
     */
    public function given_punishments()
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
    public function basic_threads()
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
    public function reviewed_articles()
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
    public function reviewed_blogs()
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
}
