<?php

namespace App\Http\Controllers;

use App\Models\follow;
use App\Models\user_notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $follow = new follow();
        $follow->follower_id = Auth::user()->id;
        $follow->following_id = $id;
        $follow->status = 0;
        $follow->save();

        $user_notifications = new user_notifications();
        $user_notifications->by_user_id = Auth::user()->id;
        $user_notifications->to_user_id = $id;
        $user_notifications->follow_id = $follow->id;
        $user_notifications->notification = "Follow request";
        $user_notifications->status = 1;
        $user_notifications->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Request Sent'));
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
     * @param  \App\Models\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(follow $follow)
    {
        //
    }
}
