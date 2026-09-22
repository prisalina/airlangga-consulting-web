<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with('category')->paginate(9);
        $categories = PostCategory::withCount(['posts' => fn ($q) => $q->published()])->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        if (! $post->is_active || ! $post->published_at || $post->published_at->isFuture()) {
            abort(404);
        }
        $post->load('category');
        $related = Post::published()->with('category')
            ->where('id', '!=', $post->id)
            ->where('post_category_id', $post->post_category_id)
            ->limit(3)->get();

        return view('blog.show', compact('post', 'related'));
    }
}
