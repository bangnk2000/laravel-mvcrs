<form id="editCateForm" method="POST" enctype="multipart/form-data"
      data-action="{{ route('categories.update', $category->id)}}" >
    @csrf
    @method('PUT')
    <div class="modal-body">
        <ul class="alert alert-warning d-none" id="_error_update"></ul>
        <div class="form-group mb-3">
            <label for="name" class="col-form-label">Name<span
                    class="text-danger">*</span></label>
            <input placeholder="Name" class="form-control" name="name" id="name"
                   type="text" value="{{$category->name}}">
            <div class="text-danger errors error-name hidden"></div>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="col-form-label"> Description</label>
            <input placeholder="Description" class="form-control" name="description"
                   id="description"
                   type="text" value="{{$category->description}}">
            <div class="text-danger errors error-description"></div>
        </div>
        <div class="form-group mb-3">
            <label>Parent Category</label>
            <select class="form-control" id="parentIdUpdate" name="parent_id">
                <option value="0">-- Danh mục cha --</option>
                @foreach($parentCategories as $parentId)
                    <option {{$category->parent_id == $parentId->id ? "selected" : ""}}
                            value="{{$parentId->id}}">{{$parentId->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-edit">Update
        </button>
    </div>
</form>
