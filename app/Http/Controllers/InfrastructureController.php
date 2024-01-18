<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use App\Http\Requests\StoreInfrastructureRequest;
use App\Http\Requests\UpdateInfrastructureRequest;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $infrastructures = Infrastructure::with('country')->Filtrar($request)
        ->get();
            return $infrastructures;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infrastructure = new Infrastructure();
        $infrastructure->airport_name= $request->airport_name;
        $infrastructure->country_id = $request->country_id;
        $infrastructure->number_landing_strips = $request->number_landing_strips;
        $infrastructure->number_terminals = $request->number_terminals;
        $infrastructure->number_boarding_gates = $request->number_boarding_gates;
        $infrastructure->number_public_toilets = $request->number_public_toilets;
        $infrastructure->number_shops = $request->number_shops;
        $infrastructure->number_restaurants = $request->number_restaurants;
        $infrastructure->maximum_people = $request->maximum_people;


        $infrastructure->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $infrastructure = Infrastructure::find($id);
        return $infrastructure;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $infrastructure = Infrastructure::find($id);
        $infrastructure->airport_name= $request->airport_name ?? $infrastructure->airport_name;
        $infrastructure->country_id = $request->country_id ?? $infrastructure->country_id;
        $infrastructure->number_landing_strips = $request->number_landing_strips ?? $infrastructure->number_landing_strips;
        $infrastructure->number_terminals = $request->number_terminals ?? $infrastructure->number_terminals;
        $infrastructure->number_boarding_gates = $request->number_boarding_gates ?? $infrastructure->number_boarding_gates;
        $infrastructure->number_public_toilets = $request->number_public_toilets ?? $infrastructure->number_public_toilets;
        $infrastructure->number_shops = $request->number_shops ?? $infrastructure->number_shops;
        $infrastructure->number_restaurants = $request->number_restaurants ?? $infrastructure->number_restaurants;
        $infrastructure->maximum_people = $request->maximum_people ?? $infrastructure->maximum_people;

        $infrastructure->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $infrastructure = Infrastructure::find($id);
        $infrastructure->delete();
        return 'delete success';
    }
}
