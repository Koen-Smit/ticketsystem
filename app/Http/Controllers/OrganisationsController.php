<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organisation;
use App\Models\Order;
use App\Models\Ticket;

class OrganisationsController extends Controller
{
    public function index()
    {
        $orgs = Organisation::all();
        return view('organisations.index', [
            'orgs' => $orgs
        ]);
    }
    public function create()
    {
        $orgs = Organisation::all();
        return view('organisations.create',[
            'orgs' => $orgs
        ]);
    }

    public function store(request $request)
    {
        $request->validate([
            'name' => '',
            'email' => '',
            'phone' => '',
        ]);
        Organisation::create($request->except('_token'));
        return redirect()->route('organisations.index')->with('message', 'Organisation is aangemaakt');
    }
}
