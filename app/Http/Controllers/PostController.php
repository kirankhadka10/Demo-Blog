<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            // 'slug' => ['required', 'unique:posts,slug'],
            'body' => ['required',],
            // 'type' => ['required',],
            // 'media_id' => ['nullable'],
            // 'user_id' => ['required']
        ]);

        Post::create([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
        ]);

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
        return view('posts.edit', compact('post'));
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
            // 'slug' => ['required', 'unique:posts,slug'],
            'body' => ['required',],
            // 'type' => ['required',],
            // 'media_id' => ['nullable'],
            // 'user_id' => ['required']
        ]);

        $post->update([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
        ]);

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
        $post->delete();

        return redirect()->route('posts.index')->with('Success', 'Post Deleted Successfully');
    }
}
