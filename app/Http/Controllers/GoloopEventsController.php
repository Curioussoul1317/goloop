<?php

namespace App\Http\Controllers;

use App\Models\event_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\team_members;
use App\Models\participants;
use App\Models\payment;
use App\Models\admin_notifications;

class GoloopEventsController extends Controller
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
        $eventscategories = event_category::all();
        return view('goloopevents')->with('eventscategories', $eventscategories);
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

        $filenamewithExt = $request->file('slip')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('slip')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('slip')->storeAs('public/Payments', $fileNameToStore);

        $payment = new payment();
        $payment->user_id = Auth::user()->id;
        $payment->slip = $fileNameToStore;
        $payment->amount = 100;
        $payment->save();
        $payment->id;


        $type = $request->input('type');
        if ($type == "team") {
            $participants = new participants();
            $participants->cat_event_id = $request->input('id');
            $participants->user_id = Auth::user()->id;
            $participants->team_id = $request->input('teamid');
            $participants->payment_id = $payment->id;
            $participants->status = 0;
            $participants->save();
            $admin_notifications = new admin_notifications();
            $admin_notifications->participation_id = $participants->id;
            $admin_notifications->notification = Auth::user()->full_name . " has partcipated....";
            $admin_notifications->team_id = $request->input('teamid');
            $admin_notifications->status = 1;
            $admin_notifications->by_user_id = Auth::user()->id;
            $admin_notifications->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Participated'));
        } else {
            $participants = new participants();
            $participants->cat_event_id = $request->input('id');
            $participants->user_id = Auth::user()->id;
            $participants->payment_id = $payment->id;
            $participants->status = 0;
            $participants->save();
            $admin_notifications = new admin_notifications();
            $admin_notifications->participation_id = $participants->id;
            $admin_notifications->notification = Auth::user()->full_name . " has partcipated....";
            $admin_notifications->status = 1;
            $admin_notifications->by_user_id = Auth::user()->id;
            $admin_notifications->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Participated'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = team_members::where('member_id', '=', Auth::user()->id)->where('status', '=', 1)->first();
        $eventcategory = event_category::find($id);
        return view('goloopeventdetail')->with('eventcategory', $eventcategory)->with('team', $team);
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
