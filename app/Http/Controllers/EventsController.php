<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organisation;
use App\Models\Order;
use App\Models\Ticket;


class EventsController extends Controller
{
    // Verantwoordelijk voor het ophalen van alle events    V
    // en dit tonen in een view
    public function index()
    {
        $events = Event::all();
        // $events = Event::where('title', 'like', '%wk afwassen%')->get();
        // dd (dump)
        return view('events.index', [
            'events' => $events
        ]);
    }

    // verantwoordelijk voor het tonen van een aanmaakform
    public function create()
    {
        $orgs = Organisation::all();
        return view('events.create',[
            'orgs' => $orgs
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title'             => 'required|max:255',
            'description'       => '',
            'start_date'        => 'required|date|after:today|before:end_date',
            'end_date'          => 'required|date|after:start_date',
            'amount_tickets'    => 'required|integer',
            'price'             => 'required|numeric',
            'city'              => 'required|max:255',
            'address'           => 'required|max:255',
            'zipcode'           => 'required|max:20',
            'category'          => '',
        ]);
        Event::create($request->except('_token'));
        return redirect()->route('events.index')->with('message', 'Event is aangemaakt');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', [
            'event' => $event
        ]);
        // recources/views/events/show
        // 1 event ophalen uit db op basis van $id
        //dat laten zien in een view

    }

    public function edit($id) 
    {
     $event = Event::findOrFail($id);
     $orgs = Organisation::all();
        return view('events.edit', [
            'event' => $event,
            'orgs' => $orgs
        ]);   
    }

    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('message', 'Event is verwijderd');

    }

    public function update(Request $request, $id) {
        $request->validate([
            'title'             => 'required|max:255',
            'description'       => '',
            'start_date'        => 'required|date|before:end_date',
            'end_date'          => 'required|date|after:start_date',
            'amount_tickets'    => 'required|integer',
            'price'             => 'required|numeric',
            'city'              => 'required|max:255',
            'address'           => 'required|max:255',
            'zipcode'           => 'required|max:20',
            'category'          => '',
        ]);
        $event = Event::find($id);
        $event->update($request->all());
        return redirect()->route('events.index')->with('message', 'Event is aangepast');
    }

    public function order($id) {
        $event = Event::findOrFail($id);
        return view('events.order', [
            'event' => $event
        ]);
    }
    
    public function storeOrder(Request $request, $id) {
        $event = Event::find($id);
        $amount_tickets_left = $event->amountTicketsLeft();
        // dd($request->all());
        //valideren
        if($request->amount_tickets > $event->amountTicketsLeft()) {
            return back()->with('message', 'Er zijn niet genoeg tickets meer');
        }
        //order opslaan in database



        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'Paid',
            'payment_method' => $request->payment_method,
        ]);

        //tickets opslaan in database
        for ($i = 0; $i < $request->amount_tickets; $i++) {
            Ticket::create([
                'order_id' => $order->id,
                'event_id' => $id,
                // 'valid_until' => $event->end_date,
            ]);
        }

        //view returnen
        return view('orders.confirmOrder', [
            'order' => $order,  
        ]);
    }

}
