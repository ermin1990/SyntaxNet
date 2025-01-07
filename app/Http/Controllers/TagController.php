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
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagModel $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagModel $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagModel $tag)
    {
        //
    }
}
