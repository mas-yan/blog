@extends('layout.master')
@section('title','Tags')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Tags Post</h6>
                <a href="{{ route('tags.create') }}" class="btn btn-primary">Add Tags</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tags</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $key => $tag)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$tags->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                <h5 class="mb-0 {{ $tag->bg }} badge">{{ $tag->tags }}</h5>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('tags.destroy', $tag->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('tags.edit', $tag->slug) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Tags empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection