<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function search($request)
    {
        $dataSearch = $request->all();

        $dataSearch['name'] = $request->name ?? '';

        $dataSearch['email'] = $request->email ?? '';

        $dataSearch['role_id'] = $request->role_id ?? '';

        return $this->userRepository->search($dataSearch);
    }

    public function getRole()
    {
        return $this->roleRepository->all();
    }

    public function create($request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = $this->userRepository->create($data);
//        $user->roles()->attach($request->role_id);
        $user->attachRole($request->role_id);
        return $user;
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($request, $id)
    {
        $dataUpdate = $request->all();
        $dataUpdate['password'] = Hash::make($request->password);
        $user = $this->userRepository->findById($id);
        $user->syncRole($request->role_id);
        return $user->update($dataUpdate);
    }

    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $user->detachRole();
        return $user->delete();
    }
}
