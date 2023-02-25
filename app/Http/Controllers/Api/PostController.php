<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {   
        $page = $request->query('page', 1);
        $response = Http::get('https://dummyjson.com/posts/?limit=150');

        $posts = collect($response->json()['posts']);

        $perPage = 30;
        $totalPosts = 150;

        $offset = ($page - 1) * $perPage;
        $paginatedPosts = $posts->slice($offset, $perPage);

        return new LengthAwarePaginator(
            $paginatedPosts,
            $totalPosts,
            $perPage,
            $page
        );    
    }

    public function store(Request $request)
    {
        //
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
