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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryModel $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryModel $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryModel $postCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryModel $postCategory)
    {
        //
    }
}
