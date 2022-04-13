@extends('layouts.master')
@section('css')

@endsection
@section('main-content')
    <!-- DataTales Example -->

    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
@endsection
@section('js')

@endsection
