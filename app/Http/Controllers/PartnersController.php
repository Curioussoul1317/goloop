<?php

namespace App\Http\Controllers;

use App\Models\partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
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
        $partners = partners::all();
        return view("adminpartners")->with('partners', $partners);
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
        $path = $request->file('UploadedFile')->storeAs('public/Partners', $fileNameToStore);

        $partners = new partners();
        $partners->name = $request->input('name');
        $partners->img = $fileNameToStore;
        $partners->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Sponsers Info added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partners = partners::all();
        $editpartner = partners::find($id);
        return view("adminpartners")->with('partners', $partners)->with('editpartner', $editpartner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function edit(partners $partners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partners $partners)
    { 
        if (file_exists($request->file('UploadedFile'))) {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/Partners', $fileNameToStore);
            unlink(storage_path('app/public/Partners/' . $request->input('imgname')));
        } else {
            $fileNameToStore = $request->input('imgname');
        }

        $partners = partners::find($request->input('id'));
        $partners->name = $request->input('name');
        $partners->img = $fileNameToStore;
        $partners->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Partners Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy(partners $partners)
    {
        //
    }
}
