@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/select2/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('backend/products/create/create.css')}}"/>
@endsection
@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="name" placeholder="Enter name" value="{{old('name')}}"
                           class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Price<span
                            class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="price" placeholder="Enter price" value="{{old('price')}}"
                           class="form-control">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label"> Description<span
                            class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="description" placeholder="Enter description" value="{{old('description')}}"
                           class="form-control">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="form-label">Image</label>
                    <div class="form-row">
                        <div class="col-12">
                            <input name="image" id="image" type="file" class="form-control clearable " >
                        </div>
                    </div>
                    <p>
                    @error('image')
                    <div class="link-danger">{{ $message }}</div>
                    @enderror
                    </p>
                </div>
                <div class="form-group">
                    <img id="showImage"
                         alt=""
                         style="width: 300px;">
                </div>

                <div class="form-group">
                    <label for="category_id[]" class="col-form-label">Danh muc</label>
                    <select name="category_id[]" class="form-control select2_init" multiple="multiple">
                        <option value=""></option>
                        {!! \App\Helpers\CategoryHelper::getCategoryMultiLevel($categoryList) !!}--}}
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
    <script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/products/create/create.js')}}"></script>
    <script>
        //<![CDATA[
        function tog(v) {
            return v ? 'addClass' : 'removeClass';
        }
        $(document).on('input', '.clearable', function() {
            $(this)[tog(this.value)]('x');
        }).on('mousemove', '.x', function(e) {
            $(this)[tog(this.offsetWidth - 20 < e.clientX - this.getBoundingClientRect().left)]('onX');
        }).on('touchstart click', '.onX', function(ev) {
            ev.preventDefault();
            $('#showImage').attr('src','').change();
            $(this).removeClass('x onX').val('').change();
        });
        //]]>
    </script>
@endsection
