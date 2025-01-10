<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        if ($category == null) {
            return  redirect()->route('home')->with('error', 'Category not found');
        }
        $posts = $category->posts()->with('tags')
            ->orderBy('created_at', 'desc')
            ->where('status', "published")
            ->paginate(4);
        return view('category.index', compact('posts', 'category'));
    }

}
