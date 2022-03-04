@extends('layout.master')
@section('title','Posts')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Posts Post</h6>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Posts</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Posts</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $key => $Posts)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$posts->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/Posts/'.$Posts->image) }}" class="avatar avatar-md" alt="Posts">
                                </td>
                                <td class="text-center">
                                <h6 class="text-sm mb-0">{{ $Posts->Posts }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('posts.destroy', $Posts->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('posts.edit', $Posts->slug) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Posts empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')