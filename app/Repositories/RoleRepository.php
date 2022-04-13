<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository
{
    public function model()
    {
        return Role::class;
    }

    public function search($dataSearch)
    {
        return $this->model
            ->withName($dataSearch)
            ->latest('id')->paginate(5);
    }
}