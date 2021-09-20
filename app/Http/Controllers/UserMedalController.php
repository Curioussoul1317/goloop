<?php

namespace App\Http\Controllers;

use App\Models\UserMedal;
use App\Models\participants;
use App\Models\event;
use App\Models\event_category;
use App\Models\user_notifications;
use Illuminate\Http\Request;

class UserMedalController extends Controller
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

        $participants = participants::find($request->input('participantid'));
        if ($participants->team_id != null) {
            $UserMedal = new UserMedal();
            $UserMedal->user_id = $participants->user_id;
            $UserMedal->team_id = $participants->team_id;
            $UserMedal->participants_id = $participants->id;
            $UserMedal->event_id = $participants->cat_event_id;
            $UserMedal->save();
            // $user_notifications = new user_notifications();
            // $user_notifications->participation_id = $id;
            // $user_notifications->notification = "Event participation approved";
            // $user_notifications->status = 1;
            // $user_notifications->by_user_id = auth()->user()->id;
            // $user_notifications->to_user_id = $participants->user_id;
            // $user_notifications->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Won a medal'));
        } else {
            $UserMedal = new UserMedal();
            $UserMedal->user_id = $participants->user_id;
            $UserMedal->participants_id = $participants->id;
            $UserMedal->event_id = $participants->cat_event_id;
            $UserMedal->save();
            // $user_notifications = new user_notifications();
            // $user_notifications->participation_id = $id;
            // $user_notifications->notification = "Event participation approved";
            // $user_notifications->status = 1;
            // $user_notifications->by_user_id = auth()->user()->id;
            // $user_notifications->to_user_id = $participants->user_id;
            // $user_notifications->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Won a medal'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserMedal  $userMedal
     * @return \Illuminate\Http\Response
     */
    public function show(UserMedal $userMedal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserMedal  $userMedal
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMedal $userMedal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserMedal  $userMedal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMedal $userMedal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserMedal  $userMedal
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMedal $userMedal)
    {
        //
    }
}
