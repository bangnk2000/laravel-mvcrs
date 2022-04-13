<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function search($dataSearch)
    {
        return $this->model
            ->withName($dataSearch['name'])
            ->withEmail($dataSearch['email'])
            ->withRoleId($dataSearch['role_id'])
            ->latest('id')->paginate(5);
    }
}
