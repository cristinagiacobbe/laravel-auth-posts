@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.success')

        <div class="table-responsive">
            <table class="table table-primary">
                <a class="btn btn-info m-2" href="{{ route('admin.posts.create') }}">Add a new comic</a>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">title</th>
                        <th scope="col">Cover_image</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="">
                            <td scope="row">{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>

                            <td>
                                @if (Str::startsWith($post->cover_image, 'http://'))
                                    <img width="100" src="{{ $post->cover_image }}" alt="">
                                @else
                                    <img width="100" src="{{ asset('storage/' . $post->cover_image) }}" alt="">
                                @endif
                            </td>

                            <td>{{ $post->slug }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-binoculars"></i>
                                    View</a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-pencil"></i>
                                    Edit</a>
                                <a href="" class="btn btn-danger ">
                                    <i class="fa-solid fa-ban"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="5">No posts found</td>

                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>
    </div>
@endsection
