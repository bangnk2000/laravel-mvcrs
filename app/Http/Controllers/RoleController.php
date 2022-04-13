<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
        View::share('permissionGroup', $this->roleService->getWithGroup());
    }

    public function index(Request $request)
    {
        $roles = $this->roleService->search($request);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleCreateRequest $request)
    {
        $this->roleService->create($request);
        return redirect()->route('roles.index')->with('message', 'role updated successfully');
    }

    public function show($id)
    {
        $role = $this->roleService->findById($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = $this->roleService->findById($id);
        return view('roles.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $this->roleService->update($request, $id);
        return redirect()->route('roles.index')->with('message', 'role updated successfully');
    }

    public function delete($id)
    {
        $this->roleService->delete($id);
        return redirect()->route('roles.index')->with('message', 'role deleted successfully');
    }
}
