@extends('layout.master')
@section('title','Permissions')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Permissions</h6>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $key => $permission)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$permissions->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0">{{ $permission->name }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">Show</a>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Permissions empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $permissions->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection