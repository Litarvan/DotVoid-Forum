<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for tags which are applied to threads (basic and articles).
 *
 * @property int id
 * @property string name
 * @property string color_code HTML color code
 */
class Tag extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'color_code'];

    /**
     * Gets the threads that are tagged with this tag.
     */
    public function threads()
    {
        return $this->belongsToMany('App\Models\Thread', 'threads_tags', 'tag_id', 'thread_id');
    }
}
