@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-primary">
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
                            <td><img width="150" src="{{ $post->cover_image }}" alt=""></td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post) }}">View</a>
                                <a href="">Edit</a>
                                <a href="">Delete</a>
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
