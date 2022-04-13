@extends('layouts.master')
@section('css')

@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-9 mt-3">
                <form class="form-search" method="GET" role="form">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control border" name="name" id="search-with-name"
                                   value="{{$_GET['name'] ?? ''}}"
                                   placeholder="Name" style="padding: 0.5rem 1rem !important;">
                        </div>
                        <div class="col-3">
                            <select name="parent_id" class="form-control border" id="search-with-category-id"
                                    style="padding: 0.5rem 1rem !important;">
                                <option value=" ">Category</option>
                                {!! \App\Helpers\CategoryHelper::getCategoryMultiLevel($categoryList) !!} --}}
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 mt-3">
                <div class="d-flex justify-content-end">
                    @hasPermission('category_create')
                    <button type="button" id="btn-add-new-cate" data-title="Create Category"
                            class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#show-form-create">
                        <i class="fas fa-plus-circle"></i>
                        <span class="p-lg-1">Add category</span>
                    </button>
                    @endhasPermission
                </div>
            </div>
        </div>

        <div class="card">
            <div id="list" data-action="{{route('categories.list')}}">
                
            </div>
        </div>
    </div>

    @hasPermission('category_create')
    @include('categories.create')
    @endhasPermission

    @hasPermission('category_edit')
    <div class="modal fade" id="show-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-body">
                            <h5 class="text-center">Edit Category</h5>
                            <hr>
                        </div>
                        <div id="edit">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endhasPermission
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('backend/categories/base.js')}}"></script>
    <script src="{{asset('backend/categories/category.js')}}"></script>
@endsection
