<div class="modal" id="show-form-create">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="addCateForm" method="POST" enctype="multipart/form-data" data-action="{{route('categories.store')}}">
                @method('POST')
                @csrf
                <div class="modal-body">
{{--                    <div role="alert" class="alert alert-danger text-white visually-hidden validate-error">--}}

{{--                    </div>--}}
                    <div class="form-group mb-3">
                        <label for="name" class="col-form-label">Name<span
                                class="text-danger">*</span></label>
                        <input placeholder="Name" class="form-control" name="name" id="name"
                               type="text">
                        <div class="text-danger errors error-name hidden"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="col-form-label"> Description</label>
                        <input placeholder="Description" class="form-control" name="description"
                               id="description"
                               type="text">
                        <div class="text-danger errors error-description"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Parent Category</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">--Danh muc cha--</option>
                            {!! \App\Helpers\CategoryHelper::getCategoryMultiLevel($categoryList) !!}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary " id="btn-create"
                    >Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

