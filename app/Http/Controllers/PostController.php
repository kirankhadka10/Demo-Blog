<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('media')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required',],
            'body' => ['required',],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,gif'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],

            // 'slug' => ['required', 'unique:posts,slug'],
            // 'type' => ['required',],
            // 'media_id' => ['nullable'],
            // 'user_id' => ['required']
        ]);

        if (!empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), 'posts');
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
            'media_id' => $media_id ?? null,
        ]);

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $post_cat = $post->categories->pluck('id')->toArray();
        return view('posts.edit', compact('post', 'categories', 'post_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required',],
            'body' => ['required',],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,gif'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],

            // 'slug' => ['required', 'unique:posts,slug'],
            // 'type' => ['required',],
            // 'media_id' => ['nullable'],
            // 'user_id' => ['required']
        ]);

        if (!empty($request->file('image'))) {
            if ($post->media_id) {
                Storage::delete("public/" . $post->media->path);
            }
            $media_id = MediaService::upload($request->file('image'), 'posts');
        }

        $post->update([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
            'media_id' => $media_id ?? $post->media_id,
        ]);

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->media_id) {
            Storage::delete("public/" . $post->media->path);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('Success', 'Post Deleted Successfully');
    }
}
