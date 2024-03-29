<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = Ticket::with('client','plane.airline')->filtrar($request)
        ->get();
            return $tickets;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->client_id = $request->client_id;
        $ticket->plane_id = $request->plane_id;
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
        $ticket = Ticket::find($id);
        return $ticket;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
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
        $ticket = Ticket::find($id);
        $ticket->delete();
        return 'delete success';
    }

    public function restore($id)
    {
        $ticket = Ticket::withTrashed()->find($id);
        $ticket->restore();
        return 'success';
    }

    public function hola()
    {
        //dd('hola');
        return 'hola';
    }

    public function activeTickets()
    {
        $now = Carbon::now()->format('Y-m-d');
        $tickets = Ticket::where('travel_date',$now)->get();
        return $tickets;
    }

}
