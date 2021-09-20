<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productsize;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
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
        $products = product::orderBy('created_at', 'desc')->get();
        return view('adminproduct')->with('products', $products);
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
        $path = $request->file('UploadedFile')->storeAs('public/Products', $fileNameToStore);

        $product = new product();
        $product->name = $request->input('name');
        $product->img = $fileNameToStore;
        $product->description = $request->input('description');
        $product->save();

        $post = new post();
        $post->products_id = $product->id;
        $post->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Product Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editproduct = product::find($id);
        $productsizes = productsize::where('product_id', $id)->get();
        return view('admineditproduct')->with('editproduct', $editproduct)->with('productsizes', $productsizes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        if (file_exists($request->file('UploadedFile'))) {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/Products', $fileNameToStore);
            unlink(storage_path('app/public/Products/' . $request->input('editimage')));
        } else {
            $fileNameToStore = $request->input('editimage');
        }


        $product = product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->img = $fileNameToStore;
        $product->description = $request->input('description');
        $product->save();
        $productsizes = productsize::where('product_id', $request->input('id'))->get();
        $editproduct = product::find($request->input('id'));
        return view('admineditproduct')->with('editproduct', $editproduct)->with('productsizes', $productsizes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
