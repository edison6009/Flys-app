<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $countrys = Country::with('airline','infrastructure')->Filtrar($request)->get();
        return $countrys;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $country = new Country();

        $country->name = $request->name;
        $country->postal_code = $request->postal_code;

        $country->save();
        return 'success';


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $country = Country::find($id);
        return $country;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->name ?? $country->name;
        $country->postal_code = $request->postal_code ?? $country->name;

        $country->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return 'delete success';
    }
}
