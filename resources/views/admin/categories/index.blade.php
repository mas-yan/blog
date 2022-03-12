@extends('layout.master')
@section('title','Category')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Category Post</h6>
                @can('category_create')
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
                @endcan
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                @canany(['category_update','category_delete','category_detail'])
                                    <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key => $category)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$categories->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/Category/'.$category->image) }}" class="avatar avatar-md" alt="category">
                                </td>
                                <td class="text-center">
                                <h6 class="text-sm mb-0">{{ $category->category }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        @can('category_detail')
                                            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Show
                                            </a>
                                        @endcan
                                        @can('category_update')
                                            <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('category_delete')
                                            <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Category empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection