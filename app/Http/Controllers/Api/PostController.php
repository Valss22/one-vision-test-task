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

    public function show(int $id)
    {
        return $this->postService->getPostById($id);
    }

    public function update(Request $request, int $id)
    {
        return $this->postService->updatePost($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->postService->deletePost($id);
    }
}
