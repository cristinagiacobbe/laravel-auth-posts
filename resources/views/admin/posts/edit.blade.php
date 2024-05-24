@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Update post n.{{ $post->id }}</h1>

        @include('partials.errors')

        <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                    aria-describedby="helptitle" placeholder="Type here to change post title"
                    value="{{ old('title') ?: $post->title }}" />
                <small id="helptitle" class="form-text text-muted">Update post title</small>

                @error('title')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image</label>
                <div>
                    @if (Str::startsWith($post->cover_image, 'http://'))
                        <img width="100" src="{{ $post->cover_image }}" alt="">
                    @else
                        <img width="100" src="{{ asset('storage/' . $post->cover_image) }}" alt="">
                    @endif
                </div>

                <input type="file" class="form-control @error('cover_image')is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="helpcover_image"
                    placeholder="Here you can upload an image for your comic" />
                <small id="helpcover_image" class="form-text text-muted">Upload cover_image</small>

                @error('cover_image')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="content" class="form-label"></label>
                <textarea class="form-control" name="content" id="content" rows="3">{{ old('content') ?: $post->content }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
            <button class="btn btn-danger">Turn back to comic list</button>

        </form>
    </div>
@endsection
