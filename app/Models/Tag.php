<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Model for tags which are applied to threads (basic and articles). */
class Tag extends Model
{
    public $timestamps = false;

    /**
     * Gets the threads that are tagged with this tag.
     */
    public function threads()
    {
        return $this->belongsToMany('App\Models\Thread', 'threads_tags', 'tag_id', 'thread_id');
    }
}
