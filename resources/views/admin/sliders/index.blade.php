@extends('layout.master')
@section('title','Slider')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6>Slider Post</h6>
                <a href="{{ route('sliders.create') }}" class="btn btn-primary">Add Slider</a>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Link</th>
                                <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $key => $slider)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0 text-sm">{{ $key+$sliders->firstItem() }}</h6>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/Slider/'.$slider->image) }}" class="avatar avatar-md" alt="slider">
                                </td>
                                <td class="text-center">
                                    <h6 class="text-sm mb-0">{{ $slider->link }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('sliders.destroy', $slider->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('sliders.edit', $slider->slug) }}" class="btn btn-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('are you sure delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-danger text-white">
                                    Slider empty
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection