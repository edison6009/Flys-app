<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use App\Http\Requests\StorePlaneRequest;
use App\Http\Requests\UpdatePlaneRequest;
use App\Services\PokemonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $planes = Plane::with('airline')->filtrar($request)
        ->paginate(1);

        $pokemonService=new PokemonService();
        foreach ($planes as $plane) {
            if($plane->pokemon==null){
                $plane['pokemon_name']=null;
            }else{
$pokemon=$pokemonService->getPokemon($plane->pokemon);
        $plane['pokemon_name']=$pokemon;
            }

        }

            return $planes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plane = new Plane();
        $plane->airline_id= $request->airline_id;
        $plane->name = $request->name;
        $plane->passenger_capacity = $request->passenger_capacity;
        $plane->manufacturer = $request->manufacturer;
        $plane->type_plane = $request->type_plane;
        $plane->speed = $request->speed;
        $plane->pokemon = $request->pokemon;

        if ($request->file){
            $path = Storage::putFile('public', $request->file);
            $link = env('APP_URL') . Storage::url($path);
            $plane['url'] = $link;
        }

        $plane->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plane = Plane::find($id);
        $pokemonService=new PokemonService();
        $pokemon=$pokemonService->getPokemon($plane->pokemon);
        $plane['pokemon']=$pokemon;
        return $plane;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plane = Plane::find($id);
        $plane->airline_id= $request->airline_id ?? $plane->airline_id;
        $plane->name = $request->name ?? $plane->name;
        $plane->passenger_capacity = $request->passenger_capacity ?? $plane->passenger_capacity;
        $plane->manufacturer = $request->manufacturer ?? $plane->manufacturer;
        $plane->type_plane = $request->type_plane ?? $plane->type_plane;
        $plane->speed = $request->speed ?? $plane->speed;
        $plane->pokemon = $request->pokemon ?? $plane->pokemon;

        $plane->save();
        return 'success';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plane = Plane::find($id);
        $plane->delete();
        return 'delete success';
    }
}
