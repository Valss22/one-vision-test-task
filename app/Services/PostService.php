<?php
namespace App\Services;

require_once app_path('helpers.php');

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

use App\Models\Post;


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
    public function createPost(Request $request): Post
    {
        $validatedData = validateRequestBody($request, [
            'title' => 'required|max:128',
            'body' => 'required',
            'author_name' => 'required|max:128',
        ]);
        $post = Post::create([
            'author_name' => $validatedData['author_name'],
        ]);
        return $post;
    }
}