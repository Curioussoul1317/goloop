<?php

namespace App\Http\Controllers;

use App\Models\productsize;
use Illuminate\Http\Request;

class ProductsizeController extends Controller
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
        if (productsize::where(
            [['product_id', '=', $request->input('productid')], ['gender', '=', $request->input('gender')], ['size', '=', $request->input('size')],]
        )->exists()) {
            return redirect()->back()->with(session()->flash('alert-danger', 'Record Exist'));
        } else {
            $ProductSize = new productsize();
            $ProductSize->product_id = $request->input('productid');
            $ProductSize->gender = $request->input('gender');
            $ProductSize->size = $request->input('size');
            $ProductSize->qty = $request->input('qty');
            $ProductSize->price = $request->input('price');
            $ProductSize->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Product details added'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function show(productsize $productsize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function edit(productsize $productsize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productsize $productsize)
    {
        $ProductSize = productsize::find($request->input('id'));
        $ProductSize->gender = $request->input('gender');
        $ProductSize->size = $request->input('size');
        $ProductSize->qty = $request->input('qty');
        $ProductSize->price = $request->input('price');
        $ProductSize->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Product details updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function destroy(productsize $productsize)
    {
        //
    }
}
