@extends('layouts.master')
@section('css')

@endsection
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    </div>
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category name</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{number_format($product->price)}}.VNĐ</td>
                            <td>
                                @foreach($categories as $category)
                                    <span class="badge badge-success">{{$product->categories->contains('id',$category->id) ? $category->name : ''}}</span>
                                @endforeach
                            </td>
                            <td>
                                <img src="{{ asset('uploads/products/'.$product->image) }}" width="80px" alt="">
                            </td>
                        </tr>

                    </tbody>
                </table>


        </div>
    </div>
@endsection
@section('js')

@endsection
