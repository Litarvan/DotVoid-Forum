<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\Thread;

class ThreadRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\Thread  $model
     * @return void
     */
    public function __construct(Thread $model)
    {
        $this->model = $model;
    }

    /**
     * Resource relative behavior for saving a record.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  $inputs
     * @return int id, the id of the saved resource
     */
    protected function save(Model $model, Array $inputs)
    {
        $model->title = $inputs['title'];
        $model->content = $inputs['content'];
        $model->is_draft = isset($inputs['is_draft']);
        $model->is_article = isset($inputs['is_article']);
        $model->locked_at = $inputs['locked_at'];
        $model->locker_id = $inputs['locker_id'];
        $model->lock_message = $inputs['lock_message'];
        $model->pinned_at = $inputs['pinned_at'];
        $model->pinner_id = $inputs['pinner_id'];
        $model->poll_question = $inputs['poll_question'];
        $model->is_poll_multiple_choice = isset($inputs['is_poll_multiple_choice']);

        $model->save();
        return $model->id;
    }

}
