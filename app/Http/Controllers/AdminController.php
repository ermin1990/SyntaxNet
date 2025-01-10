<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\PageModel;
use App\Models\PostModel;
use App\Models\TagModel;
use App\Models\User;
use App\Repositories\UtilsRepostory;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $utilRepository;
    private $activityService;

    public function __construct()
    {
        $this->utilRepository = new UtilsRepostory();
        $this->activityService = new ActivityService();
    }
//  Admin
    public function index()
    {
        $users = User::all();
        $posts = PostModel::all();
        $comments = CommentModel::all();
        $pages = PageModel::all();

        $activities = $this->activityService->getRecentActivities($users, $posts, $comments, $pages);

        return view('admin.index', compact('users', 'posts', 'comments', 'pages', 'activities'));

    }


    //    Users
    public function users()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    public function useredit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function userdelete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function userupdate(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index');


    }



    //    Posts
    public function posts()
    {
        $posts = PostModel::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }
    public function postedit($post)
    {
        $post = PostModel::with('user', 'category', 'tags', 'comments')->findOrFail($post);
        $categories = CategoryModel::all();
        $alltags = TagModel::all();

        return view('admin.posts.edit', compact('post', 'categories', 'alltags'));
    }
    public function postdelete(PostModel $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
    public function postupdate(PostModel $post, UpdatePostRequest $request)
    {
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->slug = $this->utilRepository->generatePostUniqueSlug($request->title);
        $post->save();
        $post->tags()->sync($request->tag);
        return redirect()->route('admin.posts.index');
    }




    //    Pages
    public function pages()
    {
        $pages = PageModel::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.page.index', compact('pages'));
    }
    public function pageedit($id)
    {
        $page = PageModel::with('user')->where('id', $id)->first();
        return view('admin.page.edit', compact('page'));
    }
    public function pageupdate(PageModel $page, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'textcontent' => 'required',
        ]);
        $page->title = $request->title;
        $page->textcontent = $request->textcontent;
        $page->save();
        return redirect()->route('admin.page.index');
    }
    public function pagedelete(PageModel $page)
    {
        $page->delete();
        return redirect()->route('admin.page.index');
    }




    //    Tags
    public function tags()
    {
        $tags = TagModel::all();
        return view('admin.tags.index', compact('tags'));
    }
    public function tagedit($id)
    {
        $tag = TagModel::where('id', $id)->first();
        return view('admin.tags.edit', compact('tag'));
    }
    public function tagupdate(TagModel $tag, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag->name = $request->name;
        $tag->slug = $this->utilRepository->generateTagUniqueSlug($request->name);

        if ($tag->save()) {
            return redirect()->route('admin.tag.index');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }
    public function tagdelete(TagModel $tag)
    {
        if ($tag->posts->count() > 0) {
            return redirect()->back()->with('error', 'Tag has posts');
        }
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
    public function tagstore(Request$request)
    {
        $tag = new TagModel();
        $tag->name = $request->name;
        $tag->slug = $this->utilRepository->generateTagUniqueSlug($request->name);
        if ($tag->save()) {
            return redirect()->route('admin.tag.index');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }



    //    Categories
    public function categories()
    {
        $categories = CategoryModel::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function categoryedit($id)
    {
        $category = CategoryModel::where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }
    public function categoryupdate(CategoryModel $category, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->name = $request->name;
        $category->slug = $this->utilRepository->generateCategoryUniqueSlug($request->name);
        if ($category->save()) {
            return redirect()->route('admin.category.index');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function categorydelete(CategoryModel $category)
    {
        if ($category->posts->count() > 0) {
            return redirect()->back()->with('error', 'Category has posts');
        }
        $category->delete();
        return redirect()->route('admin.category.index');
    }
    public function categorystore(Request$request)
    {
        $category = new CategoryModel();
        $category->name = $request->name;
        $category->slug = $this->utilRepository->generateCategoryUniqueSlug($request->name);
        if ($category->save()) {
            return redirect()->route('admin.category.index');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }


}
