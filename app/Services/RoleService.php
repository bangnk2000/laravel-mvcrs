<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;
    protected $permissionRepository;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function search($request)
    {
        return $this->roleRepository->search($request->search);
    }

    public function getWithGroup()
    {
        return $this->permissionRepository->getWithGroup();
    }

    public function findById($id)
    {
        return $this->roleRepository->findById($id);
    }

    public function create($request)
    {
        $data = $request->all();
        $role = $this->roleRepository->create($data);
        $role->attachPermission($request->permission_id);
        return $role;
    }

    public function update($request, $id)
    {
        $dataUpdate = $request->all();
        $role = $this->roleRepository->findById($id);
        $role->update($dataUpdate);
        $role->syncPermission($request->permission_id);
        return $role;
    }

    public function delete($id)
    {
        $role = $this->roleRepository->findById($id);
        $role->detachPermission();
        return $role->delete();
    }
}
