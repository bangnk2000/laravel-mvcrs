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
        @hasPermission('product_create')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Product List</h6>
            <a href="{{route('products.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
               data-placement="bottom"
               title="Add User"><i class="fas fa-plus"></i>Add Product</a>
        </div>
        <!-- Topbar Search -->
        <div class="row">
            <div class="card-title">
                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <form class="form-search " method="GET" role="form">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control border" name="name"
                                           value="{{$_GET['name'] ?? ''}}"
                                           placeholder="Name...." style="padding: 0.5rem 1rem !important;">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control border" name="price"
                                           value="{{$_GET['price'] ?? ''}}"
                                           placeholder="Price...." style="padding: 0.5rem 1rem !important;">
                                </div>
                                <div class="col-3">
                                    <select name="category_id" class="form-control border"
                                            style="padding: 0.5rem 1rem !important;">
                                        <option value=" ">Category</option>
                                        {!! \App\Helpers\CategoryHelper::getCategoryMultiLevel($categoryList) !!}--}}
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">
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
            @if(count($products)>0)
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{number_format($product->price)}}.VNĐ</td>
                            <td>
                                @foreach($product->categories as $category)
                                    <span class="badge badge-success">{{$category->name ?? ''}}</span>
                                @endforeach
                            </td>
                            <td>
                                <img src="{{ asset('uploads/products/'.$product->image) }}" width="80px" alt="">
                            </td>
                            <td>
                                @hasPermission('product_create')
                                <a href="{{route('products.edit',$product->id)}}"
                                   class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                   data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @endhasPermission

                                @hasPermission('product_create')
                                <a href="{{route('products.show',$product->id)}}"
                                   class="btn btn-primary btn-sm btn-success"
                                   style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view"
                                   data-placement="bottom"><i class="fas fa-eye"></i></a>
                                @endhasPermission

                                @hasPermission('product_create')
                                <form method="POST" action="{{route('products.destroy',$product->id)}}" class="btn-delete d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm dltBtn "
                                            style="height:30px; width:30px;border-radius:50%"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                                @endhasPermission
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span style="float:right">{{$products->links()}}</span>
            @else
                <h6 class="text-center">No categories found!!! Please create roles</h6>
            @endif
        </div>
    </div>
@endsection
@section('js')

@endsection
