<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\PostTagModel;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postRepository;
    private $postCategory;
    private $postTag;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->postCategory = new CategoryModel();
        $this->postTag = new PostTagModel();
    }

    public function index()
    {
        //
    }

    public function getAll()
    {
        $posts = PostModel::with('tags')
            ->orderBy('created_at', 'asc')
            ->where('status', "published")
            ->get();
        return $posts;

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {


        $post = PostModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $this->postRepository->generateUniqueSlug($request->title),
            'user_id' => auth()->user()->id,
            'category_id' => $request->category
        ]);



        if(isset($request->tag)){
            foreach ($request->tag as $tag) {
                $this->postTag->create([
                    'post_id' => $post->id,
                    'tag_id' => $tag
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'PostRequest created successfully');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
