<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostFrontController extends Controller
{
    public function index(Category $category, Post $post)
    {
        $post = Post::findOrFail($post->id);
        $category = $post->category; // Access related category through post relationship
        $posts = Post::all();
        $categories = Category::with('posts')->get(); // Get all categories (optional for filtering/display)
        return view('front.single', compact('post', 'categories', 'category', 'posts'));
    }
}
