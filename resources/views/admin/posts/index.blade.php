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

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $post->id }}"><i class="fa-solid fa-ban"></i>
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $post->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $post->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $post->id }}">
                                                    Delete post n.{{ $post->id }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are tou really sure? 🧐</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>




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
