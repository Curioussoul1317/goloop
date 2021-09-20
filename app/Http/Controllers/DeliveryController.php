<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\user_notifications;

class DeliveryController extends Controller
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

        $orders = cart::where('delivered', '!=', 1)->where('payment_id', '!=', " ")->get();
        return view('adminpendingdelivery')->with('orders', $orders);
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
        $vieworder = cart::find($id);
        $orders = cart::where('delivered', '!=', 1)->where('payment_id', '!=', " ")->get();
        return view('adminpendingdelivery')->with('orders', $orders)->with('vieworder', $vieworder);
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
    public function update($id, $update)
    {
        $cart = cart::find($id);
        $cart->delivered = 1;
        $cart->save();

        $user_notifications = new user_notifications();
        $user_notifications->notification = "Product has been delivered";
        $user_notifications->status = 1;
        $user_notifications->by_user_id = auth()->user()->id;
        $user_notifications->to_user_id = $cart->user_id;
        $user_notifications->save();
        $orders = cart::where('delivered', '!=', 1)->where('payment_id', '!=', " ")->get();
        return view('adminpendingdelivery')->with('orders', $orders)->with(session()->flash('alert-success', 'Order Updated'));
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
