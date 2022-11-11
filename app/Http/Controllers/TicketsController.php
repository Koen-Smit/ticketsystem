<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

use Illuminate\Http\Request;

class Ticketscontroller extends Controller
{
    public function scan($ticket_id) {
        $ticket = Ticket::findOrFail($ticket_id);
        $scanned = false;
        if(!$ticket->scanned_at) {
            $ticket->scanned_at = now();
            $ticket->save();
            $scanned = true;
        }
        return view('ticket-scanned', [
            'ticket' => $ticket
        ]);
    }
    public function scanView() {
        return view('scan');
    }
}
