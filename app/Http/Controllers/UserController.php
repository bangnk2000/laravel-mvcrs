<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        View::share('roles', $this->userService->getRole());
    }

    public function index(Request $request)
    {
        $users = $this->userService->search($request);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('users.index')->with('message', 'user created successfully');
    }

    public function show($id)
    {
        $user = $this->userService->findById($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('users.index')->with('message', 'user updated successfully');
    }

    public function delete($id)
    {
        $this->userService->delete($id);
        return redirect()->route('users.index')->with('message', 'user deleted successfully');
    }
}
