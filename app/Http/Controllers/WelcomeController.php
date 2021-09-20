<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\event;
use App\Models\event_category;
use App\Models\partners;
use App\Models\about;
use App\Models\product;
use App\Models\faq;
use App\Models\terms_and_conditions;
use App\Models\private_policy;
class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = slider::all(); 
        $events = event::all(); 
        $event_categories = event_category::all(); 
        $partners=partners::all();
        $about=about::find(1);
        $products=product::all();
        $faqs=faq::Where( 'answers', "!=", "" )->get();
        $tms=terms_and_conditions::find(1);
        $private_policy=private_policy::find(1); 
        return view('welcome')->with('slides',$slides)->with('events',$events)->with('event_categories',$event_categories)
        ->with('partners',$partners)->with('about',$about)->with('products',$products)->with('faqs',$faqs)->with('tms',$tms)
        ->with('private_policy',$private_policy);
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
    public function show($id)
    {
        //
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
