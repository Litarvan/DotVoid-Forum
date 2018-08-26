<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResourceRepository;
use App\Models\User;

class UserRepository extends ResourceRepository
{

    /**
     * Create a new repository instance.
     *
     * @param  \App\Models\User  $model
     * @return void
     */
    public function __construct(User $model)
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
        $model->pseudo = $inputs['pseudo'];
        $model->email = $inputs['email'];
        $model->avatar_url = $inputs['avatar_url'];
        $model->github_url = $inputs['github_url'];
        $model->website_url = $inputs['website_url'];
        $model->profile_description = $inputs['profile_description'];
        $model->role_id = $inputs['role_id'];
        $model->password = $inputs['password'];
        $model->setting_subscribe_comments = isset($inputs['setting_subscribe_comments']);
        $model->setting_subscribe_likes = isset($inputs['setting_subscribe_likes']);
        $model->setting_theme_id = $inputs['setting_theme_id'];

        $model->save();
        return $model->id;
    }

}
