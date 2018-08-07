<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Model for polls entries, ie available answers to a thread's poll */
class PollEntry extends Model
{
    public $timestamps = false;
    protected $table = 'polls_entries';

    /**
     * Gets the thread that offers the poll that contains this entry.
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread');
    }

    /**
     * Gets all the users that chose this entry as an answer to the poll.
     */
    public function usersWhoAnswered()
    {
        return $this->belongsToMany('App\Models\User', 'polls_answers', 'entry_id', 'user_id');
    }
}
