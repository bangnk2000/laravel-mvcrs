@extends('layouts.master')
@section('css')

@endsection
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">User </h6>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($roles as $role)
                                    <span class="badge badge-success">{{$user->roles->contains('id',$role->id) ? $role->name : ''}}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
@endsection
@section('js')

@endsection
