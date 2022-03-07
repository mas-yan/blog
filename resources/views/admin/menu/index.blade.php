@extends('layout.master')
@section('title','Menu')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Menu Post</h6>
                <a href="{{ route('menu.create') }}" class="btn btn-primary">Add Menu</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Links</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menus as $key => $menu)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$menus->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0">{{ $menu->menu }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0">{{ $menu->link }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('menu.destroy', $menu->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('menu.edit', $menu->slug) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Menu empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection