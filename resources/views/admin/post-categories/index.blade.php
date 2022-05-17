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
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <h5>Category Total : <b>{{ count($postCategories) }}</b></h5>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postCategories as $postCat)
                                    <tr>
                                        <td>{{ $postCat->id }}</td>
                                        <td>{{ $postCat->category }}</td>
                                        <td>{{ $postCat->created_by }}</td>
                                        <td>{{ $postCat->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"><i class="fa-fw fa-solid fa-pen-to-square"></i> Edit</a>
                                            <a class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash-can"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
