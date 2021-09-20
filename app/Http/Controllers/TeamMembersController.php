<?php

namespace App\Http\Controllers;

use App\Models\team_members;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
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

        $team_memberscount = team_members::Where('team_id', $request->input('teamid'))->count();
        if ($team_memberscount <= 5) {
            $team_members = new team_members();
            $team_members->team_id = $request->input('teamid');
            $team_members->member_id =  $request->input('memberid');
            $team_members->status = 0;
            $team_members->save();
            return redirect()->back()->with(session()->flash('alert-success', 'New Member added'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Sorry you cant add more tha 5 ppl'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function show(team_members $team_members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function edit(team_members $team_members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, team_members $team_members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function destroy(team_members $team_members)
    {
        //
    }
}
