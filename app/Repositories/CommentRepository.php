<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\Comment;

class CommentRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\Comment  $model
     * @return void
     */
    public function __construct(Comment $model)
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
        $model->content = $inputs['content'];
        $model->thread_id = $inputs['thread_id'];
        $model->author_id = $inputs['author_id'];
        $model->parent_id = $inputs['parent_id'];
        $model->is_pinned = isset($inputs['is_pinned']);

        $model->save();
        return $model->id;
    }

}
