@extends('layout.master')
@section('title','Roles')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Roles Post</h6>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Roles</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Permissions</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $key => $role)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$roles->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0 d-inline-block text-truncate" style="max-width: 150px;">{{ $role->name }}</h6>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-block text-truncate" style="max-width: 250px;">
                                        @forelse ($role->permissions as $permission)
                                            <h6 class="mb-0 bg-success badge">{{ $permission->name }}</h6>
                                        @empty
                                            <h6 class="mb-0 bg-danger badge">Empty Permissions</h6>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Roles empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $roles->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection