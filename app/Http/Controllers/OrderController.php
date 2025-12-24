<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        // Optional: pastikan user hanya bisa lihat order miliknya
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }
}
