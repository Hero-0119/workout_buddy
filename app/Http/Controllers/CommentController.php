<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\User;
use App\Gym;
use App\PostUser;
use App\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comments = Comment::where('post_id', '=', $id)->orderBy('created_at')->get();
        $comments->load('user');
        return view('comments.index', [
            'id' => $id,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('comments.create', [
            'id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if(isset($request)){
            $comments = new Comment;
            $input = $request->all();
            $comments = $comments->create($input);
        }
        $comments->save();
        return redirect()->route('posts.comments.index', [$comments->post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $id)
    {
        $commnet = Comment::findOrFail($id);
        $commnet->delete();
        return redirect()->route('posts.comments.index', [$post_id]);
    }
}
