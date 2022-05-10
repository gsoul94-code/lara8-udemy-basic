<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }} <small>- All users data</small>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <h5>Users Total: {{ count($usersData) }}</h5>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersData as $uData)
                                    <tr>
                                        <td>{{ $uData->id }}</td>
                                        <td>{{ $uData->name }}</td>
                                        <td>{{ $uData->email }}</td>
                                        <td>{{ $uData->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-warning">✏️ Edit</a>
                                            <a class="btn btn-danger">🗑 Delete</a>
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
