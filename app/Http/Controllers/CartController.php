<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Models\payment;
use App\Models\productsize;
use App\Models\admin_notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $info = productsize::find($request->input('id'));
        $cart = new cart();
        $cart->user_id = Auth::user()->id;
        $cart->products_id = $info->product_id;
        $cart->gender = $info->gender;
        $cart->qty = $request->input('qty');
        $cart->size = $info->size;
        $cart->total = $request->input('qty') * $info->price;
        $cart->delivered = 0;
        $cart->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Product Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == "1") {
            $items = cart::where('user_id', Auth::user()->id)->where('delivered', 0)->where('payment_id', NULL)->get();
            return view('usercart')->with('items', $items);
        } elseif ($id == "2") {
            $itemspaid = cart::where('user_id', Auth::user()->id)->where('delivered', 0)->where('payment_id', '!=', NULL)->get();
            return view('usercart')->with('itemspaid', $itemspaid);
        } else {
            $itemsrecived = cart::where('user_id', Auth::user()->id)->where('delivered', 1)->get();
            return view('usercart')->with('itemsrecived', $itemsrecived);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('UploadedFile')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('UploadedFile')->storeAs('public/Payments', $fileNameToStore);

        $cart = cart::find($request->input('id'));
        $product = productsize::find($cart->products_id);
        if ($cart->qty < $product->qty) {
            $payment = new payment();
            $payment->user_id = Auth::user()->id;
            $payment->slip = $fileNameToStore;
            $payment->amount = $cart->total;

            $payment->save();
            $payment->id;
            $cart->payment_id = $payment->id;
            $cart->save();
            $admin_notifications = new admin_notifications();
            $admin_notifications->cart_id = $cart->id;
            $admin_notifications->notification = Auth::user()->full_name . " has made an order.";
            $admin_notifications->status = 1;
            $admin_notifications->by_user_id = Auth::user()->id;
            $admin_notifications->save();
            $product = productsize::find($cart->products_id);
            $product->qty = $product->qty - $cart->qty;
            $product->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Product Added'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Sorry we are out of stock'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart = cart::find($request->input('id'));
        $cart->delete();
        return redirect()->back()->with(session()->flash('alert-success', 'Item removed'));
    }
}
