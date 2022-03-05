@extends('layout.master')
@section('title','Users')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Users Post</h6>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add Users</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$users->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0 d-inline-block text-truncate" style="max-width: 150px;">{{ $user->name }}</h6>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-block text-truncate" style="max-width: 250px;">
                                        @forelse ($user->roles as $role)
                                            <h6 class="mb-0 bg-success badge">{{ $role->name }}</h6>
                                        @empty
                                            <h6 class="mb-0 bg-danger badge">Empty Role</h6>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Users empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection