@extends('layouts.master')
@section('css')

@endsection
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.notification')
            </div>
        </div>
        @hasPermission('user_create')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">User List</h6>
            <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom"
               title="Add User"><i class="fas fa-plus"></i> Add User</a>
        </div>

        <!-- Topbar Search -->
        <div class="row" >
            <div class="card-title">
                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <form class="form-search " method="GET" role="form">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control border" name="name"
                                           value="{{$_GET['name'] ?? ''}}"
                                           placeholder="Name....." style="padding: 0.5rem 1rem !important;">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control border" name="email"
                                           value="{{$_GET['email'] ?? ''}}"
                                           placeholder="Email...." style="padding: 0.5rem 1rem !important;">
                                </div>
                                <div class="col-2">
                                    <select name="role_id" class="form-control border"
                                            aria-label="Default select example" >
                                        <option value="" selected>Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary" >
                                        <i class="fas fa-search"></i>Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
        </div>
        @endhasPermission



    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($users)>0)
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($roles as $role)
                                    <span class="badge badge-success">{{$user->roles->contains('id',$role->id) ? $role->name : ''}}</span>
                                @endforeach
                            </td>
                            <td>
                                @hasPermission('user_edit')
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                   data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @endhasPermission

                                @hasPermission('user_show')
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-primary btn-sm btn-success"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view"
                                   data-placement="bottom"><i class="fas fa-eye"></i></a>
                                @endhasPermission

                                @hasPermission('user_delete')
                                <form method="POST" action="{{route('users.destroy',$user->id)}}" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm dltBtn"
                                            style="height:30px; width:30px;border-radius:50%"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                                @endhasPermission
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span style="float:right">{{$users->links()}}</span>

            @else
                <h6 class="text-center">No categories found</h6>
            @endif
        </div>
    </div>
@endsection
@section('js')

@endsection
