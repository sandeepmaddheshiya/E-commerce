<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Request $request, $orderId)
    {
        $payment = Payment::create([
            'order_id' => $orderId,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);
        return response()->json($payment, 201);
    }

    public function show($orderId)
    {
        $payment = Payment::where('order_id', $orderId)->first();
        return response()->json($payment);
    }

    public function update(Request $request, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy($paymentId)
    {
        Payment::destroy($paymentId);
        return response()->json(null, 204);
    }
}

