<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postData =  $request->validate([

            'title' => 'required',
            'description' => 'required|unique:posts',

        ]);

        $post = Post::create([
            'title' => $postData['title'],
            'description' => $postData['description'],
    ]);

        return response()->json(['data' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return response()->json(['message' => 'post edit and uploaded']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();


        return response()->json(['message' => 'Post deleted successfully']);
    }
}
