<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Basic logic: Fetch all posts from the database using the Model
        $posts = Post::all();

        // Return a view, passing the posts data to it
        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Basic logic: Validate the request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Basic logic: Create a new post record using the Model
        $post = Post::create($validated);

        // Redirect the user after successful creation
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
