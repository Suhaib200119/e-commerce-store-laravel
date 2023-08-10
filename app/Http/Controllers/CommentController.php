<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Auth::user()->products;
        $commentsArray=array();
        foreach ($products as $product) {
            array_push($commentsArray,$product->comments);
        }
        return view("cms.comments.comment-index",[
            "comments"=>$commentsArray,
        ]);
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
    public function store(CommentRequest $request)
    {
        $request->validated();
        $comment=new Comment();
        $comment->user_id =Auth::id();
        $comment->product_id=$request->post("product_id");
        $comment->comment=$request->post("comment");
        $comment->ip_address=$request->ip();
        $comment->user_agent=$request->header("user-agent");
        $comment->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $count = Comment::destroy($comment->id);
        if ($count > 0) {
            return response()->json([
                "status" => true
            ], 200);
        } else if ($count <= 0) {
            return response()->json([
                "status" => false
            ], 400);
        }
    }
}
