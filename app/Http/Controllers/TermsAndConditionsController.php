<?php

namespace App\Http\Controllers;

use App\Models\terms_and_conditions;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
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
        $terms_and_conditions=terms_and_conditions::where('id', '=', 1)->first();
        if ($terms_and_conditions === null) {
            $terms_and_conditions = new terms_and_conditions();
        $terms_and_conditions->tandc = "tandc"; 
        $terms_and_conditions->save();
        $terms_and_conditions=terms_and_conditions::where('id', '=', 1)->first();
        return view("admintermsandconditions")->with('terms_and_conditions',$terms_and_conditions);
         }
         else{
            return view("admintermsandconditions")->with('terms_and_conditions',$terms_and_conditions);
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
     * @param  \App\Models\terms_and_conditions  $terms_and_conditions
     * @return \Illuminate\Http\Response
     */
    public function show(terms_and_conditions $terms_and_conditions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\terms_and_conditions  $terms_and_conditions
     * @return \Illuminate\Http\Response
     */
    public function edit(terms_and_conditions $terms_and_conditions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\terms_and_conditions  $terms_and_conditions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, terms_and_conditions $terms_and_conditions)
    {
        $terms_and_conditions = terms_and_conditions::find(1); 
        $terms_and_conditions->tandc = $request->input('tandc'); 
        $terms_and_conditions->save();
        return redirect()->back()->with(session()->flash('alert-success', 'terms and conditions Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\terms_and_conditions  $terms_and_conditions
     * @return \Illuminate\Http\Response
     */
    public function destroy(terms_and_conditions $terms_and_conditions)
    {
        //
    }
}
