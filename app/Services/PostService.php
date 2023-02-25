<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;


class PostService
{
    public function getPostList(Request $request): LengthAwarePaginator
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
}