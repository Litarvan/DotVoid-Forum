<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for basic threads which belong to categories and have one author.
 *
 * @property int id
 * @property boolean is_question
 * @property int category_id
 * @property int author_id
 */
class BasicThread extends Model
{
    // The timestamps are managed by the Thread model
    public $timestamps = false;

    protected $table = 'normal_threads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['is_question', 'category_id', 'author_id'];


    /**
     * Gets the common thread information for this basic thread.
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread', 'id');
    }

    /**
     * Gets the unique thread's author. basic threads have only one author,
     * unlike blog articles which can be written by multiple users.
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /**
     * Gets the thread's category. basic threads belong to a forum category,
     * unlike blog articles which belong to a blog.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
