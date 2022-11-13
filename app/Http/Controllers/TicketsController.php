<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Order;

use Illuminate\Http\Request;

class Ticketscontroller extends Controller
{
    public function confirm($ticket_id) {
        $order = order::findOrFail($ticket_id);
        return view('orders.confirm', [
            'order' => $order,  
        ]);
    }
}
