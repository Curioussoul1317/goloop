<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\team_members;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('UploadedFile')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('UploadedFile')->storeAs('public/Team', $fileNameToStore);

        $team = new team();
        $team->name = $request->input('name');
        $team->users_id = Auth::user()->id;
        $team->img = $fileNameToStore;
        $team->status = 1;
        $team->save();
        $team_members = new team_members();
        $team_members->team_id = $team->id;
        $team_members->member_id =  Auth::user()->id;
        $team_members->status = 0;
        $team_members->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Team Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ownteam = team::find($id);
        $members = team_members::where('team_id', $ownteam->id)->get();
        return view('addmembers')->with('ownteam', $ownteam)->with('members', $members);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(team $team)
    {
        //
    }
}
