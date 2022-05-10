<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="row">
                <div class="col-lg-6 position-relative">
                    <i class="fa-solid fa-tags"></i> {{ __('Post Categories') }}
                </div>
                <div class="col-lg-6 position-relative">
                    <button class="btn btn-primary position-absolute top-0 end-0"><i class="fa-solid fa-circle-plus"></i> Add Category</button>
                </div>
            </div>
        </h2>
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
                                            <a class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            <a class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
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
