<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\post;
use App\Models\event_category;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
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
        $eventscategories = event_category::all();
        return view('admineventcatgo')->with('events', $events)->with('eventscategories', $eventscategories);
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
        $filenamewithExt = $request->file('categoryUploadedFile')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('categoryUploadedFile')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('categoryUploadedFile')->storeAs('public/EventCat', $fileNameToStore);

        $MedalfilenamewithExt = $request->file('medalUploadedFile')->getClientOriginalName();
        $Medalfilename = pathinfo($MedalfilenamewithExt, PATHINFO_FILENAME);
        $Medalextension = $request->file('medalUploadedFile')->getClientOriginalExtension();
        $MedalfileNameToStore = $Medalfilename . '_' . time() . '.' . $Medalextension;
        $Medalpath = $request->file('medalUploadedFile')->storeAs('public/Medal', $MedalfileNameToStore);

        $BibfilenamewithExt = $request->file('bibUploadedFile')->getClientOriginalName();
        $Bibfilename = pathinfo($BibfilenamewithExt, PATHINFO_FILENAME);
        $Bibextension = $request->file('bibUploadedFile')->getClientOriginalExtension();
        $BibfileNameToStore = $Bibfilename . '_' . time() . '.' . $Bibextension;
        $Bibpath = $request->file('bibUploadedFile')->storeAs('public/BibImage', $BibfileNameToStore);

        // return ($BibfilenamewithExt);
        $event_category = new event_category();
        $event_category->name = $request->input('name');
        $event_category->event_id = $request->input('events');
        $event_category->start_date = $request->input('start');
        $event_category->end_date = $request->input('end');
        $event_category->apply_before = $request->input('applybefore');
        $event_category->catog_event_state =  $request->input('status');
        $event_category->price =  $request->input('price');
        $event_category->km =  $request->input('km');
        $event_category->category =  $request->input('category');
        $event_category->medal_img = $MedalfileNameToStore;
        $event_category->bib_img = $BibfileNameToStore;
        $event_category->catog_event_img = $fileNameToStore;
        $event_category->save();

        $post = new post();
        $post->cat_event_id = $event_category->id;
        $post->save();
        return redirect()->back()->with(session()->flash('alert-success', 'New Event Category Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event_category  $event_category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = event::all();
        $eventscategories = event_category::all();
        $eventscategory = event_category::find($id);
        return view('admineventcatgo')->with('events', $events)->with('eventscategories', $eventscategories)->with('eventscategory', $eventscategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event_category  $event_category
     * @return \Illuminate\Http\Response
     */
    public function edit(event_category $event_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event_category  $event_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event_category $event_category)
    {


        if (file_exists($request->file('categoryUploadedFile'))) {
            $filenamewithExt = $request->file('categoryUploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('categoryUploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('categoryUploadedFile')->storeAs('public/EventCat', $fileNameToStore);
            unlink(storage_path('app/public/EventCat/' . $request->input('catog_img')));
        } else {
            $fileNameToStore = $request->input('catog_img');
        }

        if (file_exists($request->file('medalUploadedFile'))) {
            $MedalfilenamewithExt = $request->file('medalUploadedFile')->getClientOriginalName();
            $Medalfilename = pathinfo($MedalfilenamewithExt, PATHINFO_FILENAME);
            $Medalextension = $request->file('medalUploadedFile')->getClientOriginalExtension();
            $MedalfileNameToStore = $Medalfilename . '_' . time() . '.' . $Medalextension;
            $Medalpath = $request->file('medalUploadedFile')->storeAs('public/Medal', $MedalfileNameToStore);
            unlink(storage_path('app/public/Medal/' . $request->input('medal_img')));
        } else {
            $MedalfileNameToStore = $request->input('medal_img');
        }

        if (file_exists($request->file('bibUploadedFile'))) {
            $BibfilenamewithExt = $request->file('bibUploadedFile')->getClientOriginalName();
            $Bibfilename = pathinfo($BibfilenamewithExt, PATHINFO_FILENAME);
            $Bibextension = $request->file('bibUploadedFile')->getClientOriginalExtension();
            $BibfileNameToStore = $Bibfilename . '_' . time() . '.' . $Bibextension;
            $Bibpath = $request->file('bibUploadedFile')->storeAs('public/BibImage', $BibfileNameToStore);
            unlink(storage_path('app/public/BibImage/' . $request->input('bib_img')));
        } else {
            $BibfileNameToStore = $request->input('bib_img');
        }

        $event_category = event_category::find($request->input('id'));
        $event_category->name = $request->input('name');
        $event_category->event_id = $request->input('events');
        $event_category->start_date = $request->input('start');
        $event_category->end_date = $request->input('end');
        $event_category->apply_before = $request->input('applybefore');
        $event_category->catog_event_state =  $request->input('status');
        $event_category->price =  $request->input('price');
        $event_category->km =  $request->input('km');
        $event_category->category =  $request->input('category');
        $event_category->medal_img = $MedalfileNameToStore;
        $event_category->bib_img = $BibfileNameToStore;
        $event_category->catog_event_img = $fileNameToStore;
        $event_category->save();
        return redirect()->back()->with(session()->flash('alert-success', 'New Event Category Created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event_category  $event_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(event_category $event_category)
    {
        //
    }
}
