<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\post;
use Illuminate\Http\Request;


class EventController extends Controller
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
        return view('adminevents')->with('events', $events);
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
        $path = $request->file('UploadedFile')->storeAs('public/Event', $fileNameToStore);

        $event = new event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->event_img = $fileNameToStore;
        $event->start_date = $request->input('start');
        $event->end_date = $request->input('end');
        $event->event_state = 'OnHold';
        $event->save();
        $post = new post();
        $post->event_id = $event->id;
        $post->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Event Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        if (file_exists($request->file('UploadedFile'))) {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/Event', $fileNameToStore);
            unlink(storage_path('app/public/Event/' . $request->input('img')));
        } else {
            $fileNameToStore = $request->input('img');
        }

        $event = event::find($request->input('id'));
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->event_img = $fileNameToStore;
        $event->start_date = $request->input('start');
        $event->end_date = $request->input('end');
        $event->event_state = $request->input('status');
        $event->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Event Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }
}
