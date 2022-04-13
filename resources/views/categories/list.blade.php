@php
    $stt = (($_GET['page'] ?? 1) - 1) * 5;
@endphp
<div class="card-body">
    <div class="table-responsive">
        @if($categories->count() >0 )
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th style="width: 5%">STT</th>
            <th>Name</th>
            <th>Description</th>
            <th>Parent Name</th>
            <th style="width: 15%">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ ++$stt }}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <span class="badge badge-success">{{$category->getParentInfo->name ?? ''}}</span>
                </td>
                <td>

                    @hasPermission('category_edit')
                    <a data-action="{{route('categories.edit',$category->id)}}"
                       data-id = "{{$category->id}}"
                       data-toggle="modal" data-target="#show-form-edit"
                       class="btn btn-edit-cate btn-primary btn-sm float-left mr-1"
                       style="height:30px; width:30px;border-radius:50%" title="edit"
                       data-placement="bottom"><i class="fas fa-edit"></i></a>
                    @endhasPermission

                    @hasPermission('category_delete')
                    <a class="btn-delete-cate btn btn-danger btn-sm"
                       data-action="{{route('categories.destroy',$category->id)}}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    @endhasPermission

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
        <span>{{ $categories->appends(request()->all())->links() }}</span>
        @else
            <div class="text-center">
                <h5>Don't find category suitable with keyword </h5>
                <h1><i class="fas fa-exclamation-triangle text-warning" ></i></h1>
                <h5>Please again!</h5>
            </div>
        @endif
    </div>
</div>
<!-- /.card-body -->
