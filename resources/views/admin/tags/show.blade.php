@extends('layout.master')
@section('title','Post Tag')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Posts Tag {{ $tag->tags }}</h6>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tags</th>
                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $key => $post)
                        <tr>
                            <td class="text-center">
                                <h6 class="mb-0 text-sm">{{ $key+$posts->firstItem() }}</h6>
                            </td>
                            <td class="text-center">
                                <img src="{{ asset('storage/Post/'.$post->image) }}" class="avatar avatar-md" alt="Posts">
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0 d-inline-block text-truncate" style="max-width: 150px;">{{ $post->title }}</h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0 d-inline-block text-truncate" style="max-width: 150px;">{{ $post->category->category }}</h6>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-block text-truncate" style="max-width: 250px;">
                                    @foreach ($post->tags as $tag)
                                        <h6 class="mb-0 {{ $tag->bg }} badge">{{ $tag->tags }}</h6>
                                    @endforeach
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                @can('post_detail')
                                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Show
                                    </a>
                                @endcan
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