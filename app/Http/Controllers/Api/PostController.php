<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\HttpException;

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

    public function index(Request $request): LengthAwarePaginator
    {   
        return $this->postService->getPostList($request); 
    }

    public function store(Request $request): HttpException|Post
    {
        return $this->postService->createPost($request); 
    }

    public function show(int $id)
    {
        return $this->postService->getPostById($id);
    }

    public function update(Request $request, int $id): HttpException|Post
    {
        return $this->postService->updatePost($request, $id);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->postService->deletePost($id);
    }
}
