<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    protected $postService;
    
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {   
        return $this->postService->getPostList($request); 
    }

    public function store(Request $request)
    {
        return $this->postService->createPost($request); 
    }

    public function show(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }
    public function destroy(Post $post)
    {
        //
    }
}
