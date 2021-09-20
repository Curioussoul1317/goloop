<?php

namespace App\Http\Controllers;

use App\Mail\GoloopMail;
use Illuminate\Support\Facades\Mail;
use App\Models\about;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AboutController extends Controller
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
    public function sendmail()
    {
        $data = [
            'name' => "testname",
            'verification' => "testveri",
        ];
        Mail::to('ahmedasad1317@gmail.com')->send(new GoloopMail($data));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $about=about::where('id', '=', 1)->first();
        if ($about === null) {
            $about = new about();
        $about->aboutus = "goloop";
        $about->phone = "goloop";
        $about->email = "goloop";
        $about->address = "goloop";
        $about->goloop_pic = "goloop";
        $about->save();
        $about=about::where('id', '=', 1)->first();
        return view("adminabout")->with('about',$about);
         }
         else{
            return view("adminabout")->with('about',$about);
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
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    { 
       if($request->input('currentimg') == "goloop"){
        if (file_exists($request->file('UploadedFile'))) {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/Aboutus', $fileNameToStore); 
        } else {
            $fileNameToStore = $request->input('currentimg');
        }
        $about = about::find(1); 
        $about->aboutus = $request->input('aboutus');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->goloop_pic = $fileNameToStore;
        $about->save();
        return redirect()->back()->with(session()->flash('alert-success', 'About Go loop Updated'));
       }else{
        if (file_exists($request->file('UploadedFile'))) {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/Aboutus', $fileNameToStore);
            unlink(storage_path('app/public/Aboutus/' . $request->input('editimage')));
        } else {
            $fileNameToStore = $request->input('currentimg');
        }


        $about = about::find(1); 
        $about->aboutus = $request->input('aboutus');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->goloop_pic = $fileNameToStore;
        $about->save();
        return redirect()->back()->with(session()->flash('alert-success', 'About Go loop Updated'));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        //
    }
}
