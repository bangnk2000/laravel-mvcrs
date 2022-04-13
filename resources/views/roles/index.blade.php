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

        @hasPermission('role_create')
        <div class="card-header py-6=3">

                <h6 class="m-0 font-weight-bold text-primary float-left">Role List</h6>
                <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom"
                   title="Add User"><i class="fas fa-plus"></i>Add Role</a>

        </div>
        <!-- Topbar Search -->
        <div class="row">
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                <div class="input-group m-md-4">
                    <input type="search" name="search" style="margin-left: 7px"
                           class="form-control" placeholder="Search for..."
                           aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endhasPermission

    </div>
    <div class="card-body">

        <div class="table-responsive">
            @if(count($roles)>0)
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                @hasPermission('role_edit')
                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                   data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @endhasPermission

                                @hasPermission('role_show')
                                <a href="{{route('roles.show',$role->id)}}" class="btn btn-primary btn-sm btn-success"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view"
                                   data-placement="bottom"><i class="fas fa-eye"></i></a>
                                @endhasPermission

                                @hasPermission('role_delete')
                                <form method="POST" action="{{route('roles.destroy',$role->id)}}" class="d-inline-block">
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
                <span style="float:right">{{$roles->links()}}</span>

            @else
                <h6 class="text-center">No categories found!!! Please create roles</h6>
            @endif
        </div>
    </div>
@endsection
@section('js')

@endsection
