@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Add a new comic</h1>

        <div class="mt-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helptitle"
                placeholder="Insert a comic title" />
            {{--  <small id="helpId" class="form-text text-muted">Title of comic</small> --}}
        </div>

        <div class="mt-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helptitle"
                placeholder="Insert a comic title" />
            {{--  <small id="helpId" class="form-text text-muted">Title of comic</small> --}}
        </div>

        <div class="mt-5">
            <label for="title" class="form-label">Comic cover image</label>
            <input type="file" enctype="multipart/form-data" class="form-control" name="cover_image" id="cover_image"
                aria-describedby="helpcover_image" placeholder="Insert cover image to your comic" />
            {{--  <small id="helpId" class="form-text text-muted">cover_image of comic</small> --}}
        </div>

    </div>
@endsection
