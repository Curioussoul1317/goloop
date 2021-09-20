<?php

namespace App\Http\Controllers;

use App\Models\private_policy;
use Illuminate\Http\Request;

class PrivatePolicyController extends Controller
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
        $private_policy=private_policy::where('id', '=', 1)->first();
        if ($private_policy === null) {
            $private_policy = new private_policy();
        $private_policy->privacypolicies = "privacypolicies"; 
        $private_policy->save();
        $private_policy=private_policy::where('id', '=', 1)->first();
        return view("adminpolicy")->with('private_policy',$private_policy);
         }
         else{
            return view("adminpolicy")->with('private_policy',$private_policy);
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
     * @param  \App\Models\private_policy  $private_policy
     * @return \Illuminate\Http\Response
     */
    public function show(private_policy $private_policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\private_policy  $private_policy
     * @return \Illuminate\Http\Response
     */
    public function edit(private_policy $private_policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\private_policy  $private_policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, private_policy $private_policy)
    { 
        $private_policy = private_policy::find(1); 
        $private_policy->privacypolicies = $request->input('privatepolicy'); 
        $private_policy->save();
        return redirect()->back()->with(session()->flash('alert-success', 'private_policy Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\private_policy  $private_policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(private_policy $private_policy)
    {
        //
    }
}
