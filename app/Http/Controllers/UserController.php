<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Post;
use App\Totalization;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $totalizations = Totalization::where('user_id', $user->id)->avg('evaluation');
        // dd($totalizations);
        $totalization = round($totalizations);
        return view('users.index', [
            'user' => $user,
            'totalization' => $totalization,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $post = Post::where('host_id', $id)->first();
        // dd($post);
        $host = User::where('id', $post->host_id)->first();
        // dd($host);
        $totalizations = Totalization::where('user_id', $id)->avg('evaluation');
        // dd($totalizations);
        $totalization = round($totalizations);
        // dd($totalization);

        // $newratings = Rating::where('post_id', $request->post_id)->avg('user_evaluation');
        // $ave = round($newratings);

        return view('users.show', [
            'host' => $host,
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
        $user = Auth::user();
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        if($request->file('user_img') !== null){
            if($request->file('user_img')->isValid()){
                $filename = $request->file('user_img')->store('public/image');
                $user->user_img = basename($filename);
            }
        };

        $user->save();

        return redirect()->route('users.index', [$user->id])->with('status', '内容を変更しました。');
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
