<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PageModel;
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

        $pages = PageModel::all()->take(4);
        return view('home', compact('posts', 'categories', 'alltags', 'pages'));
    }




}
