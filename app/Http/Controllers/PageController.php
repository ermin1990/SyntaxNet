<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePageRequest;
use App\Models\PageModel;
use App\Repositories\UtilsRepostory;

class PageController extends Controller
{
    private $utilRepository;
    public function __construct()
    {
        $this->utilRepository = new UtilsRepostory();
    }
    public function index()
    {
        $pages = PageModel::with('user')->published()->paginate(5);
        return view('page.index', compact('pages'));
    }

    public function show($slug)
    {
        $page = PageModel::with('user')->where('slug', $slug)->published()->firstOrFail();
        return view('page.show', compact('page'));
    }

    public function addNew()
    {
        dd('Page add method reached');
        return view('page.add');
    }

    public function store(SavePageRequest $request)
    {


        PageModel::create([
            'title' => $request->title,
            'textcontent' => $request->textcontent,
            'slug' => $this->utilRepository->generatePageUniqueSlug($request->title),
            'status' => $request->status ?? 'draft',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('page.index')->with('success', 'Page created successfully.');
    }


    public function edit(PageModel $page)
    {
        return view('page.edit', compact('page'));
    }


    public function update(SavePageRequest $request, PageModel $page)
    {
        if ($page->user_id !== auth()->id()) {
            return redirect()->route('page.index')->with('error', 'You are not authorized to edit this page.');
        }

        try {
            $page->update([
                'title' => $request->title,
                'textcontent' => $request->textcontent,
                'slug' => $this->utilRepository->generatePageUniqueSlug($request->title),
                'status' => $request->status ?? 'draft',
                'user_id' => auth()->id(),
            ]);
            return redirect()->route('page.index')->with('success', 'Page updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('page.index')->with('error', 'An error occurred while updating the page.');
        }
    }

    public function destroy(PageModel $page)
    {
        if ($page->user_id !== auth()->id()) {
            return redirect()->route('page.index')->with('error', 'You are not authorized to delete this page.');
        }
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Page deleted successfully.');
    }

}
