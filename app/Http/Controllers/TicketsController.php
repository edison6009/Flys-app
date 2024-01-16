<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Http\Requests\StoreTicketsRequest;
use App\Http\Requests\UpdateTicketsRequest;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Tickets::all();
        return $tickets;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Tickets();
        $ticket->client_id = $request->client_id;
        $ticket->travel_date = $request->travel_date;
        $ticket->flight_number = $request->flight_number;
        $ticket->door_number = $request->door_number;
        $ticket->hour = $request->hour;

        $ticket->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Tickets::find($id);
        return $ticket;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ticket = Tickets::find($id);
        $ticket->travel_date = $request->travel_date ?? $ticket->travel_date;
        $ticket->flight_number = $request->flight_number ?? $ticket->flight_number;
        $ticket->door_number = $request->door_number ?? $ticket->door_number;
        $ticket->hour = $request->hour ?? $ticket->hour;

        $ticket->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Tickets::find($id);
        $ticket->delete();
        return 'delete success';
    }
}
