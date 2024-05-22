<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store(Request $request, $productId)
    {
        $quantity = $request->query('quantity');

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Invalid product ID'], 400);
          } else {
            $userId = auth()->user()->id;

            $cart = new Cart();

            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = $quantity;

            $cart->save();

            return response()->json($productId);
          }
    }

    public function SingleStoreToCart($productId)
    {
        $userId = auth()->user()->id;

        $checkCart = Cart::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($checkCart) {

            $checkCart->quantity++;
            $checkCart->save();

            $cartData = Cart::where('user_id', $userId)->get();

            $productCount = $cartData->count();
            return response()->json($productCount);

        } else {

            $userId = auth()->user()->id;

            $cart = new Cart();

            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = 1;

            $cart->save();

            $cartData = Cart::where('user_id', $userId)->get();

            $productCount = $cartData->count();
            return response()->json($productCount);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userId = auth()->user()->id;
        $cartData = Cart::where('user_id', $userId)->get();

        $productCount = $cartData->count();

        return response()->json($productCount);
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
