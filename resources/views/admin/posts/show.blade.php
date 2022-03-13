@extends('layout.master')
@section('title','Detail Posts')
@section('content')
<div class="page-header min-height-400 border-radius-xl mt-4" style="background-position-y: 50%;">
    <img src="{{ asset('storage/Post/'.$post->image) }}" class="mask" alt="Posts">
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n3 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
            <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    {{ auth()->user()->name }}
                </h5>
            </div>
        </div>
        <div class="col-auto my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <p class="mb-0 font-weight-bold text-sm">
                    Kategori {{ $post->category->category }}
                </p>
            </div>
        </div>
        <div class="col-auto my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <p class="mb-0 font-weight-bold text-sm">
                    DI Posting {{ $post->DateHuman }}
                </p>
                <p class="mb-0 text-center font-weight-bold text-sm mt-2">
                    <small> {{ $post->Date }} </small>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container my-3">
    <div class="row">
        <div class="col">
            <h5 class="text-center">{{ $post->title }}</h5>
            <p>
                {!! $post->article !!}
            </p>
            <hr>
            <div class="text-center">
                <h5 class="mb-1">
                    @foreach ($post->tags as $item)
                    <span class="badge {{ $item->bg }}">{{ $item->tags }}</span>
                    @endforeach
                </h5>
            </div>
        </div>
    </div>
</div>
@endsection