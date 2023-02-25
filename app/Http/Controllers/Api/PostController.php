<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $page = $request->input('page', 1);

        // // Make a request to the dummy JSON API and retrieve the posts for the current page
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts', [
        //     'userId' => 1,
        //     '_page' => $page,
        //     '_limit' => 30,
        // ]);
    
        // $posts = $response->json();
        
        return response()->json(['d'=> 1]);
        // Return the posts as a JSON response
        // return response()->json([
        //     'posts' => $posts,
        //     'current_page' => $page,
        //     'last_page' => 5, // Hard-coded for this example, but you could calculate this dynamically based on the total number of posts
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
