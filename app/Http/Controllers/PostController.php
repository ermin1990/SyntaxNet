<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\PostTagModel;
use App\Models\TagModel;
use App\Repositories\UtilsRepostory;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $utilRepository;
    private $postCategory;
    private $postTag;

    public function __construct()
    {
        $this->utilRepository = new UtilsRepostory();
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
            ->orderBy('created_at', 'desc')
            ->where('status', "published")
            ->get();
        return $posts;

    }
    public function create()
    {
        //
    }

    public function store(PostRequest $request)
    {


        $post = PostModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $this->utilRepository->generatePostUniqueSlug($request->title),
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


    public function show(string $slug)
    {
        $post = PostModel::with('tags','comments','category')->where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }


    public function edit(string $id)
    {
        $post = PostModel::with('tags')->findOrFail($id);
        if($post){
            $categories = CategoryModel::all();
            $alltags = TagModel::all();
            return view('posts.edit', compact('post', 'categories', 'alltags'));
        }

        return redirect()->route('home')->with('error', 'Post not found');
    }



    public function update(UpdatePostRequest $request, string $id)
    {

        $post = PostModel::where('id', $id)->first();

        if ($post) {
            if (!auth()->check() || auth()->user()->getAuthIdentifier() != $post->user_id) {
                return redirect()->route('home')->with('error', 'You are not authorized to edit this post');
            }
            $post->title = $request->title;
            $post->description = $request->description;
            $post->category_id = $request->category_id;
            $post->slug = $this->utilRepository->generatePostUniqueSlug($request->title);
            $post->save();
            $post->tags()->sync($request->tag);
            return redirect()->route('home')->with('success', 'Post updated successfully');
        }

        return redirect()->route('home')->with('error', 'Post not found');
    }

    public function destroy(string $id)
    {
        $post = PostModel::where('id', $id)->first();

        if ($post) {
            if (!auth()->check() || auth()->user()->getAuthIdentifier() != $post->user_id) {
                return redirect()->route('home')->with('error', 'You are not authorized to delete this post');
            }

            $post->tags()->delete();
            $post->delete();

            return redirect()->route('home')->with('success', 'Post deleted successfully');
        }

        return redirect()->route('home')->with('error', 'Post not found');
    }

    public function getPostsByTag($id)
    {

        $tag = TagModel::where('id', $id)->first();
        if ($tag == null) {
            return redirect()->route('home')->with('error', 'Tag not found');
        }
        $posts = PostModel::with('tags')
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tag_id', $tag->id);
            })
            ->orderBy('created_at', 'desc')
            ->where('status', "published")
            ->paginate(3);
        return $posts;
    }

}
