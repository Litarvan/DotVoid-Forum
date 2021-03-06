<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\Punishment;

class PunishmentRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\Punishment  $model
     * @return void
     */
    public function __construct(Punishment $model)
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
        $model->ends_at = $inputs['ends_at'];
        $model->user_id = $inputs['user_id'];
        $model->punisher_id = $inputs['punisher_id'];
        $model->reason = $inputs['reason'];
        $model->type = $inputs['type'];

        $model->save();
        return $model->id;
    }

}
