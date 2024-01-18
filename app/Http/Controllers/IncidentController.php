<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Services\PokemonService;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Incidents = Incident::with('client')->filtrar($request)->get();
        return $Incidents;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incident = new Incident();
        $incident->client_id = $request->client_id;
        $incident->name = $request->name;
        $incident->last_name = $request->last_name;
        $incident->identifiction = $request->identifiction;
        $incident->time = $request->time;
        $incident->event = $request->event;
        $incident->event_description = $request->event_description;
        $incident->Berries = $request->Berries;

        $incident->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $incident = Incident::find($id);
        $pokemonService=new PokemonService();
        $Berries=$pokemonService->getBerries($incident->Berries);
        $incident['berries_name']=$Berries;
        return $incident;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $incident = Incident::find($id);
        $incident->client_id = $request->client_id ?? $incident->client_id;
        $incident->name = $request->name ?? $incident->name;
        $incident->last_name = $request->last_name ?? $incident->last_name;
        $incident->identifiction = $request->identifiction ?? $incident->identifiction;
        $incident->time = $request->time ?? $incident->time;
        $incident->event = $request->event ?? $incident->event;
        $incident->event_description = $request->event_description ?? $incident->event_description;
        $incident->Berries = $request->Berries ?? $incident->Berries;


        $incident->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $incident = Incident::find($id);
        $incident->delete();
        return 'delete success';
    }
}
