<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for articles threads which make up blogs and can have more
 * than one author (because all the contributors of the blog can edit
 * the blog's articles before and after they're published)
 *
 * @property int id
 * @property enum status PENDING, APPROVED, REJECTED
 * @property timestamp reviewed_at
 * @property int reviewer_id
 * @property string review_message
 * @property int blog_id
 */
class Article extends Model
{
    // The timestamps are managed by the Thread model
    public $timestamps = false;

    /**
     * Gets the common thread information for this article.
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread', 'id');
    }

    /**
     * Gets the blog containing this article.
     */
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    /**
     * Gets all the article's authors.
     */
    public function authors()
    {
        return $this->belongsToMany('App\Models\User', 'articles_authors', 'article_id', 'author_id');
    }
}
