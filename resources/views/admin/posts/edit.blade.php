@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Add a new comic</h1>

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helptitle"
                    placeholder="Type a title for your comic" />
                <small id="helptitle" class="form-text text-muted">Type comic title</small>
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image</label>
                <input type="file" enctype="multipart/form-data" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="helpcover_image" placeholder="Here you can upload an image for your comic" />
                <small id="helpcover_image" class="form-text text-muted">Upload cover_image</small>
            </div>


            <div class="mb-3">
                <label for="content" class="form-label"></label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>

            <button type="submit">Create</button>

        </form>
    </div>
@endsection
