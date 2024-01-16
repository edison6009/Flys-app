<?php

namespace App\Http\Controllers;

use App\Models\Airlenes;
use App\Http\Requests\StoreAirlenesRequest;
use App\Http\Requests\UpdateAirlenesRequest;

class AirlenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlenes = airlenes::all();
        return $airlenes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAirlenesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Airlenes $airlenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlenesRequest $request, Airlenes $airlenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airlenes $airlenes)
    {
        //
    }
}
