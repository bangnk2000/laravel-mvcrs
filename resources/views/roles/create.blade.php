@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/roles/create/create.css') }}">
@endsection
@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Roles</h5>
        <div class="card-body">
            <form method="post" action="{{route('roles.store')}}">
                @csrf
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{old('name')}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label"> Description<span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="description" placeholder="Enter description"  value="{{old('description')}}" class="form-control">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input select-all-permission" type="checkbox"
                           id="checkAll">
                    <label class="form-label">Permission</label>
                    <div class="row">
                        @foreach($permissionGroup as $group => $permission)
                            <div class="col car">
                                <input class="checkbox_wrapper" type="checkbox" id="checkAlla">
                                <label class="form-label"><b>{{ucfirst( $group )}}</b></label>
                                @foreach($permission as $key => $permissionItem)
                                    <div class="card-text">
                                        <div class="form-check">
                                            <input class="b" type="checkbox" id="checkAllb"
                                                   name="permission_id[]"
                                                   value="{{ $permissionItem->id }}">
                                            <label class="form-check-label"
                                                   for="flexCheckDefault">
                                                {{ $permissionItem->name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/roles/create/create.js')}}"></script>
@endsection
