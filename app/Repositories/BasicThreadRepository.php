<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\BasicThread;

class BasicThreadRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\BasicThread  $model
     * @return void
     */
    public function __construct(BasicThread $model)
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
        $model->is_question = $inputs['is_question'];
        $model->category_id = $inputs['category_id'];
        $model->author_id = $inputs['author_id'];

        $model->save();
        return $model->id;
    }

}
