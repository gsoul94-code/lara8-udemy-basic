<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-gray-800 leading-tight">
            <div class="col-lg-12 text-2xl">
                <i class="fa-fw fa-solid fa-users"></i> {{ __('User Management') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        @if(session("message"))
            <div class="container">
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session("message") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-fw fa-solid fa-qrcode"></i> ID</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-quote-left"></i> Name</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-envelope"></i> Email</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Created by</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Created At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Updated by</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Updated At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-fire"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersData as $uData)
                                    <tr>
                                        <td>{{ $uData->id }}</td>
                                        <td>{{ $uData->name }}</td>
                                        <td>{{ $uData->email }}</td>
                                        <td>
                                            @if($uData->created_by == "")
                                                <span class="text-danger">No User Set</span>
                                            @elseif($uData->created_by === 0)
                                                <span class="text-danger">By System</span>
                                            @else
                                                {{ $uData->getUserFromCreatedBy->name }}
                                            @endif
                                        </td>
                                        <td>{{ $uData->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($uData->updated_by == NULL)
                                                <span class="text-danger">No User Set</span>
                                            @else
                                                {{ $uData->getUserFromUpdatedBy->name }}
                                            @endif
                                        </td>
                                        <td>{{ $uData->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('user-management/remove/'.$uData->id) }}" class="btn btn-sm btn-danger"><i class="fa-fw fa-solid fa-trash-can"></i> Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usersData->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <hr/>
        </div>
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <h5 class="text-danger"><b><i class="fa-fw fa-solid fa-trash-can"></i> Removed Users List</b></h5>
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-fw fa-solid fa-qrcode"></i> ID</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-quote-left"></i> Name</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-envelope"></i> Email</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Created by</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Created At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-user"></i> Updated by</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-clock"></i> Updated At</th>
                                    <th scope="col"><i class="fa-fw fa-solid fa-fire"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersDataRemoved as $usrDtRm)
                                    <tr>
                                        <td>{{ $usrDtRm->id }}</td>
                                        <td>{{ $usrDtRm->name }}</td>
                                        <td>{{ $usrDtRm->email }}</td>
                                        <td>
                                            @if($usrDtRm->created_by == "")
                                                <span class="text-danger">No User Set</span>
                                            @elseif($usrDtRm->created_by === 0)
                                                <span class="text-danger">By System</span>
                                            @else
                                                {{ $usrDtRm->getUserFromCreatedBy->name }}
                                            @endif
                                        </td>
                                        <td>{{ $usrDtRm->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($usrDtRm->updated_by == NULL)
                                                <span class="text-danger">No User Set</span>
                                            @else
                                                {{ $usrDtRm->getUserFromUpdatedBy->name }}
                                            @endif
                                        </td>
                                        <td>{{ $usrDtRm->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('user-management/restore/'.$usrDtRm->id) }}" class="btn btn-sm btn-primary"><i class="fa-fw fa-solid fa-refresh"></i> Restore</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usersDataRemoved->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
