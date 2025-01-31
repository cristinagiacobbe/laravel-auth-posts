@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-sm btn-primary mt-5" href="{{ route('admin.posts.index') }}">Turn back to comics list</a>
        <div class="card mt-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    @if (Str::startsWith($post->cover_image, 'http://'))
                        <img width="300" src="{{ $post->cover_image }}" class="img-fluid rounded-start" alt="">
                    @else
                        <img width="300" src="{{ asset('storage/' . $post->cover_image) }}"
                            class="img-fluid rounded-start" alt="">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->slug }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
