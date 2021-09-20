<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\event_category;
use Illuminate\Http\Request;
use App\Models\participants;

class ProgressController extends Controller
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

        $participantsinfo = participants::find($request->input('event'));

        $MedalfilenamewithExt = $request->file('progressUploadedFile')->getClientOriginalName();
        $Medalfilename = pathinfo($MedalfilenamewithExt, PATHINFO_FILENAME);
        $Medalextension = $request->file('progressUploadedFile')->getClientOriginalExtension();
        $MedalfileNameToStore = $Medalfilename . '_' . time() . '.' . $Medalextension;
        $Medalpath = $request->file('progressUploadedFile')->storeAs('public/Progress', $MedalfileNameToStore);

        if ($participantsinfo->team_id == null) {
            $Progress = new Progress();
            $Progress->title = $request->input('title');
            $Progress->user_id =  $participantsinfo->user_id;
            $Progress->event_id =  $participantsinfo->cat_event_id;
            $Progress->event_progress =  $request->input('progress');
            $Progress->progress_date =  $request->input('date');
            $Progress->img = $MedalfileNameToStore;
            $Progress->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Progress added'));
        } else {
            $Progress = new Progress();
            $Progress->title = $request->input('title');
            $Progress->user_id =  $participantsinfo->user_id;
            $Progress->team_id = $participantsinfo->team_id;
            $Progress->event_id =   $participantsinfo->cat_event_id;
            $Progress->event_progress =  $request->input('progress');
            $Progress->progress_date =  $request->input('date');
            $Progress->img = $MedalfileNameToStore;
            $Progress->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Progress added'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
