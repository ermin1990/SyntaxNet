<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Models\TagModel;

class HomeController extends Controller
{
    private $postController;

    public function __construct(PostController $postController)
    {
        $this->postController = $postController;
    }


        public function index()
    {
        $categories = CategoryModel::all();
        $alltags = TagModel::all();
        $posts = PostModel::with('tags')
            ->orderBy('created_at', 'desc')
            ->where('status', "published")
            ->paginate(3);

//        dd($posts);

        return view('home', compact('posts', 'categories', 'alltags'));
    }




}
