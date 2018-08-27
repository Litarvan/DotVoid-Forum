<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\Blog;

class BlogRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\Blog  $model
     * @return void
     */
    public function __construct(Blog $model)
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
        $model->name = $inputs['name'];
        $model->description = $inputs['description'];
        $model->logo_url = $inputs['logo_url'];
        $model->status = $inputs['status'];

        $model->save();
        return $model->id;
    }

}
