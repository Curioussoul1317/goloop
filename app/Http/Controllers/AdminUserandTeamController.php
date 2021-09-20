<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\team;
use App\Models\participants;
use App\Models\team_members;

class AdminUserandTeamController extends Controller
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
    public function index($type)
    {
        if($type==1){
            $Users = User::where('account_type', "user")->get();
            return view('adminuserandteams')->with('Users', $Users);        
        }
        else{
            $Teams = team::all();
            return view('adminuserandteams')->with('Teams', $Teams);
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
    public function show($id,$type)
    {
        if($type==1){ 
            $User = User::find($id);
            $UserEvents = participants::where('user_id', $id)->get();
            return view('adminuserdetails')->with('User', $User)->with("UserEvents",$UserEvents);        
        }
        else{
            $TeamInfo = team::find($id);
            $teammembers = team_members::where('team_id', $id)->get();
            return view('adminuserdetails')->with('TeamInfo', $TeamInfo)->with('teammembers', $teammembers);
        }  
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
