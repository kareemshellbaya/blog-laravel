<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::with('posts')->get();
        return view('welcome', compact('categories', 'posts'));
    }
}
