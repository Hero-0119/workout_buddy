<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;
use App\Post;
use App\User;
use App\Gym;
use App\PostUser;
use Carbon\Carbon;
use App\Comment;
use App\Totalization;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('event_date', '>=', Carbon::now()->toDateString())->orderBy('event_date')->orderBy('start_time')->orderBy('created_at')->get();

        $dposts = Post::where('event_date', '=<', Carbon::now()->toDateString())->where('end_time', '<', Carbon::now()->toTimeString())->get();
        foreach($dposts as $dpost){
            $dcomments = Comment::where('post_id', $dpost->id)->get();
            foreach($dcomments as $dcomment){
            $dcomment->delete();
            }
        }

        $posts->load('gym');
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gyms = Gym::all();
        // $posts = Post::all();
        // $posts->load('gym');
        return view('posts.create', [
            'gyms' => $gyms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        if ($gym_img = $request->file('gym_img')) {
            $image_name = $gym_img->getRealPath();
            // Cloudinaryへアップロード
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            // 直前にアップロードした画像のユニークIDを取得します。
            $publicId = Cloudder::getPublicId();
            // URLを生成します
            $logoUrl = Cloudder::show($publicId, [
                'width'     => $width,
                'height'    => $height
            ]);
        }

        if($request->file('gym_img')->isValid()){
            $post = new Post;
            $input = $request->all();
            $post = $post->create($input);
            $filename = $request->file('gym_img')->store('public/image');
            $post->gym_img = basename($filename);

            $post->save();
        }

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $postusers = PostUser::where('post_id', $post->id)->get();
        // dd($postusers)
        $joinuser = PostUser::where('post_id', $post->id)->where('user_id', Auth::id())->first();
        $count = PostUser::where('post_id', $post->id)->count();
        $date = Carbon::now()->toDateString();
        // dd($post);
        $totalizations = Totalization::where('user_id', $post->host_id)->avg('evaluation');
        $totalization = round($totalizations);
        // dd($totalization);

        return view('posts.show', [
            'post' => $post,
            // 'postusers' => $postusers,
            'count' => $count,
            'joinuser' => $joinuser,
            'date' => $date,
            'totalization' => $totalization,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gyms = Gym::all();
        $post = Post::findOrFail($id);
        return view('posts.edit', [
            'post' => $post,
            'gyms' => $gyms,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        if($request->file('gym_img') !== null){
            if($request->file('gym_img')->isValid()){
                $filename = $request->file('gym_img')->store('public/image');
                $post->gym_img = basename($filename);
            }
        };

        $post->save();

        return redirect()->route('posts.show', [$post->id])->with('status', '内容を変更しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }
}
