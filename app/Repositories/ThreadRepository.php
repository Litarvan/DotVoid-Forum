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

        $model->save();
        return $model->id;
    }

}