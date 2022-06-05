<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-gray-800 leading-tight">
            <div class="row">
                <div class="col-lg-6 text-2xl">
                    <i class="fa-fw fa-solid fa-tags"></i> {{ __('Post Categories') }}
                </div>
                <div class="col-lg-6 text-right">
                    <a href="{{ route('post-categories.add') }}" class="btn btn-sm btn-primary"><i class="fa-fw fa-solid fa-circle-plus"></i> Add Category</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">

        @if(session("success"))
        <div class="container">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session("success") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <!-- All Categories -->
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-fw fa-solid fa-qrcode"></i> ID</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-tag"></i> Category</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Created By</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Created At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Updated By</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Updated At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-fire"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($postCategories as $postCat)
                                    <tr>
                                        <td>{{ $postCat->id }}</td>
                                        <td>{{ $postCat->category }}</td>
                                        <td>{{ $postCat->getUserFromCreatedBy->name }}</td>
                                        <td>
                                            @if($postCat->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                            @else
                                                {{ $postCat->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($postCat->updated_by == NULL)
                                                <span class="text-danger">No User Set</span>
                                            @else
                                                {{ $postCat->getUserFromUpdatedBy->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($postCat->updated_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                            @else
                                                {{ $postCat->updated_at->diffForHumans() }}

                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('post-categories/edit/'.$postCat->id) }}" class="btn btn-sm btn-warning"><i class="fa-fw fa-solid fa-pen-to-square"></i> Edit</a>
                                            <a href="{{ url('post-categories/remove/'.$postCat->id) }}" class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash-can"></i> Remove</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                        {{-- {{ $postCategories->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-2">
            <hr>
        </div>
        <!-- Deleted Categories -->
        {{-- <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <h5 class="text-danger"><b><i class="fa-fw fa-solid fa-trash-can"></i> Deleted Category List</b></h5>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-fw fa-solid fa-qrcode"></i> ID</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-tag"></i> Category</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Updated By</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Deleted At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-fire"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postCategoriesDeleted as $postCatDel)
                                    <tr>
                                        <td>{{ $postCatDel->id }}</td>
                                        <td>{{ $postCatDel->category }}</td>
                                        <td>
                                            @if($postCatDel->updated_by == NULL)
                                                <span class="text-danger">No User Set</span>
                                            @else
                                                {{ $postCatDel->getUserFromUpdatedBy->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($postCatDel->deleted_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                            @else
                                                {{ $postCatDel->deleted_at->diffForHumans() }}

                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('post-categories/restore/'.$postCatDel->id) }}" class="btn btn-sm btn-primary"><i class="fa-fw fa-solid fa-refresh"></i> Restore</a>
                                            <a href="{{ url('post-categories/delete/'.$postCatDel->id) }}" class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash-can"></i> Delete Permanently</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $postCategoriesDeleted->links() }}
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

</x-app-layout>
