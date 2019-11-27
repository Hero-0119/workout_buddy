<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Gym;
use App\PostUser;
use Carbon\Carbon;
use App\Comment;
use App\Rating;
use App\Totalization;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joinposts = PostUser::where('user_id', Auth::id())->get();
        // dd($joinposts);
        $posts = Post::where('event_date', '<', Carbon::now()->toDateString())->orderBy('event_date','desc')->get();
        // dd($posts);

        return view('ratings.index', [
            'joinposts' => $joinposts,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mypost = $request;
        // dd($mypost->user_id);
        return view('ratings.create', [
            'mypost' => $mypost,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RateRequest $request)
    {
        // dd($request);
        if(isset($request)){
            $ratings = new Rating;
            $input = $request->all();
            $ratings = $ratings->create($input);
        }
        $ratings->save();

        $newratings = Rating::where('post_id', $request->post_id)->avg('user_evaluation');
        $ave = round($newratings);
        // dd($ave);
        $totalization = Totalization::updateOrCreate(
            [
                'post_id' => $request->post_id,
            ],
            [
                'evaluation' => $ave,
                'user_id' => $request->host_id,
                'post_id' => $request->post_id,
            ]
        );
        $totalization->save();

        return redirect(route('users.show', $request->host_id))->with('status', '評価しました。');
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
    public function destroy($id)
    {
        //
    }
}
