<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\Progress;
use App\Models\User;
use App\Models\comment;
use App\Models\like;
use App\Models\participants;
use App\Models\team;
use App\Models\follow;
use App\Models\team_members;
use App\Models\UserMedal;
use Illuminate\Support\Facades\Auth;

class UserWallController extends Controller
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
    public function index($id)
    {
        if (Auth::user()->id != $id) {
            $userinfo = User::where('id', $id)->first();
            $useracounts = User::where('account_of', $id)->get();
            $follow = follow::Where('follower_id', $id)->orWhere('following_id', $id)->Where('status', 1)->get();
            $userfollowing = $follow->Where('follower_id', $id)->count();
            $userfollowers = $follow->Where('following_id', $id)->count();
            $userevents = participants::where('user_id', $id)->get();
            $Progress = Progress::orderBy('created_at', 'desc')->where('user_id', $id)->get();
            $teams = team::where('users_id', $id)->get();
            $ownteame = team::where('users_id', $id)->where('status', 1)->first();
            $teameligible = team_members::where('member_id', $id)->where('status', 1)->first();
            $followtrue = follow::Where('follower_id', Auth::user()->id)->orWhere('following_id', $id)->Where('status', 1)->first();
            return view('userwall')->with('Progress', $Progress)->with('userevents', $userevents)->with('teams', $teams)->with('userinfo', $userinfo)
                ->with('userfollowing', $userfollowing)->with('userfollowers', $userfollowers)->with('followtrue', $followtrue)->with('useracounts', $useracounts)
                ->with('ownteame', $ownteame)->with('teameligible', $teameligible);;
        } else {
            $userinfo = User::where('id', $id)->first();
            $useracounts = User::where('account_of', $id)->get();
            $UserMedals = UserMedal::where('user_id', Auth::user()->id)->get();
            $follow = follow::Where('follower_id', $id)->orWhere('following_id', $id)->Where('status', 1)->get();
            $userfollowing = $follow->Where('follower_id', $id)->count();
            $userfollowers = $follow->Where('following_id', $id)->count();
            $userevents = participants::where('user_id', Auth::user()->id)->where('status', 1)->get();
            $Progress = Progress::orderBy('created_at', 'desc')->where('user_id', $id)->get();
            $ownteame = team::where('users_id', Auth::user()->id)->where('status', 1)->first();
            $teameligible = team_members::where('member_id', Auth::user()->id)->where('status', 1)->first();
            $teams = team::where('users_id', Auth::user()->id)->get();
            return view('userwall')->with('Progress', $Progress)->with('userevents', $userevents)->with('teams', $teams)->with('userinfo', $userinfo)
                ->with('userfollowing', $userfollowing)->with('userfollowers', $userfollowers)->with('useracounts', $useracounts)
                ->with('ownteame', $ownteame)->with('teameligible', $teameligible)->with('UserMedals', $UserMedals);
        }
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
