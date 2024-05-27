<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $carts = Cart::where('user_id', $userId)->whereNull('order_id')->get();

        $productSelected = $carts->count();
        $totalPrice = 0;

        foreach($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }

        return view('user.payment', compact('totalPrice', 'productSelected'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymentOption = $request->input('payment_option');
        $totalPrice = $request->input('totalPrice');

        $userId = auth()->user()->id;

        $order = new Order();

        $order->user_id = $userId;
        $order->payment_id = $paymentOption;
        $order->status_id  = 1;
        $order->amount = $totalPrice;

        $order->save();

        $carts = Cart::where('user_id', $userId)->whereNull('order_id')->get();
        $order = Order::latest()->where('user_id', $userId)->first();
        foreach ($carts as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }

        return redirect('/qr-code');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
