<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::of($request->title)->slug('-');


        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        };

        Post::create($val_data);
        return to_route('admin.posts.index')->with('message', 'Post created miracolously😄');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::of($request->title)->slug('-');

        if ($request->has('cover_image')) {
            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }
        }
        $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);

        $post->update($val_data);
        return to_route('admin.posts.index')->with('message', 'Post updated miracolously😄');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
