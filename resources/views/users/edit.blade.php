@extends('layouts.master')

@section('css')
    <link  rel="stylesheet" type="text/css" href="{{asset('backend/vendor/select2/select2.min.css')}}" />
@endsection
@section('main-content')
    <div class="card">
        <h5 class="card-header">Update Users</h5>
        <div class="card-body">
            <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$user->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label"> Eamil<span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="email" placeholder="Enter email"  value="{{$user->email}}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label"> Password<span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="password" placeholder="Enter password"  value="" class="form-control">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role_id[]" class="col-form-label">Danh Sach Role</label>
                    <select name="role_id[]" class="form-control select2_init" multiple="multiple">
                        <option value=""></option>
                        @foreach($roles as $role)
                            <option {{$user->roles->contains('id',$role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/users/create/create.js')}}"></script>
@endsection
