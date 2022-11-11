<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show($order_id) {
        $order = Order::find($order_id);
        
        if (\Auth::user()->id != $order->user_id) {
            abort('403', 'not authorized....');
        }

        return view('orders.confirmOrder', [
            'order' => $order
        ]);
    }
}
