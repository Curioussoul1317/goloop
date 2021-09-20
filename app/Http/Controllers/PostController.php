<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\like;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        //
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
        // post ype
        // 0 nomal post
        // 1 event post
        // 2 medals


        if ($request->input('posttype') == 0) {
            $filenamewithExt = $request->file('Image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('Image')->storeAs('public/UserPost', $fileNameToStore);
            $post = new post();
            $post->title = $request->input('title');
            $post->user_id = auth()->user()->id;
            $post->event_id = null;
            $post->img = $fileNameToStore;
            $post->event_progress = 0;
            $post->progress_date = date("Y/m/d");
            $post->team_id = null;
            $post->user_comment = $request->input('comments');
            $post->posttype = $request->input('posttype');
            $post->privacy = auth()->user()->post_privacy;
            $post->save();
        } else {
            $post = new post();
            $filenamewithExt = $request->file('Image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('Image')->storeAs('public/UserPost', $fileNameToStore);
            $post->title = $request->input('title');
            $post->user_id = auth()->user()->id;
            $post->event_id = $request->input('event');
            $post->img = $fileNameToStore;
            $post->event_progress = $request->input('Km');
            $post->progress_date = $request->input('date');
            if ($request->input('team') != 0) {
                $post->team_id = $request->input('team');
            } else {
                $post->team_id = null;
            }
            $post->user_comment = $request->input('comments');
            $post->posttype = $request->input('posttype');
            $post->privacy = auth()->user()->post_privacy;
            $post->save();
        }

        return redirect()->back()->with(session()->flash('alert-success', 'Posted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = post::find($request->input('id'));
        if ($post->user_id == auth()->user()->id) {
            $likes = like::where('post_id', '=', $request->input('id'))->get();
            foreach ($likes as $like) {
                $like->delete();
            }
            $comments = comment::where('post_id', '=', $request->input('id'))->get();
            foreach ($comments as $comment) {
                $comment->delete();
            }
            $post->delete();
            return redirect()->back()->with(session()->flash('alert-success', 'Post has been removed'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Couldnt remove the Post'));
        }
    }
}
