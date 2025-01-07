<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\CommentModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function store(CommentRequest $request)
    {
        try {
            CommentModel::create([
                'post_id' => $request->post_id,
                'textcomment' => $request->textcomment,
                'user_id' => auth()->user()->id
            ]);
            return redirect()->back()->with('success', 'Comment created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit(CommentModel $comment)
    {
        //
    }


    public function update(Request $request, CommentModel $comment)
    {
        //
    }


    public function destroy(CommentModel $comment)
    {

        if($comment->user_id == auth()->user()->id){
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        }else{
            return redirect()->back()->with('error', 'You are not authorized to delete this comment');
        }
    }
}
