<?php
namespace App\Services;

require_once app_path('helpers.php');

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\JsonResponse;

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

    public function getPostById(int $id)
    {
        $post = Post::findOrFail($id);
        $response = Http::get("https://dummyjson.com/posts/$id");
        return $response->json();
    }

    public function createPost(Request $request): HttpException|Post
    {
        $validatedData = validateRequestBody($request, [
            'title' => 'required|max:128',
            'body' => 'required',
            'author_name' => 'required|max:128',
        ]);
        $post = Post::create([
            'author_name' => $validatedData['author_name'],
            'user_id' => $request->user()->id,
        ]);
        return $post;
    }

    public function updatePost(Request $request, int $id): HttpException|Post
    {
        $validatedData = validateRequestBody($request, [
            'title' => 'required|max:128',
            'body' => 'required',
            'author_name' => 'required|max:128',
        ]);
        $post = Post::findOrFail($id);

        if ($post->user->id === $request->user()->id)
        {
            $post->update(['author_name' => $validatedData['author_name']]);
            return $post;
        }
        abort(403);
    }

    public function deletePost(int $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        if ($post->user->id === $request->user()->id)
        {
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully']);
        }
        abort(403);
    }
}