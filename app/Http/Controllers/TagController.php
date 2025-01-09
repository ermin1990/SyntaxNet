<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\TagModel;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $postController;

    public function __construct(PostController $postController)
    {
        $this->postController = $postController;
    }


    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $tag = TagModel::where('slug', $slug)->first();
        if ($tag == null) {
            return  redirect()->route('home')->with('error', 'Tag not found');
        }
        $posts = $this->postController->getPostsByTag($tag->id);
        return view('tag.index', compact('posts', 'tag'));
    }

}
