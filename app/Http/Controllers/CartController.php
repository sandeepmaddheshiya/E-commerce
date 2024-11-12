<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show($userId)
    {
        $cart = Cart::where('user_id', $userId)->with('cartItems.product')->first();
        return response()->json($cart);
    }

    public function addItem(Request $request, $cartId)
    {
        $cartItem = CartItem::create([
            'cart_id' => $cartId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        return response()->json($cartItem, 201);
    }

    public function removeItem($cartItemId)
    {
        CartItem::destroy($cartItemId);
        return response()->json(null, 204);
    }
}

