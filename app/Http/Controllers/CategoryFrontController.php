<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryFrontController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        $categories = Category::all();
        return view('front.category', compact('category', 'posts', 'categories'));
    }
}
