<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return $clients;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->last_name = $request->last_name;
        $client->code_phone = $request->code_phone;
        $client->phone = $request->phone;
        $client->type_document_id = $request->type_document_id;
        $client->birthdate = $request->birthdate;
        $client->number_document = $request->number_document;

        $client->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::find($id);
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = client::find($id);
        $client->name = $request->name ?? $client->name;
        $client->email = $request->email ?? $client->email;
        $client->last_name = $request->last_name ?? $client->last_name;
        $client->code_phone = $request->code_phone ?? $client->code_phone;
        $client->phone = $request->phone ?? $client->phone;
        $client->type_document_id = $request->type_document_id ?? $client->type_document_id;
        $client->birthdate = $request->birthdate ?? $client->birthdate;
        $client->number_document = $request->number_document ?? $client->number_document;

        $client->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();
        return 'delete success';
    }
}
