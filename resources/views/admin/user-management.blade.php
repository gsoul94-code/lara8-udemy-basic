<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-gray-800 leading-tight">
            <div class="col-lg-12 text-2xl">
                <i class="fa-fw fa-solid fa-users"></i> {{ __('User Management') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <h5>Users Total: <b>{{ count($usersData) }}</b></h5>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
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
                                        {{-- <td>{{ $uData->created_at->diffForHumans() }}</td> <!-- you can use it, if you use Eloquent ORM --> --}}
                                        <td>{{ Carbon\Carbon::parse($uData->created_at)->diffForHumans() }}</td> <!-- you can use it, if you use Query Builder -->
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
