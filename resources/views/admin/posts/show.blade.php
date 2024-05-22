@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
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
