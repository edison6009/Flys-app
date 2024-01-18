<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    {
    $Airlines = Airline::with('country', 'plane')->Filtra($request)
    ->get();
        return $Airlines;
    }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $airline = new Airline();
        $airline->name = $request->name;
        $airline->country_id = $request->country_id;
        $airline->code_phone = $request->code_phone;
        $airline->phone = $request->phone;

        $airline->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $airline = Airline::find($id);
        return $airline;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $airline = Airline::find($id);
        $airline->name = $request->name ?? $airline->name;
        $airline->country_id = $request->country_id ?? $airline->country_id;
        $airline->code_phone = $request->code_phone ?? $airline->code_phone;
        $airline->phone = $request->phone ?? $airline->phone;

        $airline->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $airline = Airline::find($id);
        $airline-> delete();
        return 'delete success';
    }
}
