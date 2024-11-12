<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($userId)
    {
        $orders = Order::where('user_id', $userId)->with('orderItems.product')->get();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(null, 204);
    }
}

