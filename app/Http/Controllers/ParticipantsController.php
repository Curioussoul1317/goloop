<?php

namespace App\Http\Controllers;

use App\Models\participants;
use App\Models\event;
use Illuminate\Http\Request;
use App\Models\event_category;
use App\Models\user_notifications;
use App\Models\team;
use App\Models\team_members;

class ParticipantsController extends Controller
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
        $events = event::all();
        return view('admineventparticipents')->with('events', $events);
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
     * @param  \App\Models\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventscategories = event_category::find($id);
        $participants = participants::where('cat_event_id', $id)->get();
        return view('adminparticipentslist')->with('participants', $participants)->with('eventscategories', $eventscategories);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\participants  $participants
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function edit(participants $participants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function update($id, $update)
    {

        $participants = participants::find($id);
        $codegen = $id . rand(1000, 2000);
        $result = substr($codegen, 0, 4);
        $participants->code = $result;
        $participants->status = 1;
        $participants->save();

        $user_notifications = new user_notifications();
        $user_notifications->participation_id = $id;
        $user_notifications->notification = "Event participation approved";
        $user_notifications->status = 1;
        $user_notifications->by_user_id = auth()->user()->id;
        $user_notifications->to_user_id = $participants->user_id;
        $user_notifications->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Participant Updated'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function destroy(participants $participants)
    {
        //
    }
}
